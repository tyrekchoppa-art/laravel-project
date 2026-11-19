<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Classroom;
use App\Models\User;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        // Student::factory(15)->create();
        // Classroom::factory(5)->create();

        Classroom::factory(4)->hasStudents(10)->create();

        // Seeding 10 data Subject dan Teacher yang saling berelasi
        Subject::factory(10)->create()->each(function ($subject) {
            Teacher::factory()->create([
                'subject_id' => $subject->id,
            ]);
        });
    }
}
