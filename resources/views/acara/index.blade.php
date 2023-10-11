@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Acara') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <form class="card-header" action="{{ route('acara.store') }}" method="post">
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-primary" data-toggle="collapse" href="#addForm" aria-expanded="true">
                                    <i class="fa fa-plus mr-2"></i>Tambah Acara
                                </a>
                            </div>
                            <div id="accordion">
                                <div id="addForm" class="collapse" data-parent="#accordion" style="">
                                    @csrf
                                    @method('POST')
                                    <div class="my-3 mx-0">
                                        <div class="form-group row">
                                            <label for="deskripsi" class="col-sm-2 col-form-label">Acara</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="deskripsi"
                                                    name="deskripsi" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pj" class="col-sm-2 col-form-label">Penanggung Jawab
                                                Acara</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="pj" name="pj" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jam" class="col-sm-2 col-form-label">Tanggal</label>
                                            <div class="col-sm-10 row pr-0">
                                                <div class="col-8">
                                                    <input type="date" class="form-control" id="tanggal"
                                                        name="tanggal" />
                                                </div>
                                                <div class="col-4 pr-0">
                                                    <input type="time" class="form-control" id="jam"
                                                        name="jam" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="card-body p-2">

                            <table class="table table-bordered" id="myTable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Deskripsi Acara</th>
                                        <th>Penanggung Jawab</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($acara as $a)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $a->deskripsi }}</td>
                                            <td>{{ $a->pj }}</td>
                                            <td>{{ tanggalIndo($a->tanggal) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
