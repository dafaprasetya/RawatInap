@extends('core.core')
@section('title')
    Admin | Dokter Baru
@endsection
@section('content')
<div class="container">
    <form method="POST" action="{{ route('buatdokterpost') }}">
        @csrf
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 d-flex justify-content-center mb-3 mt-3">
                <h2>Form Tambah Dokter</h2>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input class="form-control" type="text" id="nik" name="nik">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="nama_dokter">Nama Dokter</label>
                        <input class="form-control" type="text" id="nama_dokter" name="nama_dokter">
                    </div>
                    <div class="col-md-6">
                        <label for="user_id">User:</label>

                        <select class="form-control" id="user_id" name="user_id" required>
                            <option value="">Pilih User</option>
                            @foreach ($user as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="spesialis">Spesialis</label>
                    <input class="form-control" type="text" id="spesialis" name="spesialis">
                </div>
                <div class="form-group">
                    <label for="jadwal">Jadwal</label>
                    <input class="form-control" type="text" id="jadwal" name="jadwal">
                </div>
                <div class="form-group">

                    <button class="btn btn-block btn-outline-secondary" type="submit">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
