<?php

class Saldo extends Eloquent {

	protected $table = "saldo";

	public $timestamps = false;

	protected $garded = [
	"id"
	];


	// Add your validation rules here
	public static $rules = [
		'valor'    => 'required'
		'user_id' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [
		'valor',
		'user_id'
	];

	public function user()
	{
		return $this->belongsTo('User');
	}
}