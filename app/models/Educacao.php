<?php

class Educacao extends Eloquent {

	protected $table = "educacao";

	public $timestamps = false;

	protected $garded = [
	"id"
	];


	// Add your validation rules here
	public static $rules = [
		'instituicao'    => 'required',
		'formacao'		   => 'required',
		'user_id' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [
		'insituicao',
		'curso',
		'formacao',
		'user_id'
	];

	public function users()
	{
		return $this->belongsTo('User', 'user_id');
	}
}