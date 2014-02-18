<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use LaravelBook\Ardent\Ardent;

class User extends Ardent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
    protected $softDelete = true;

    protected $rawPassword;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */

    public static $rules = array(
        'email'                 => 'required|email|unique:users',
        'firstname'             => 'required|between:4,16',
        'lastname'              => 'required|between:4,16',
        'password'              => 'required',
        'type'          => 'required'
    );

    public function beforeSave()
    {
        $this->rawPassword = $this->password;
        // if there's a new password, hash it
        if($this->isDirty('password')) {
            $this->password = Hash::make($this->password);
        }

        return true;
        //or don't return nothing, since only a boolean false will halt the operation
    }

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

    public function afterCreate()
    {
        // // send welcome email
        // MailHelper::signupMessage($this->firstname.' '.$this->lastname, $this->email, $this->rawPassword);
        //set message on first login
        Session::flash('notice', 'Hello '.$this->firstname.'! You have successfully registered your account. Please confirm your email now.');
    }

}