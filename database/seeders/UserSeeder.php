<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tu  = User::factory()->create([
            'name' => 'Petugas TU',
            'email' => 'petugas@example.com',
        ]);

        $tu->profile()->create([
            'user_id' => $tu->id,
           'position' => 'Petugas TU',
        ]);

        $tu->assignRole('officer');

        $headmaster = User::factory()->create([
           'name' => 'Kepala Sekolah',
           'email' => 'kepalasekolah@example.com',
        ]);

        $headmaster->profile()->create([
           'user_id' => $headmaster->id,
           'position' => 'Kepala Sekolah',
        ]);

        $headmaster->assignRole('headmaster');

        $teacher = User::factory()->create([
           'name' => 'Dadang, S.Pd.',
           'email' => 'dadang@example.com',
        ]);

        $teacher->profile()->create([
           'user_id' => $teacher->id,
           'position' => 'Guru',
           'status' => 'Guru Tetap'
        ]);

        $teacher->assignRole('teacher');
        $teacher2 = User::factory()->create([
           'name' => 'Sulaiman, S.Pd.',
           'email' => 'sulaiman@example.com',
        ]);

        $teacher2->profile()->create([
           'user_id' => $teacher2->id,
           'position' => 'Guru',
           'status' => 'Guru Honorer'
        ]);

        $teacher2->assignRole('teacher');
        $teacher3 = User::factory()->create([
           'name' => 'Windy, S.Pd.',
           'email' => 'windy@example.com',
        ]);

        $teacher3->profile()->create([
           'user_id' => $teacher3->id,
           'position' => 'Guru',
           'status' => 'Guru Honorer'
        ]);

        $teacher3->assignRole('teacher');
        $teacher4 = User::factory()->create([
           'name' => 'Roro Jongrang, S.Pd.',
           'email' => 'rorojongrang@example.com',
        ]);

        $teacher4->profile()->create([
           'user_id' => $teacher4->id,
           'position' => 'Guru',
           'status' => 'Guru Tetap'
        ]);

        $teacher4->assignRole('teacher');
        $teacher5 = User::factory()->create([
           'name' => 'Musdalifah, S.Pd.',
           'email' => 'musdalifah@example.com',
        ]);

        $teacher5->profile()->create([
           'user_id' => $teacher5->id,
           'position' => 'Guru',
           'status' => 'Guru Honorer'
        ]);

        $teacher5->assignRole('teacher');
        $teacher6 = User::factory()->create([
           'name' => 'Gufron, S.Pd.',
           'email' => 'gufron@example.com',
        ]);

        $teacher6->profile()->create([
           'user_id' => $teacher6->id,
           'position' => 'Guru',
           'status' => 'Guru Tetap'
        ]);

        $teacher6->assignRole('teacher');
        $teacher = User::factory()->create([
           'name' => 'Kastelo, S.Pd.',
           'email' => 'kastelo@example.com',
        ]);

        $teacher->profile()->create([
           'user_id' => $teacher->id,
           'position' => 'Guru',
           'status' => 'Guru Tetap'
        ]);

        $teacher->assignRole('teacher');

    }
}
