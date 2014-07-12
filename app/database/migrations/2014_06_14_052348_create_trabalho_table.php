<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrabalhoTable extends BaseMigration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trabalho', function(Blueprint $table)
		{
			$this->setTable($table);
			$this->addPrimary();
			$this->addString('empresa');
			$this->addString('cargo');
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
		Schema::dropIfExists('trabalho');
	}

}
