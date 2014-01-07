<?php
	class UserController extends BaseController {

		public function postChangePassword() {
			//BRMHelper::printR(Input::all());

			$current_pass_frm_db = Auth::user()->password;
			$old_pass_input = Input::get('old_pass');
			$new_pass_input = Input::get('new_pass');
			$confirm_input = Input::get('confirm_pass');

			if($new_pass_input != $confirm_input) return json_encode(array('status' => 'New password and the confirmation did not match.'));

			if(Hash::check($old_pass_input, $current_pass_frm_db)) {
				$user = Auth::user();
				$user->password = $confirm_input;								
				$user->updateUniques();

				$status = 'success';				
			}else $status = 'Wrong old password';

			return json_encode(array('status' => $status));

		}

	}
?>