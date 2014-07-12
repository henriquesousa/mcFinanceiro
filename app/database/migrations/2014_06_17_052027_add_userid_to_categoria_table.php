<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUseridToCategoriaTable extends BaseMigration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	

	public function up()
	{
		Schema::table('categoria', function(Blueprint $table)
		{
			$this->setTable($table);
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
		Schema::dropIfExists('categoria');
	}

}
