@extends('layouts.app')

@section('content')
<div class="content-wrapper px-5">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Uji Coba Metode</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Uji</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- NOTIFIKASI -->
        @if (session('flash_training'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h6>
                <i class="icon fas fa-check"></i>
                Data Berhasil
                <strong>
                    {{ session('flash_training') }}
                </strong>
            </h6>
        </div>
        @endif

        <!-- tambah data -->
        <!-- tambah data -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <form action="{{ url('DataUjiCuaca/validation_form') }}" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Suhu</label>
                                            <select class="form-control" name="suhu">
                                                <option value="" selected disabled>--Pilih suhu</option>
                                                <option value="Dingin">Dingin</option>
                                                <option value="Hangat">Hangat</option>
                                                <option value="Panas">Panas</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kelembaban</label>
                                            <select class="form-control" name="kelembaban">
                                                <option value="" selected disabled>--Pilih kelembaban</option>
                                                <option value="Rendah">Rendah</option>
                                                <option value="Sedang">Sedang</option>
                                                <option value="Tinggi">Tinggi</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kecepatan Angin</label>
                                            <select class="form-control" name="kecepatan_angin">
                                                <option value="" selected disabled>--Pilih kecepatan angin</option>
                                                <option value="Lambat">Lambat</option>
                                                <option value="Sedang">Sedang</option>
                                                <option value="Cepat">Cepat</option>
                                            </select>
                                        </div>
                                        {{-- <div class="form-group">
                                                <label>Cuaca</label>
                                                <select class="form-control" name="cuaca">
                                                    <option value="cerah">Cerah</option>
                                                    <option value="berawan">Berawan</option>
                                                    <option value="hujan">Hujan</option>
                                                </select>
                                            </div> --}}
                                        <input type="submit" name="save" class="btn btn-primary" value="Save">
                                    </div>
                                    <!-- /.card-body -->
                                </form>
                            </div>
                            <div class="col-md">
                                @if ($hasil)
                                <div class="card">
                                    <div class="card-header">
                                        <h1 class="card-title">Hasil Perhitungan Naive Bayes</h1>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif
                                                <form action="" method="post">
                                                    @csrf
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Perhitungan Probabilitas</label>
                                                            <ul>
                                                                <li>
                                                                    <h6>Keputusan Cuaca</h6>
                                                                </li>
                                                                <p>Total Semua data : {{$jumlahData}}</p>
                                                                <p>P(Cuaca = Cerah) : {{$jumlahCerah}}/{{$jumlahData}} = {{$probabilitasCerah}}</p>
                                                                <p>P(Cuaca = Hujan) :{{$jumlahHujan}}/{{$jumlahData}} = {{$probabilitasHujan}}</p>
                                                                <p>P(Cuaca = Beraawan) :{{$jumlahBerawan}}/{{$jumlahData}} = {{$probabilitasBerawan}}</p>
                                                            </ul>
                                                        </div>
                                                        <div class="form-group">
                                                            <ul>
                                                                <li>
                                                                    <h6>Attribut Suhu : {{$probabilitasSuhu}}</h6>
                                                                </li>
                                                                <p>P({{$probabilitasSuhu}} = Cerah) : {{$jumlahSuhuCerah}}/{{$jumlahCerah}} = {{$probabilitasSuhuCerah}}</p>
                                                                <p>P({{$probabilitasSuhu}} = Hujan) :{{$jumlahSuhuHujan}}/{{$jumlahHujan}} = {{$probabilitasSuhuHujan}}</p>
                                                                <p>P({{$probabilitasSuhu}} = Barawan) :{{$jumlahSuhuBerawan}}/{{$jumlahBerawan}} = {{$probabilitasSuhuBerawan}}</p>
                                                            </ul>
                
                                                        </div>
                                                        <div class="form-group">
                                                            <ul>
                                                                <li>
                                                                    <h6>Attribut Kelembapan: {{$probabilitasKelembaban}}</h6>
                                                                </li>
                                                                <p>P({{$probabilitasKelembaban}} = Cerah) : {{$jumlahKelembabanCerah}}/{{$jumlahCerah}} = {{$probabilitasKelembabanCerah}}</p>
                                                                <p>P({{$probabilitasKelembaban}} = Hujan) :{{$jumlahKelembabanHujan}}/{{$jumlahHujan}} = {{$probabilitasKelembabanHujan}}</p>
                                                                <p>P({{$probabilitasKelembaban}} = Barawan) :{{$jumlahKelembabanBerawan}}/{{$jumlahBerawan}} = {{$probabilitasKelembabanBerawan}}</p>
                                                            </ul>
                                                        </div>
                                                        <div class="form-group">
                                                            <ul>
                                                                <li>
                                                                    <h6>Attribut Kecepatan Angin: {{$probabilitasKecepatan_angin}}</h6>
                                                                </li>
                                                                <p>P({{$probabilitasKecepatan_angin}} = Cerah) : {{$jumlahKecepatanAnginCerah}}/{{$jumlahCerah}} = {{$probabilitasKecepatanAnginCerah}}</p>
                                                                <p>P({{$probabilitasKecepatan_angin}} = Hujan) :{{$jumlahKecepatanAnginHujan}}/{{$jumlahHujan}} = {{$probabilitasKecepatanAnginHujan}}</p>
                                                                <p>P({{$probabilitasKecepatan_angin}} = Barawan) :{{$jumlahKecepatanAnginBerawan}}/{{$jumlahBerawan}} = {{$probabilitasKecepatanAnginBerawan}}</p>
                                                            </ul>
                
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Menghitung Probabilitas Posterior</label>
                                                            <ul>
                                                                <li>
                                                                    <h6>Probabilitas Posterior Cerah : {{$probabilitasCerah}} * {{$probabilitasSuhuCerah }} * {{$probabilitasKelembabanCerah }} * {{ $probabilitasKecepatanAnginCerah }} = {{$probabilitasPosteriorCerah}} </h6>
                                                                </li>
                                                                <li>
                                                                    <h6>Probabilitas Posterior Hujan : {{$probabilitasHujan}} * {{$probabilitasSuhuHujan }} * {{$probabilitasKelembabanHujan}} * {{$probabilitasKecepatanAnginHujan }} = {{$probabilitasPosteriorHujan}}</h6>
                                                                </li>
                                                                <li>
                                                                    <h6>Probabilitas Posterior Berawan : {{$probabilitasBerawan}} * {{$probabilitasSuhuBerawan}} * {{$probabilitasKelembabanBerawan }} * {{$probabilitasKecepatanAnginBerawan}} = {{$probabilitasPosteriorBerawan}} </h6>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Menentukan Kelas</label>
                                                            <ul>
                                                                <h6>Kelas untuk Naive Bayes : {{$kelas}}</h6>
                                                                <h6>Nilai Tertingggi : {{$nilaiTertinggi}}</h6>
                                                            </ul>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Kesimpulan</label>
                                            
                                                                <div class="alert alert-success opacity-50 w-full" role="alert">
                                                                    <h6>Jika Suhu adalah {{$probabilitasSuhu }}, dan Kelembaban adalah {{$probabilitasKelembaban }}, dan Kecepatan Angin adalah {{$probabilitasKecepatan_angin}}, maka cuaca adalah <b>{{$kelas}}</b></h6>
                                                                </div>
                
                                                       
                                                        </div>
                                                        {{-- <input type="submit" name="save" class="btn btn-primary" value="Save"> --}}
                                                    </div>
                                                    <!-- /.card-body -->
                                                </form>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- ./card-body -->
                                </div>
                                @endif
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


        <!-- list data -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- card-body -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Day</th>
                                    <th>Suhu</th>
                                    <th>Kelembaban</th>
                                    <th>Kecepatan Angin</th>
                                    <th>Cuaca</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($training as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->hari}}</td>
                                    <td>{{ $row->suhu }}</td>
                                    <td>{{ $row->kelembaban }}</td>
                                    <td>{{ $row->kecepatan_angin }}</td>
                                    <td>{{ $row->cuaca }}</td>
                           
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection