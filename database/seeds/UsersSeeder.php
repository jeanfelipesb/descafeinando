<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->insert([
            [
                'name' => 'Leitor',
                'email' => 'leitor@leitor.com',
                'password' => bcrypt('123456'),
                'level' => 0,
                'created_at' => Carbon\Carbon::now(),
                'avatar' => '',
                'descricao' => 'Eu sou uma descrição.',
            ],
            [
                'name' => 'Revisor',
                'email' => 'revisor@revisor.com',
                'password' => bcrypt('123456'),
                'level' => 1,
                'created_at' => Carbon\Carbon::now(),
                'avatar' => '',
                'descricao' => 'Eu sou uma descrição.',
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('123456'),
                'level' => 2,
                'created_at' => Carbon\Carbon::now(),
                'avatar' => '',
                'descricao' => 'Eu sou uma descrição.',
            ]
        ]);
    }

}
