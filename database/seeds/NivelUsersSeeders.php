<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NivelUsersSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuario_niveis')->insert([
            'nivel' => '1',
            'ativo' => '1'
        ]);
    }
}
