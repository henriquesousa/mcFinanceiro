<?php

class Categoria extends Eloquent {

	protected $table = "categoria";

	public $timestamps = false;

	protected $garded = [
		"id"
	];

	// Add your validation rules here
	public static $rules = [
		'descricao' => 'required',
		'tipo'	=> 'required|numeric'
	];

	// Don't forget to fill this array
	protected $fillable = [
		'descricao',
		'tipo'
	];

	public function despesa()
	{
		return $this->hasMany('Despesa');
	}

	public function entrada()
	{
		return $this->hasMany('Entrada');
	}

	public function investimento()
	{
		return $this->hasMany('Investimento');
	}

}