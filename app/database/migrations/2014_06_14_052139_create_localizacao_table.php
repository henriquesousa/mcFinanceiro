<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalizacaoTable extends BaseMigration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('localizacao', function(Blueprint $table)
		{
			$this->setTable($table);
			$this->addPrimary();
			$this->addString('cidade');
			$this->addString('rua');
			$this->addString('bairro');
			$this->addString('uf');
			$this->addForeignMany('user_id');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('localizacao');
	}

}
