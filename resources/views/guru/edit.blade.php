@extends('layout.template')

@section('content')
    <div class="card card-info col-md-12">
        <div class="card-header">
            <h3 class="card-title">Update Data Guru</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('guru.update', $guru->id) }}" method="POST" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputNIP" class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="text" id="nip" name="nip" readonly class="form-control"
                                    value="{{ $guru->nip }}">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" id="nama" name="nama" class="form-control"
                                    value="{{ $guru->nama }}">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" id="alamat" name="alamat" class="form-control"
                                    value="{{ $guru->alamat }}">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="/guru" class="btn btn-default float-left">Back</a>
                        <button type="submit" class="btn btn-info float-right">Update</button>
                    </div>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
