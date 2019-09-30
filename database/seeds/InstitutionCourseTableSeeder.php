<?php

use Illuminate\Database\Seeder;

class InstitutionCourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $data[] = [ 'institution_id' => 1, 'course_id' => 1 ];
        $data[] = [ 'institution_id' => 1, 'course_id' => 2 ];
        $data[] = [ 'institution_id' => 1, 'course_id' => 4 ];
        $data[] = [ 'institution_id' => 2, 'course_id' => 4 ];
        $data[] = [ 'institution_id' => 2, 'course_id' => 7 ];
        $data[] = [ 'institution_id' => 2, 'course_id' => 3 ];

    }
}
