<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class PortalCommands extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'portal:migrate';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Migrate data from old client portal database to new portal database.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
		if($this->confirm('Migrate users now?'))
			$this->migrateUsers();

		if($this->confirm('Migrate orders now?'))
			$this->migrateOrders();

		if($this->confirm('Migrate services now?'))
			$this->migrateServices();

		if($this->confirm('Migrate sub_services now?'))
			$this->migrateSubServices();

		$this->info("\n\nMigrations have been executed successfully. \n\nHave a nice day =)\n\n\t\t- Adones");
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array();
		// return array(
		// 	array('entity', InputArgument::OPTIONAL, 'Specifies which database entities to be imported from one database to another. Default value is "all"','all'),
		// );
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array();
		// return array(
		// 	array('entity', InputArgument::VALUE_OPTIONAL, 'Specifies which database entities to be imported from one database to another. Default value is "all"','all'),
		// );
	}

	protected function migrateSubServices()
	{
		DB::connection('local_new_portal')->table('sub_services')->delete();
		DB::connection('local_new_portal')->table('service_quantities')->delete();

		$old_table = 'service_flavor';
		$new_table = 'sub_services';

		$slug = function($old_table_row){
			//take the opportunity to create the service_quantities
			$old_quantities = explode(',', $old_table_row->a_cp_select_quantities);
			$old_prices = explode(',', $old_table_row->a_cp_select_prices);
			$old_delivery_days = explode(',', $old_table_row->a_delivery_days);

			$quantities = array();

			for($i = 0; $i < count($old_quantities); $i ++) {
				$quantity = array();
				$quantity['subservice_id'] = $old_table_row->id;
				$quantity['type'] = $i < 4 ? "default" : "other";
				$quantity['quantity'] = isset($old_quantities[$i])? $old_quantities[$i] : "0";
				$quantity['price'] = isset($old_prices[$i])? $old_prices[$i]: "0";
				$quantity['delivery_days'] = isset($old_delivery_days[$i])? str_replace('"', '', $old_delivery_days[$i]) : "undefined";
				$quantities[] = $quantity;
			}
			DB::connection('local_new_portal')->table('service_quantities')->insert($quantities);
			// end create service_quantities

			//return the slug
			return BRMHelper::createSlug($old_table_row->name);
		};

		$date = function($old_table_row){
			return date('Y-m-d h:i:s');
		};

		$fields = array(

			'id' => 'id',
			'alias' => 'alias',
			'service_id' => 'service_id',
			'slug' => $slug,
			'sub_service_name' => 'name',
			'created_at' => $date,
			'updated_at' => $date

		);

		$this->migrate($old_table, $new_table, $fields, 1000);
	}

	protected function migrateServices()
	{
		DB::connection('local_new_portal')->table('services')->delete();
		$old_table = 'service';
		$new_table = 'services';

		$slug = function($old_table_row){
			return BRMHelper::createSlug($old_table_row->name);
		};
		$date = function($old_table_row){
			return date('Y-m-d h:i:s');
		};

		$where = array(
			array('isActive', '=', '1'),
			array('default_service_flavor_id', '<>', 'NULL')
		);

		$fields = array(
			'id' => 'id',
			'service_name' => 'name',
			'ordinary_prefix' => 'prefix',
			'reseller_prefix' => 'prefix_reseller',
			'name' => 'name',
			'slug' => $slug,
			'created_at' => $date,
			'updated_at' => $date
		);
		$this->migrate($old_table, $new_table, $fields, 1000, $where);
	}

	protected function migrateOrders()
	{
		$old_table = 'service_purchase';
		$new_table = 'orders';

		//asyncronous functions will receive on argument which is one old table row instace
		$url = function($old_table_row){
					return $old_table_row->my_url != ''? $old_table_row->my_url : $old_table_row->my_username;
				};

		$zero = function($old_table_row){return 0;};

		$fields = array(
			//old_table column   =>         new_table column
			'created_at' => 				'date_creation',
			'updated_at' => 				'update_datetime',
			'dashboard_id' => 				'dashboard_purchase_id',
			'order_number' => 				'unique_id',
			'transaction_id' => 			'unique_id',
			'price' => 						'credits',
			'resource' => 					$url,
			'url' => 						$url,
			'username' => 					$url,
			'service_id' =>					'service_id',
			'sub_service_id' => 			'service_flavor_id',
			'user_id' => 					'member_id',
			'is_subscription' => 			$zero,
			'status' => 					'status',
			'start_count' => 				'views_start',
			'end_count' => 					'views_current',
			'quantity' => 					'views_target',
			'ip' => 						'ip',
			'date_start_campaign' => 		'date_start',
		);

		$this->migrate($old_table, $new_table, $fields, 100);
	}

	protected function migrateUsers()
	{
		DB::connection('local_new_portal')->table('users')->where('email', '<>', 'pitogo.adones@gmail.com')->delete();
		$old_table = 'member';
		$new_table = 'users';

		$password = $this->ask("We have to reset user passwords because the encryption algorythm has changed in our new system. Please provide new password for all users:");
		$password = Hash::make($password);

		$new_password = function() use ($password){
			return $password;
		};

		//migrate user fund to user transaction
		$fund = function($old_table_row, $new_table, $old_table){
			$date = date('Y-m-d h:i:s');
			$transaction = array(
				'amount' => $old_table_row->credits,
				'remarks' => 'Total fund from old system',
				'transaction_id' => BRMHelper::genRandomTransactionId(),
				'type' => 1,
				'user_id' => $old_table_row->id,
				'created_at' => $date,
				'updated_at' => $date
			);

			DB::connection('local_new_portal')->table('user_transactions')->insert($transaction);
			return $old_table_row->credits;

		};

		$fields = array(
			'id' => 'id',
			'email' => 'email',
			'password' => $new_password,
			'firstname' => 'first_name',
			'lastname' => 'last_name',
			'customer_type' => 'type',
			'fund' => $fund,
			'created_at' => 'creation_date',
			'updated_at' => 'creation_date',
			'ip' => 'ip',
		);

		$this->migrate($old_table, $new_table, $fields);

	}

	protected function migrate($old_table, $new_table, $fields, $limit = 1000, $where = array())
	{
		// dd($where);
		$this->info("Migrating from old db's \"".$old_table."\" table to new db's \"".$new_table."\" table ...");

		$rows = DB::connection('local_client_portal')->table($old_table);

		foreach ($where as $w) {
			$rows->where($w[0], $w[1], $w[2]);
		}

		$rows = $rows->count();

		$num_chunk = $rows % $limit > 0 ? (floor($rows/$limit)) + 1 : $rows/$limit;

		for($i = 0; $i < $num_chunk; $i ++){

			$items = DB::connection('local_client_portal')->table($old_table);

			foreach ($where as $w) {
				$items->where($w[0], $w[1], $w[2]);
			}
			$items = $items->skip($limit*$i)->limit($limit)->get();

			$inserts = array();

			foreach ($items as $item) {

				$insert = array();

				foreach ($fields as $new_field => $old_field) {
					if(is_callable($old_field))
					{
						$insert[$new_field] = $old_field($item, $new_table, $old_table);
					}
					else{
						$insert[$new_field] = $item->{$old_field};
					}

				}

				$inserts[] = $insert;
				unset($insert);
				unset($item);
			}

			DB::connection('local_new_portal')->table($new_table)->insert($inserts);
			unset($items);
			unset($inserts);
		}

		$this->info($rows." rows migrated from old db's \"".$old_table."\" table to new db's \"".$new_table.' table.');
	}

}