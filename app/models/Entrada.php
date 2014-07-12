<?php

class Entrada extends Eloquent {

	protected $table = "entrada";

	protected $garded = [
		"id",
		"created_at",
		"updated_at",
		"deleted_at"
	];

	// Add your validation rules here
	public static $rules = [
		'descricao' => 'required|min:3',
		'valor'	=> 'required',
		'categoria_id' => 'required|numeric'
	];

	// Don't forget to fill this array
	protected $fillable = [
		'id'
		];

	public function user()
	{
		return $this->belongsTo('User');
	} 
	
	public function categoria()
	{
		return $this->belongsTo('Categoria');
	}

}