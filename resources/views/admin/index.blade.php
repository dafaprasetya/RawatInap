@extends('core.core')
@section('title')
    Admin
@endsection
@section('content')
@if (Route::is('index'))
<div class="container">
    <div class="row" style="margin-left: 10px">
        <div class="col-lg-6 col-xl-4 mb-4">
            <div class="card {{ count($kamar1) === 0 ? "bg-danger" : "bg-primary" }} text-white h-100 hs">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="me-3">
                            <div class="text-white-75 small">Kelas I</div>
                            <div class="text-lg fw-bold"> {{ count($kamar1) === 0 ? "FULL!!" : count($kamar1terisi) }}</div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-hospital" viewBox="0 0 16 16">
                            <path d="M8.5 5.034v1.1l.953-.55.5.867L9 7l.953.55-.5.866-.953-.55v1.1h-1v-1.1l-.953.55-.5-.866L7 7l-.953-.55.5-.866.953.55v-1.1h1ZM13.25 9a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM13 11.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Zm.25 1.75a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5Zm-11-4a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 3 9.75v-.5A.25.25 0 0 0 2.75 9h-.5Zm0 2a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM2 13.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Z"/>
                            <path d="M5 1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1a1 1 0 0 1 1 1v4h3a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h3V3a1 1 0 0 1 1-1V1Zm2 14h2v-3H7v3Zm3 0h1V3H5v12h1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3Zm0-14H6v1h4V1Zm2 7v7h3V8h-3Zm-8 7V8H1v7h3Z"/>
                        </svg>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between small">
                    <div class="text-white stretched-link">Kosong : {{ count($kamar1) === 0 ? "FULL!!" : count($kamar1) }}</div>
                    <div class="text-white stretched-link">Harga : {{ $harga1->harga.'.000' }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-4 mb-4">
            <div class="card {{ count($kamar2) === 0 ? "bg-danger" : "bg-info" }} text-white h-100 hs">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="me-3">
                            <div class="text-white-75 small">Kelas II</div>
                            <div class="text-lg fw-bold">{{ count($kamar2) === 0 ? "FULL!!" : count($kamar2terisi) }}</div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-hospital" viewBox="0 0 16 16">
                            <path d="M8.5 5.034v1.1l.953-.55.5.867L9 7l.953.55-.5.866-.953-.55v1.1h-1v-1.1l-.953.55-.5-.866L7 7l-.953-.55.5-.866.953.55v-1.1h1ZM13.25 9a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM13 11.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Zm.25 1.75a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5Zm-11-4a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 3 9.75v-.5A.25.25 0 0 0 2.75 9h-.5Zm0 2a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM2 13.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Z"/>
                            <path d="M5 1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1a1 1 0 0 1 1 1v4h3a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h3V3a1 1 0 0 1 1-1V1Zm2 14h2v-3H7v3Zm3 0h1V3H5v12h1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3Zm0-14H6v1h4V1Zm2 7v7h3V8h-3Zm-8 7V8H1v7h3Z"/>
                        </svg>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between small">
                    <div class="text-white stretched-link">Kosong : {{ count($kamar2) === 0 ? "FULL!!" : count($kamar2) }}</div>
                    <div class="text-white stretched-link">Harga : {{ $harga2->harga.'.000' }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-4 mb-4">
            <div class="card {{ count($kamar3) === 0 ? "bg-danger" : "bg-secondary" }} text-white h-100 hs">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="me-3">
                            <div class="text-white-75 small">Kelas III</div>
                            <div class="text-lg fw-bold">{{ count($kamar3) === 0 ? "FULL!!" : count($kamar3terisi) }}</div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-hospital" viewBox="0 0 16 16">
                            <path d="M8.5 5.034v1.1l.953-.55.5.867L9 7l.953.55-.5.866-.953-.55v1.1h-1v-1.1l-.953.55-.5-.866L7 7l-.953-.55.5-.866.953.55v-1.1h1ZM13.25 9a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM13 11.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Zm.25 1.75a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5Zm-11-4a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 3 9.75v-.5A.25.25 0 0 0 2.75 9h-.5Zm0 2a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM2 13.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Z"/>
                            <path d="M5 1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1a1 1 0 0 1 1 1v4h3a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h3V3a1 1 0 0 1 1-1V1Zm2 14h2v-3H7v3Zm3 0h1V3H5v12h1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3Zm0-14H6v1h4V1Zm2 7v7h3V8h-3Zm-8 7V8H1v7h3Z"/>
                        </svg>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between small">
                    <div class="text-white stretched-link">Kosong : {{ count($kamar3) === 0 ? "FULL!!" : count($kamar3) }}</div>
                    <div class="text-white stretched-link">Harga : {{ $harga3->harga.'.000' }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-left: 10px">
        <div class="col-lg-6 col-xl-6 mb-4">
            <div class="card bg-primary text-white h-100 hs">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="me-3">
                            <div class="text-white-75 small">Pasien Dirawat</div>
                            {{-- {{ $pasienselesai }} --}}
                            <div class="text-lg fw-bold"> {{ count($pasiendirawat) }}</div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M48 0C21.5 0 0 21.5 0 48V256H144c8.8 0 16 7.2 16 16s-7.2 16-16 16H0v64H144c8.8 0 16 7.2 16 16s-7.2 16-16 16H0v80c0 26.5 21.5 48 48 48H265.9c-6.3-10.2-9.9-22.2-9.9-35.1c0-46.9 25.8-87.8 64-109.2V271.8 48c0-26.5-21.5-48-48-48H48zM152 64h16c8.8 0 16 7.2 16 16v24h24c8.8 0 16 7.2 16 16v16c0 8.8-7.2 16-16 16H184v24c0 8.8-7.2 16-16 16H152c-8.8 0-16-7.2-16-16V152H112c-8.8 0-16-7.2-16-16V120c0-8.8 7.2-16 16-16h24V80c0-8.8 7.2-16 16-16zM512 272a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM288 477.1c0 19.3 15.6 34.9 34.9 34.9H541.1c19.3 0 34.9-15.6 34.9-34.9c0-51.4-41.7-93.1-93.1-93.1H381.1c-51.4 0-93.1 41.7-93.1 93.1z"/></svg>

                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between small">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-6 mb-4">
            <div class="card bg-info text-white h-100 hs">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="me-3">
                            <div class="text-white-75 small">Pasien Selesai</div>
                            <div class="text-lg fw-bold">{{ count($pasienselesai) }}</div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M48 0C21.5 0 0 21.5 0 48V256H144c8.8 0 16 7.2 16 16s-7.2 16-16 16H0v64H144c8.8 0 16 7.2 16 16s-7.2 16-16 16H0v80c0 26.5 21.5 48 48 48H265.9c-6.3-10.2-9.9-22.2-9.9-35.1c0-46.9 25.8-87.8 64-109.2V271.8 48c0-26.5-21.5-48-48-48H48zM152 64h16c8.8 0 16 7.2 16 16v24h24c8.8 0 16 7.2 16 16v16c0 8.8-7.2 16-16 16H184v24c0 8.8-7.2 16-16 16H152c-8.8 0-16-7.2-16-16V152H112c-8.8 0-16-7.2-16-16V120c0-8.8 7.2-16 16-16h24V80c0-8.8 7.2-16 16-16zM512 272a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM288 477.1c0 19.3 15.6 34.9 34.9 34.9H541.1c19.3 0 34.9-15.6 34.9-34.9c0-51.4-41.7-93.1-93.1-93.1H381.1c-51.4 0-93.1 41.7-93.1 93.1z"/></svg>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between small">
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-left: 10px">
        <div class="col-lg-6 col-xl-12 mb-4">
            <div class="card bg-danger text-white h-100 hs">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="me-3">
                            <div class="text-white-75 small">Dokter</div>
                            {{-- {{ $pasienselesai }} --}}
                            <div class="text-lg fw-bold"> {{ count($dokter) }}</div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 448 512">
                            <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-96 55.2C54 332.9 0 401.3 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7c0-81-54-149.4-128-171.1V362c27.6 7.1 48 32.2 48 62v40c0 8.8-7.2 16-16 16H336c-8.8 0-16-7.2-16-16s7.2-16 16-16V424c0-17.7-14.3-32-32-32s-32 14.3-32 32v24c8.8 0 16 7.2 16 16s-7.2 16-16 16H256c-8.8 0-16-7.2-16-16V424c0-29.8 20.4-54.9 48-62V304.9c-6-.6-12.1-.9-18.3-.9H178.3c-6.2 0-12.3 .3-18.3 .9v65.4c23.1 6.9 40 28.3 40 53.7c0 30.9-25.1 56-56 56s-56-25.1-56-56c0-25.4 16.9-46.8 40-53.7V311.2zM144 448a24 24 0 1 0 0-48 24 24 0 1 0 0 48z"/>
                        </svg>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between small">
                </div>
            </div>
        </div>

    </div>
</div>
@elseif (Route::is('pasiendone'))
<div class="container">
    <table class="table table-striped">
        <thead>
          <tr>
            <th>Nama Pasien</th>
            <th>Kamar</th>
            <th>Hari</th>
            <th>rujuk</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($pasien as $perkembangan)

            {{-- {{ dd($perkembangan->pasien->kamar->harga * $perkembangan->visit[count($perkembangan->visit)-1]->hari ) }} --}}
            {{-- {{ dd(($perkembangan->visit[count($perkembangan->visit)-1]->harga_obat + $perkembangan->visit[count($perkembangan->visit)-1]->harga_obat) + ($perkembangan->pasien->kamar->harga * $perkembangan->visit[count($perkembangan->visit)-1]->hari) ) }} --}}
            <tr>
                <td>{{ $perkembangan->pasien->nama_pasien }}</td>

                <td>{{ $perkembangan->pasien->kamar->nama_kamar }}</td>
                <td>{{ $perkembangan->visit[count($perkembangan->visit)-1]->hari }}</td>
                <td>{{ $perkembangan->visit[count($perkembangan->visit)-1]->rujuk }}</td>
                <td>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <a class="dropdown-item" href="{{ route('invoicess', $perkembangan->invoice->id) }}">Lihat Invoice</a>

                    <a class="dropdown-item" href="#">Delete</a>
                    </div>
                </div>
                </td>
            </tr>
            @endforeach


          <!-- Tambahkan baris data pasien lainnya di sini -->
        </tbody>
    </table>
</div>
@elseif (Route::is('dirawat'))
<div class="container">
    <table class="table table-striped">
        <thead>
          <tr>
            <th>Nama Pasien</th>
            <th>Kamar</th>
            <th>Hari</th>
            <th>rujuk</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($pasien as $perkembangan)

            {{-- {{ dd($perkembangan->pasien->kamar->harga * $perkembangan->visit[count($perkembangan->visit)-1]->hari ) }} --}}
            {{-- {{ dd(($perkembangan->visit[count($perkembangan->visit)-1]->harga_obat + $perkembangan->visit[count($perkembangan->visit)-1]->harga_obat) + ($perkembangan->pasien->kamar->harga * $perkembangan->visit[count($perkembangan->visit)-1]->hari) ) }} --}}
            <tr>
                <td>{{ $perkembangan->pasien->nama_pasien }}</td>

                <td>{{ $perkembangan->pasien->kamar->nama_kamar }}</td>
                <td>{{ $perkembangan->visit[count($perkembangan->visit)-1]->hari }}</td>
                <td>{{ $perkembangan->visit[count($perkembangan->visit)-1]->rujuk }}</td>
                <td>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <a class="dropdown-item" href="{{ route('lihatkunjungan', $perkembangan->id) }}">Lihat kunjungan</a>

                    <a class="dropdown-item" href="#">Delete</a>
                    </div>
                </div>
                </td>
            </tr>
            @endforeach


          <!-- Tambahkan baris data pasien lainnya di sini -->
        </tbody>
    </table>
</div>
@endif




@endsection


