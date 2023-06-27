@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <h1>Daftar kamar terisi : </h1>
                            @if (count($kamar1) == 0)
                            <h3>kelas I : FULL!!</h3>
                            @else
                            <h3>kelas I : {{ count($kamar1terisi) }}</h3>
                            @endif

                            @if (count($kamar2) == 0)
                            <h3>kelas II : FULL!!</h3>
                            @else
                            <h3>kelas II : {{ count($kamar2terisi) }}</h3>
                            @endif

                            @if (count($kamar3) == 0)
                            <h3>kelas III : FULL!!</h3>
                            @else
                            <h3>kelas III : {{ count($kamar3terisi) }}</h3>

                            @endif
                        </div>
                        <div class="col-md-6">
                            <h1>Daftar kamar kosong : </h1>
                            @if (count($kamar1) == 0)
                            <h3>kelas I : FULL!!</h3>
                            @else
                            <h3>kelas I : {{ count($kamar1) }}</h3>
                            @endif

                            @if (count($kamar2) == 0)
                            <h3>kelas II : FULL!!</h3>
                            @else
                            <h3>kelas II : {{ count($kamar2) }}</h3>
                            @endif

                            @if (count($kamar3) == 0)
                            <h3>kelas III : FULL!!</h3>
                            @else
                            <h3>kelas III : {{ count($kamar3) }}</h3>
                            @endif

                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>
@endsection
