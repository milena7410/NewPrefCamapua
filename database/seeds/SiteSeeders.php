<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sites')->insert([
            'background' => 'teste',
        ]);
    }
}
