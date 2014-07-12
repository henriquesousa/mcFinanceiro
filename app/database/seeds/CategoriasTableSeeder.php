<?php

class CategoriasTableSeeder extends Seeder {

    public function run()
    {
        DB::table('categoria')->delete();

        Categoria::create(
        	[
        		'id' => '1',
        		'descricao' => 'compra final de semana',
        		'tipo' => '1'
        	]);
    }

}