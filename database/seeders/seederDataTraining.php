<?php

namespace Database\Seeders;

use App\Models\DataTraining;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class seederDataTraining extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            ['hari' => 'Day-1','suhu' => 'Panas', 'kelembaban' => 'Tinggi', 'kecepatan_angin' => 'Lambat', 'cuaca' => 'Hujan'],
            ['hari' => 'Day-2','suhu' => 'Panas', 'kelembaban' => 'Rendah', 'kecepatan_angin' => 'Cepat', 'cuaca' => 'Cerah'],
            ['hari' => 'Day-3','suhu' => 'Hangat', 'kelembaban' => 'Tinggi', 'kecepatan_angin' => 'Cepat', 'cuaca' => 'Hujan'],
            ['hari' => 'Day-4','suhu' => 'Dingin', 'kelembaban' => 'Tinggi', 'kecepatan_angin' => 'Lambat', 'cuaca' => 'Hujan'],
            ['hari' => 'Day-5','suhu' => 'Dingin', 'kelembaban' => 'Rendah', 'kecepatan_angin' => 'Cepat', 'cuaca' => 'Hujan'],
            ['hari' => 'Day-6','suhu' => 'Dingin', 'kelembaban' => 'Tinggi', 'kecepatan_angin' => 'Lambat', 'cuaca' => 'Berawan'],
            ['hari' => 'Day-7','suhu' => 'Hangat', 'kelembaban' => 'Rendah', 'kecepatan_angin' => 'Cepat', 'cuaca' => 'Berawan'],
            ['hari' => 'Day-8','suhu' => 'Panas', 'kelembaban' => 'Tinggi', 'kecepatan_angin' => 'Cepat', 'cuaca' => 'Hujan'],
        ];

        foreach ($data as $item) {
            DataTraining::create($item);
        }
    }
}
