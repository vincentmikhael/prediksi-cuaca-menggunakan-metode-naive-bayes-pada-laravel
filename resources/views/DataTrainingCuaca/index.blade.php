@extends('layouts.app')

@section('content')
<div class="content-wrapper px-5">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Training</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Training</li>
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
                            <div class="col-md-8">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <form action="{{ url('DataTrainingCuaca/validation_form') }}" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Hari</label>
                                            <input type="text" name="hari" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Suhu</label>
                                            <select class="form-control" name="suhu">
                                                <option value="" selected disabled>Pilih suhu</option>
                                                <option value="dingin">Dingin</option>
                                                <option value="hangat">Hangat</option>
                                                <option value="panas">Panas</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kelembaban</label>
                                            <select class="form-control" name="kelembaban">
                                                <option value="" selected disabled>Pilih kelembaban</option>
                                                <option value="rendah">Rendah</option>
                                                <option value="sedang">Sedang</option>
                                                <option value="tinggi">Tinggi</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kecepatan Angin</label>
                                            <select class="form-control" name="kecepatan_angin">
                                                <option value="" selected disabled>Pilih kecepatan angin</option>
                                                <option value="pelan">Pelan</option>
                                                <option value="sedang">Sedang</option>
                                                <option value="kencang">Kencang</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Cuaca</label>
                                            <select class="form-control" name="cuaca">
                                                <option value="" selected disabled>Pilih cuaca</option>
                                                <option value="cerah">Cerah</option>
                                                <option value="berawan">Berawan</option>
                                                <option value="hujan">Hujan</option>
                                            </select>
                                        </div>
                                        <input type="submit" name="save" class="btn btn-primary" value="Save">
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
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ url('DataTrainingCuaca/hapus/' . $row->id) }}" class="btn btn-danger mr-3" onclick="return confirm('yakin ?')">Hapus</a>
                                            <a href="{{ url('DataTrainingCuaca/ubah/' . $row->id) }}" class="btn btn-warning">update</a>
                                        </div>
                                    </td>
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