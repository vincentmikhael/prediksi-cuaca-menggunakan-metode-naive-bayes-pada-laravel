<?php

namespace App\Http\Controllers;

use App\Models\DataTraining;
use Illuminate\Http\Request;

class DataUjiController extends Controller
{
    //
    public function index()
    {
        $training = DataTraining::all();
        return view('DataUjiCuaca.index', ['training' => $training,'hasil' => false]);
    }
    public function validation_form(Request $request)
    {
        $training = DataTraining::all();
        $output = "";
        $jumlahData = 0;



        // Langkah 1: Menghitung Probabilitas Kelas
        // Hitung jumlah kemunculan setiap kelas cuaca dalam data training.
        // Hitung probabilitas masing-masing kelas cuaca.
        $jumlahData = DataTraining::count();
        $jumlahHujan = DataTraining::where('cuaca', 'Hujan')->count();
        $jumlahCerah = DataTraining::where('cuaca', 'Cerah')->count();
        $jumlahBerawan = DataTraining::where('cuaca', 'Berawan')->count();
        // Probabilitas
        $probabilitasHujan = $jumlahHujan / $jumlahData;
        $probabilitasCerah = $jumlahCerah / $jumlahData;
        $probabilitasBerawan = $jumlahBerawan / $jumlahData;

        // Langkah 2: Menghitung Probabilitas Atribut
        // Hitung jumlah kemunculan setiap nilai atribut dalam data training.
        // Hitung probabilitas masing-masing nilai atribut.
        // Atribut Cuaca dengan nilai Hujan
        $jumlahSuhuHujan = DataTraining::where('suhu', $request->suhu)->where('cuaca', 'Hujan')->count();
        $jumlahKelembabanHujan = DataTraining::where('kelembaban', $request->kelembaban)->where('cuaca', 'Hujan')->count();
        $jumlahKecepatanAnginHujan = DataTraining::where('kecepatan_angin', $request->kecepatan_angin)->where('cuaca', 'Hujan')->count();
        // Atribut Cuaca dengan nilai Cerah
        $jumlahSuhuCerah = DataTraining::where('suhu', $request->suhu)->where('cuaca', 'Cerah')->count();
        $jumlahKelembabanCerah = DataTraining::where('kelembaban', $request->kelembaban)->where('cuaca', 'Cerah')->count();
        $jumlahKecepatanAnginCerah = DataTraining::where('kecepatan_angin', $request->kecepatan_angin)->where('cuaca', 'Cerah')->count();
        // Atribut Cuaca dengan nilai Berawan
        $jumlahSuhuBerawan = DataTraining::where('suhu', $request->suhu)->where('cuaca', 'Berawan')->count();
        $jumlahKelembabanBerawan = DataTraining::where('kelembaban', $request->kelembaban)->where('cuaca', 'Berawan')->count();
        $jumlahKecepatanAnginBerawan = DataTraining::where('kecepatan_angin', $request->kecepatan_angin)->where('cuaca', 'Berawan')->count();

        // Probabilitas
        // Atribut Cuaca dengan nilai Hujan
        $probabilitasSuhuHujan = $jumlahSuhuHujan / $jumlahHujan;
        $probabilitasKelembabanHujan = $jumlahKelembabanHujan / $jumlahHujan;
        $probabilitasKecepatanAnginHujan = $jumlahKecepatanAnginHujan / $jumlahHujan;

        // Atribut Cuaca dengan nilai Cerah
        $probabilitasSuhuCerah = $jumlahSuhuCerah / $jumlahCerah;
        $probabilitasKelembabanCerah = $jumlahKelembabanCerah / $jumlahCerah;
        $probabilitasKecepatanAnginCerah = $jumlahKecepatanAnginCerah / $jumlahCerah;

        // Atribut Cuaca dengan nilai Berawan
        $probabilitasSuhuBerawan = $jumlahSuhuBerawan / $jumlahBerawan;
        $probabilitasKelembabanBerawan = $jumlahKelembabanBerawan / $jumlahBerawan;
        $probabilitasKecepatanAnginBerawan = $jumlahKecepatanAnginBerawan / $jumlahBerawan;


        /// Langkah 3: Menghitung Probabilitas Posterior
        // Hitung probabilitas posterior untuk setiap kelas cuaca.
        $probabilitasPosteriorHujan = $probabilitasHujan * $probabilitasSuhuHujan * $probabilitasKelembabanHujan * $probabilitasKecepatanAnginHujan;
        $probabilitasPosteriorCerah = $probabilitasCerah * $probabilitasSuhuCerah * $probabilitasKelembabanCerah * $probabilitasKecepatanAnginCerah;
        $probabilitasPosteriorBerawan = $probabilitasBerawan * $probabilitasSuhuBerawan * $probabilitasKelembabanBerawan * $probabilitasKecepatanAnginBerawan;

        // Langkah 4: Menentukan Kelas
        // Tentukan kelas cuaca yang memiliki probabilitas posterior normalisasi tertinggi.
        $kelas = '';
        $nilaiTertinggi = 0;

        if ($probabilitasPosteriorHujan > $probabilitasPosteriorCerah and $probabilitasPosteriorHujan > $probabilitasPosteriorBerawan) {
            $nilaiTertinggi = $probabilitasPosteriorHujan;
            $kelas = 'Hujan';
        } else if ($probabilitasPosteriorCerah > $probabilitasPosteriorHujan and $probabilitasPosteriorCerah > $probabilitasPosteriorBerawan) {
            $nilaiTertinggi = $$probabilitasPosteriorCerah;
            $kelas = 'Cerah';
        } else if ($probabilitasPosteriorBerawan > $probabilitasPosteriorHujan and $probabilitasPosteriorBerawan > $probabilitasPosteriorCerah) {
            $nilaiTertinggi = $probabilitasPosteriorBerawan;
            $kelas = 'Berawan';
        } else {
            $kelas = 'Hasil Dari probabilitas tidak ditemukan';
        }
        $array = [
            'hasil' => true,
            'training' => $training,
            'jumlahData' => $jumlahData,
            'jumlahHujan' => $jumlahHujan,
            'jumlahCerah' => $jumlahCerah,
            'jumlahBerawan' => $jumlahBerawan,

            'probabilitasHujan' => $probabilitasHujan,
            'probabilitasCerah' => $probabilitasCerah,
            'probabilitasBerawan' => $probabilitasBerawan,

            'probabilitasSuhu' => $request->suhu,
            'probabilitasKelembaban' => $request->kelembaban,
            'probabilitasKecepatan_angin' => $request->kecepatan_angin,

            'jumlahSuhuHujan' => $jumlahSuhuHujan,
            'jumlahSuhuCerah' => $jumlahSuhuCerah,
            'jumlahSuhuBerawan' => $jumlahSuhuBerawan,

            'jumlahKelembabanHujan' => $jumlahKelembabanHujan,
            'jumlahKelembabanCerah' => $jumlahKelembabanCerah,
            'jumlahKelembabanBerawan' => $jumlahKelembabanBerawan,

            'jumlahKecepatanAnginHujan' => $jumlahKecepatanAnginHujan,
            'jumlahKecepatanAnginCerah' => $jumlahKecepatanAnginCerah,
            'jumlahKecepatanAnginBerawan' => $jumlahKecepatanAnginBerawan,

            'probabilitasPosteriorHujan' => $probabilitasPosteriorHujan,
            'probabilitasPosteriorCerah' => $probabilitasPosteriorCerah,
            'probabilitasPosteriorBerawan' => $probabilitasPosteriorBerawan,

            'probabilitasSuhuCerah' => $probabilitasSuhuCerah,
            'probabilitasSuhuHujan' => $probabilitasSuhuHujan,
            'probabilitasSuhuBerawan' => $probabilitasSuhuBerawan,


            'probabilitasKelembabanCerah' => $probabilitasKelembabanCerah,
            'probabilitasKelembabanHujan' => $probabilitasKelembabanHujan,
            'probabilitasKelembabanBerawan' => $probabilitasKelembabanBerawan,

            'probabilitasKecepatanAnginCerah' => $probabilitasKecepatanAnginCerah,
            'probabilitasKecepatanAnginHujan' => $probabilitasKecepatanAnginHujan,
            'probabilitasKecepatanAnginBerawan' => $probabilitasKecepatanAnginBerawan,

            'kelas' => $kelas,
            'nilaiTertinggi' => $nilaiTertinggi,
        ];
        return view('DataUjiCuaca.index', $array);
    }
}
