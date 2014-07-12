<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestimentoTable extends BaseMigration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('investimento', function(Blueprint $table)
		{
			$this->setTable($table);
			$this->addPrimary();
			$this->addString('descricao');
			$this->addFloat('valor');
			$this->addForeignMany('user_id');
			$this->addForeignMany('categoria_id');
			$this->addTimestamps();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('investimento');
	}

}
