<?php

class Localizacao extends Eloquent {

	protected $table = "localizacao";

	public $timestamps = false;

	protected $garded = [
	"id"
	];


	// Add your validation rules here
	public static $rules = [
		'cidade'    => 'required',
		'rua'		=> 'required',
		'bairro'	=> 'required',
		'user_id'   => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [
		'cidade',
		'rua',
		'bairro',
		'user_id'
	];

	public function users()
	{
		return $this->belongsTo('User');
	}
}