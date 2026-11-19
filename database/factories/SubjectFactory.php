<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Pemrograman Web', 'Pemrograman Berorientasi Objek',
                'Basis Data', 'Desain Multimedia', 'Matematika Terapan',
                'Kecerdasan Buatan', 'Jaringan Komputer', 'Bahasa Inggris Teknis',
                'Keamanan Siber', 'Rekayasa Perangkat Lunak'
            ]),
        ];
    }
}
