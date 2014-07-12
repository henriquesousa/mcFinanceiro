<?php

class Investimento extends Eloquent {

	protected $table = "investimento";

	protected $garded = [
		"id",
		"created_at",
		"updated_at",
		"deleted_at"
	];

	// Add your validation rules here
	public static $rules = [
		'descricao' => 'required',
		'valor'	=> 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [
		'descricao',
		'valor',
		'categoria_id',
		'user_id'
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