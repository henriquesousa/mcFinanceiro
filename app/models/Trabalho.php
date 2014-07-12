<?php

class Trabalho extends Eloquent {

	protected $table = "trabalho";

	public $timestamps = false;

	protected $garded = [
	"id"
	];


	// Add your validation rules here
	public static $rules = [
		'empresa'    => 'required',
		'cargo'		   => 'required',
		'user_id' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [
		'empresa',
		'cargo',
		'user_id'
	];

	public function users()
	{
		return $this->belongsTo('User');
	}
}