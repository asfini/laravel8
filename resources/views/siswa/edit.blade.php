@extends('layout.template')

@section('content')
    <div class="card card-info col-md-12">
        <div class="card-header">
            <h3 class="card-title">Update Data Siswa</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputNIS" class="col-sm-2 col-form-label">NIS</label>
                            <div class="col-sm-10">
                                <input type="text" id="nis" name="nis" readonly class="form-control"
                                    value="{{ $siswa->nis }}">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" id="nama" name="nama" class="form-control"
                                    value="{{ $siswa->nama }}">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" id="alamat" name="alamat" class="form-control"
                                    value="{{ $siswa->alamat }}">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputImage" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <input type="file" id="image" name="image" onchange="readURL(this);" class="form-control">
                                <br>
                                <img src= "{{ asset('uploads/students/'.$siswa->image) }}" id="preview" width = "150" height="150" class="img-thumbnail">

                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="/siswa" class="btn btn-default float-left">Back</a>
                        <button type="submit" class="btn btn-info float-right">Update</button>
                    </div>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
