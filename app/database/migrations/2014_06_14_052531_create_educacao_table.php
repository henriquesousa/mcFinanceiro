<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducacaoTable extends BaseMigration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('educacao', function(Blueprint $table)
		{
			$this->setTable($table);
			$this->addPrimary();
			$this->addString('instituicao');
			$this->addString('curso');
			$this->addString('formacao');
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
		Schema::dropIfExists('educacao');
	}

}
