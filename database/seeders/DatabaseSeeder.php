<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@tisaude.com',
            'password' => Hash::make('123456'),
            'created_at' => new \DateTime('now'),
            'updated_at' => new \DateTime('now')
        ]);

        DB::table('especialidades')->insert([
            'espec_codigp' => 1234,
            'espec_nome' => 'Dermatologista',
            'created_at' => new \DateTime('now'),
            'updated_at' => new \DateTime('now')
        ]);

        DB::table('medicos')->insert([
            'med_codigo' => 1234,
            'med_CRM' => 'CRM-1234',
            'med_nome' => 'Drauzio Varella',
            'med_espec' => 1234,
            'created_at' => new \DateTime('now'),
            'updated_at' => new \DateTime('now')
        ]);

        DB::table('plano_saudes')->insert([
            'plan_codig' => 1234,
            'pano_descricao' => 'Unimed',
            'plano_telefone' => '(88) 8888-8888',
            'created_at' => new \DateTime('now'),
            'updated_at' => new \DateTime('now')
        ]);

        DB::table('pacientes')->insert([
            'pac_codigo' => 1234,
            'pac_nome' => 'John Doe',
            'pac_telefones' => '(88) 8888-8888',
            'pac_dataNascimento' => new \DateTime('now'),
            'created_at' => new \DateTime('now'),
            'updated_at' => new \DateTime('now')
        ]);

        DB::table('procedimentos')->insert([
            'proc_codigo' => 1234,
            'proc_nome' => 'Raio X',
            'proc_valor' => 157.98,
            'created_at' => new \DateTime('now'),
            'updated_at' => new \DateTime('now')
        ]);
    }
}
