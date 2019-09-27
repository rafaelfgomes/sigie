<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'Administrador do Sistema',
            'email' => 'admin@sigie.com.br',
            'password' => Hash::make('123456')
        ];

        User::create($data);
    }
}
