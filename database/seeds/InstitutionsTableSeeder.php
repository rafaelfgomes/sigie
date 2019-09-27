<?php

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

        $data[] = [ 'cnpj' => '30565008000166', 'status' => 1 ];
        $data[] = [ 'cnpj' => '44133820000127', 'status' => 1 ];
        $data[] = [ 'cnpj' => '27512941000160', 'status' => 1 ];
        $data[] = [ 'cnpj' => '58239921000191', 'status' => 0 ];
        $data[] = [ 'cnpj' => '34189368000161', 'status' => 1 ];
        $data[] = [ 'cnpj' => '77988362000167', 'status' => 1 ];

        Institution::insert($data);
    
    }

}
