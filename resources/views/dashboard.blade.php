@extends('layout.template')

@if ($message = session('success'))
    <div class="alert alert-success" role="alert">
        {{ $message }}
    </div>
@endif
@section('content')
    <div class="card">
        <div class="card-header border-0">
            <div class="d-flex justify-content-between">
                <h3 class="card-title">Ini adalah Halaman Dashboard</h3>
            </div>
        </div>
    </div>
@endsection
