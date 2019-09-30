<?php

use App\Institution;
use Illuminate\Database\Seeder;

class InstitutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data[] = [ 'name' => 'Unip', 'cnpj' => '30565008000166', 'status' => 1, 'created_at' => now(), 'updated_at' => now()  ];
        $data[] = [ 'name' => 'Unisanta', 'cnpj' => '44133820000127', 'status' => 1, 'created_at' => now(), 'updated_at' => now() ];
        $data[] = [ 'name' => 'Unisantos', 'cnpj' => '27512941000160', 'status' => 1, 'created_at' => now(), 'updated_at' => now() ];
        $data[] = [ 'name' => 'Unimonte', 'cnpj' => '58239921000191', 'status' => 0, 'created_at' => now(), 'updated_at' => now() ];
        $data[] = [ 'name' => 'Uninove', 'cnpj' => '34189368000161', 'status' => 1, 'created_at' => now(), 'updated_at' => now() ];
        $data[] = [ 'name' => 'Unaerp', 'cnpj' => '77988362000167', 'status' => 0, 'created_at' => now(), 'updated_at' => now() ];
        $data[] = [ 'name' => 'FALS', 'cnpj' => '77956544000188', 'status' => 1, 'created_at' => now(), 'updated_at' => now() ];

        Institution::insert($data);
    
    }

}
