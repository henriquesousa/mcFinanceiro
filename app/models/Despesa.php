<?php

class Despesa extends Eloquent {

	protected $table = "despesa";

	protected $garded = [
	"id",
	"updated_at",
	"deleted_at"
	];


	// Add your validation rules here
	public static $rules = [
		'descricao'    => 'required|min:3',
		'valor'		   => 'required',
		'categoria_id' => 'required',
		'created_at'   => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['id'];

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function categoria()
	{
		return $this->belongsTo('Categoria');
	}
}