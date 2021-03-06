<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(InstitutionsTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(InstitutionCourseTableSeeder::class);
        $this->call(ContactTableSeeder::class);
        $this->call(AddressTableSeeder::class);
    }
}
