<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Support\MessageBag;

class User extends Eloquent implements UserInterface, RemindableInterface 
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user';
	protected $hidden = ['password'];

	protected $garded = [
		"id",
		"password",
		"created_at",
		"updated_at"
	];

	protected $filable = [
		"nome",
		"username",
		"email",
		"phone"
	];

	// Add your validation rules here
	public static $rules = [
		'nome' => 'required',
		'username'	=> 'required|min:6',
		'password'	=> 'required|min:6|alpha_num',
		'confirm'	=> 'required|same:password',
		'email'	=> 'required|email',
		'phone'	=> 'required|numeric',
	];

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

	
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function getReminderUsername()
	{
		return $this->username;
	}

	public function getRememberToken()
	{
	    return $this->remember_token;
	}

	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
	    return 'remember_token';
	}

	/* 
	 Relacionamentos
	 */
	public function despesa()
	{
		return $this->hasMany('Despesa', 'user_id');
	}

	public function entrada()
	{
		return $this->hasMany('Entrada', 'user_id');
	}

	public function educacao()
	{
		return $this->hasMany('Educacao', 'user_id');
	}

	public function investimento()
	{
		return $this->hasMany('Investimento', 'user_id');
	}

	public function localizacao()
	{
		return $this->hasOne('Localizacao', 'user_id');
	}

	public function saldo()
	{
		return $this->hasMany('Saldo', 'user_id');
	}

	public function trabalho()
	{
		return $this->hasMany('Trabalho', 'user_id');
	}


}

