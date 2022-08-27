<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntidadeSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('entidades')->insert([
            'entidade' => 'Digitar',
            'telefone' => '(67) 98448-5003',
            'email' => 'leandro.webdevops@gmail.com',
            'rua' => 'XXX',
            'numero' => '44',
            'bairro' => 'centro',
            'complemento' => 'casa',
            'cep' => '26000',
            'cidade' => 'Campo Grande - MS',
            'estado' => 'Mato Grosso do Sul'
        ]);
    }
}
