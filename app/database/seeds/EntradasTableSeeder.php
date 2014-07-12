<?php

class EntradasTableSeeder extends Seeder {

    public function run()
    {
        DB::table('entradas')->delete();

        Entradas::create(
        	[
        		'id' => '1',
        		'descricao' => 'analise',
        		'valor' => '10.00',
                'categoria_id' => '1'
        	]);
    }

}