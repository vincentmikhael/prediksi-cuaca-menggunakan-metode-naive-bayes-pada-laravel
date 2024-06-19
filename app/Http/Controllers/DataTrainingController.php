<?php

namespace App\Http\Controllers;

use App\Models\DataTraining;
use Illuminate\Http\Request;

class DataTrainingController extends Controller
{
    public function index()
    {
        $training = DataTraining::all();
        return view('DataTrainingCuaca.index', ['training' => $training]);
    }
    public function validation_form(Request $request)
    {
        $request->validate([
            'hari' => 'required',
            'suhu' => 'required',
            'kelembaban' => 'required',
            'kecepatan_angin' => 'required',
            'cuaca' => 'required',
        ]);

        DataTraining::create($request->all());

        session()->flash('flash_training', 'Disimpan');
        return redirect('DataTrainingCuaca');
    }
    public function hapus($id)
    {
        DataTraining::destroy($id);

        session()->flash('flash_training', 'Dihapus');
        return redirect('DataTrainingCuaca');
    }
    public function ubah(Request $request, $id)
    {
        $request->validate([
            'hari' => 'required',
            'suhu' => 'required',
            'kelembaban' => 'required',
            'kecepatan_angin' => 'required',
            'cuaca' => 'required',
        ]);

        $data = $request->all();
        unset($data['_token']);

        DataTraining::where('id', $id)->update($data);

        session()->flash('flash_training', 'DiUbah');
        return redirect('DataTrainingCuaca');
    }
}
