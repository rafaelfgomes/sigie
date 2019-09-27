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
        
        $data[] = [ 'name' => 'Ténico de Enfermagem', 'status' => 1 ];
        $data[] = [ 'name' => 'Ténico de Informática', 'status' => 1 ];
        $data[] = [ 'name' => 'Administração', 'status' => 1 ];
        $data[] = [ 'name' => 'Desenho Técnico', 'status' => 1 ];
        $data[] = [ 'name' => 'Mecatrônica', 'status' => 1 ];
        $data[] = [ 'name' => 'Redes de Computador', 'status' => 1 ];
        $data[] = [ 'name' => 'Pedagogia', 'status' => 1 ];

        Course::insert($data);

    }
}
