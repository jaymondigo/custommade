<?php

use Zizaco\Confide\ConfideUser;

class User extends ConfideUser {
    use Codesleeve\Stapler\Stapler;

    public function __construct(array $attributes = array()) {
      $this->hasAttachedFile('avatar', [
          'styles' => [
            'medium' => '300x300',
            'thumb' => '100x100'
          ],
          'default_url' => 'missing.png'
      ]);

      parent::__construct($attributes);
    }

    public static $rules = array(
        'firstname' => 'required',
        'lastname' => 'required',
        'username' => 'required|unique:users',
       // 'email' => 'required|email|unique:users',
        'password' => 'required|between:4,11|confirmed', 
    );

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    private $numProjects;
 
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password','confirmation_code','deleted_at','confirmed');

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

    public function getFullname(){
        $this->fullname = $this->firstname.' '.$this->lastname;
    }

    public function getAddress(){
        $this->address = $this->address1.(!empty($this->address1) ? ', ':'').$this->address2.(!empty($this->address2) ? ', ':'').$this->address3.(!empty($this->address3) ? ', ':'').$this->country;
    }
    public function getProjectsCount(){
        $this->projects_count = count(Project::where('user_id', Auth::user()->id));
    }
    public function getAvatarUrl(){
        $this->avatar_url = array(
                'thumb'=>$this->avatar->url('thumb'),
                'medium'=>$this->avatar->url('medium'),
                'original'=>$this->avatar->url(),
            );
    }
    public function favoriteProjects(){
        return $this->hasMany('FavoriteProject');
    }
}
    