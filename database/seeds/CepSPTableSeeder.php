<?php

use Illuminate\Database\Seeder;

class CepSPTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\CepSP::class)->create([
            'Tipo' => 'R',
            'Logradouro' => 'FELICIO PEREIRA',
            'Complemento' => '',
            'Bairro' => 'JD PIQUEROBY',
            'Cidade' => 'SAO PAULO',
            'UF' => 'SP',
            'Cep' => '03463-050'
        ]);

        factory(\App\Models\CepSP::class)->create([
            'Tipo' => 'AV',
            'Logradouro' => 'INGA',
            'Complemento' => 'DE 580/590 AO FIM',
            'Bairro' => 'MANAIRA',
            'Cidade' => 'JOAO PESSOA',
            'UF' => 'PB',
            'Cep' => '58038-251'
        ]);
    }
}
