<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\Nilai;
use App\Models\Rapor;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $faker = Faker::create('us_US');
        $faker->seed(123);
        $jurusan = ['Informatika', 'Sistem Informasi', 'Akuntansi'];

        for ($i = 0; $i < 50; $i++) {
            Mahasiswa::create([
                'nim' => $faker->unique()->numerify('0111####'),
                'nama' => $faker->firstName . " " . $faker->lastname,
                'jurusan' => $faker->randomElement($jurusan),

            ]);
        }

        for ($i = 0; $i < 3; $i++) {
            Nilai::create([
                'sem1' => $faker->randomFloat(2, 2, 4),
                'sem2' => $faker->randomFloat(2, 2, 4),
                'sem3' => $faker->randomFloat(2, 2, 4),
                'mahasiswa_id' => $faker->unique()->randomDigit,

            ]);
        }

        Rapor::create(
            [
                'catatan' => 'Ada peningkatan setiap semester, pertahankan',
                'nilai_id' => 1
            ]
        );
        Rapor::create(
            [
                'catatan' => 'Nilai semester 2 sangat turun, harus rajin lagi',
                'nilai_id' => 2
            ]
        );
        Rapor::create(
            [
                'catatan' => 'Usahakan agar IP selalu diatas 3',
                'nilai_id' => 3
            ]
        );
    }
}
