@extends('layout.template')

@section('content')
    <div class="col-md-3">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid " src="{{ asset('uploads/students/'.$siswa->image) }}"
                        alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $siswa->nis }}</h3>

                <p class="text-muted text-center">{{ $siswa->nama }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>NIS</b> <a class="float-right">{{ $siswa->nis }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Nama</b> <a class="float-right">{{ $siswa->nama }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Alamat</b> <a class="float-right"> {{ $siswa->alamat }}</a>
                    </li>
                </ul>

                <a href="{{ route('siswa.index') }}" class="btn btn-primary btn-block"><b>Back</b></a>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
