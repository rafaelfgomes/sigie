<?php

use App\Course;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $data[] = [ 'name' => 'Ténico de Enfermagem', 'status' => 1, 'created_at' => now(), 'updated_at' => now() ];
        $data[] = [ 'name' => 'Ténico de Informática', 'status' => 1, 'created_at' => now(), 'updated_at' => now() ];
        $data[] = [ 'name' => 'Administração', 'status' => 1, 'created_at' => now(), 'updated_at' => now() ];
        $data[] = [ 'name' => 'Desenho Técnico', 'status' => 0, 'created_at' => now(), 'updated_at' => now() ];
        $data[] = [ 'name' => 'Mecatrônica', 'status' => 1, 'created_at' => now(), 'updated_at' => now() ];
        $data[] = [ 'name' => 'Redes de Computador', 'status' => 0, 'created_at' => now(), 'updated_at' => now() ];
        $data[] = [ 'name' => 'Pedagogia', 'status' => 1, 'created_at' => now(), 'updated_at' => now() ];

        Course::insert($data);

    }
}
