<?php

use Illuminate\Database\Seeder;

class CadastroProfessoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\CadastroProfessor::class)->create([
            'Codigo_Professor' => '11000',
            'Nome' => 'Anderson',
            'CPF' => '278.193.468-25',
            'RG' => '299138926',
            'Email' => 'anderson@sinprosp.org.br',
            'Materia' => 5,
            'Pre' => rand(0, 1),
            '1_4Serie' => rand(0, 1),
            '5_8Serie' => rand(0, 1),
            'Ens_Medio' => rand(0, 1),
            'Ens_Superior' => rand(0, 1),
            '2_3Grau' => rand(0, 1),
            'Tecnico' => rand(0, 1),
            'Supletivo' => rand(0, 1),
            'Curso_Livre' => rand(0, 1),
            'Data_Aniversario' => '1978-12-26',
            'CEP' => '03363-060',
            'Endereco' => 'RUA IRU',
            'Numero' => '65',
            'Complemento' => 'CASA 4',
            'Bairro' => 'VILA FORMOSA',
            'Cidade' => 'SAO PAULO',
            'Estado' => 'SP',
            'DDD_Telefone_Residencial' => '11',
            'Telefone_Residencial' => '2910-2641',
            'DDD_Telefone_Comercial' => '11',
            'Telefone_Comercial' => '2910-2641',
            'DDD_Telefone_Celular' => '11',
            'Telefone_Celular' => '99854-4838',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        ]);

        factory(\App\Models\CadastroProfessor::class)->create([
            'Codigo_Professor' => '00571',
            'Nome' => 'Sofia',
            'CPF' => '676.834.018-20',
            'Email' => 'sofia@sinprosp.org.br',
            'Materia' => 5,
            'Pre' => rand(0, 1),
            '1_4Serie' => rand(0, 1),
            '5_8Serie' => rand(0, 1),
            'Ens_Medio' => rand(0, 1),
            'Ens_Superior' => rand(0, 1),
            '2_3Grau' => rand(0, 1),
            'Tecnico' => rand(0, 1),
            'Supletivo' => rand(0, 1),
            'Curso_Livre' => rand(0, 1),
            'CEP' => '03363-060',
            'Endereco' => 'RUA IRU',
            'Numero' => '65',
            'Complemento' => 'CASA 4',
            'Bairro' => 'VILA FORMOSA',
            'Cidade' => 'SAO PAULO',
            'Estado' => 'SP',
            'DDD_Telefone_Residencial' => '11',
            'Telefone_Residencial' => '2910-2641',
            'DDD_Telefone_Comercial' => '11',
            'Telefone_Comercial' => '2910-2641',
            'DDD_Telefone_Celular' => '11',
            'Telefone_Celular' => '99854-4838',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        ]);
    }
}
