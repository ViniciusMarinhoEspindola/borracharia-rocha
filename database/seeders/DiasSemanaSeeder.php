<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DiasDaSemana;

class DiasSemanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DiasDaSemana::create(['nm_dia_semana' => 'Domingo', 'ic_funcionamento' => false]);
        DiasDaSemana::create(['nm_dia_semana' => 'Segunda-feira', 'ic_funcionamento' => false]);
        DiasDaSemana::create(['nm_dia_semana' => 'Terça-feira', 'ic_funcionamento' => false]);
        DiasDaSemana::create(['nm_dia_semana' => 'Quarta-feira', 'ic_funcionamento' => false]);
        DiasDaSemana::create(['nm_dia_semana' => 'Quinta-feira', 'ic_funcionamento' => false]);
        DiasDaSemana::create(['nm_dia_semana' => 'Sexta-feira', 'ic_funcionamento' => false]);
        DiasDaSemana::create(['nm_dia_semana' => 'Sábado', 'ic_funcionamento' => false]);
    }
}
