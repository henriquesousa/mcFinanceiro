<?php

class DespesasTableSeeder extends Seeder {

    public function run()
    {
        DB::table('despesas')->delete();

        Despesas::create(
        	[
        		'id' => '1',
        		'descricao' => 'compra final de semana',
        		'valor' => '10.00',
                'categoria_id' => '1'
        	]);
    }

}