@extends('layout.template')

@section('content')
    <div class="mb-3">
        <a class="btn btn-primary btn-sm" href="{{ route('siswa.create') }}">
            <i class="fa fa-plus"></i>
            </i>
            Input Data
        </a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-sm table-striped table-hover border" border="1">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="text-center">NIS</th>
                        <th scope="col" class="text-center">Nama</th>
                        <th scope="col" class="text-center">Alamat</th>
                        <th scope="col" class="text-center"width="250" align="center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $sis)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sis->nis }}</td>
                            <td>{{ $sis->nama }}</td>
                            <td>{{ $sis->alamat }}</td>
                            <td class="project-actions text-center">

                                <form action="{{ route('siswa.destroy', $sis->id) }}" method="POST">

                                    <a class="btn btn-primary btn-sm" href="{{ route('siswa.show', $sis->id) }}">
                                        <i class="fa fa-eye"></i>
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{ route('siswa.edit', $sis->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
