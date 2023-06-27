
@extends('core.core')
@section('title')
{{ $checkup->pasien->nama_pasien }}

@endsection

@section('content')
<div class="container">
    <h3 class="mb-3">Perkembangan pasien</h3>
    <table class="table table-hover mb-3">
        <thead>
            <tr>
                <th>Hari</th>
                <th>Pasien</th>
                <th>Dokter</th>
                <th>Keluhan</th>
                <th>Perkembangan</th>
                <th>Penyakit</th>
                <th>Obat</th>
                <th>Rujuk</th>
                <th>Selesai</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($chek->visit as $data)
            <tr>
                <td>{{ $data->hari }}</td>
                <td>{{ $data->pasien->nama_pasien }}</td>
                <td>{{ $data->dokter->nama_dokter }}</td>
                <td>{{ $data->keluhan }}</td>
                <td>{{ $data->perkembangan }}</td>
                <td>{{ $data->penyakit }}</td>
                <td>{{ $data->obat }}</td>
                <td>{{ $data->rujuk }}</td>
                <td>{{ $data->selesai }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    <hr>
<div class="container">

    @if ($chek->selesai == 'yes')
        <h1 class="d-flex justify-content-center mb-5" >sudah selesai</h1>
    @else
    @if (Route::is('lihatkunjungan'))
    <script>
        alert('Hanya Dokter yang bisa menambah perkembangan pasien')
        $(document).ready(function() {
            $(':input[type="submit"]').prop('disabled', true);
            $(':input').prop('disabled', true);

        });
    </script>
    @endif
    <h2 class="d-flex justify-content-center mb-4 mt-4">Tambah Perkembangan Pasien</h2>
    <form method="POST" action="{{ route('dokter_perkembangan', $chek->id) }}">
        @csrf


        <input type="text" name="pasien_id" value="{{ $chek->pasien_id }}" hidden>
        <input type="text" name="dokter_id" value="{{ $chek->dokter_id }}" hidden>
        <input type="text" name="kamar_id" value="{{ $chek->pasien->kamar->id }}" hidden>
        <input type="text" name="total" value="{{ ($chek->visit[count($chek->visit)-1]->harga_obat + $chek->visit[count($chek->visit)-1]->harga_checkup) + ($chek->pasien->kamar->harga * $chek->visit[count($chek->visit)-1]->hari)}}" hidden>
        <input type="text" name="harga_obat_perhari" value="{{ $chek->visit[count($chek->visit)-1]->harga_obat }}" hidden>
        <input type="text" name="harga_checkup_perhari" value="{{ $chek->visit[count($chek->visit)-1]->harga_checkup }}" hidden>
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="pasien_id">Pasien</label>
                            <input type="text" name="pasien_id" id="" value="{{ $chek->pasien_id }}" hidden>
                            <input class="form-control" type="text" name="" id="" value="{{ $checkup->pasien->nama_pasien }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="dokter_id">Dokter</label>
                            <input type="text" name="dokter_id" id="" value="{{ $chek->dokter_id }}" hidden>
                            <input class="form-control" type="text" name="" id="" value="{{ $checkup->dokter->nama_dokter }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="hari">Hari ke-</label>
                            <input class="form-control" type="number" value="{{ $chek->visit[count($chek->visit)-1]->hari + 1 }}" id="hari" name="hari">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="keluhan">Keluhan</label>
                    <textarea class="form-control" id="keluhan" name="keluhan" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="perkembangan">Perkembangan</label>
                    <textarea class="form-control" id="perkembangan" name="perkembangan"rows="4"></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="penyakit">Penyakit</label>
                            <input class="form-control" value="{{ $chek->visit[count($chek->visit)-1]->penyakit }}" type="text" id="penyakit" name="penyakit">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="from-group">
                            <label for="obat">Obat</label>
                            <input class="form-control" type="text" id="obat" name="obat">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="harga_obat">Harga Obat</label>
                            <input class="form-control" type="number" id="obat" name="harga_obat">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="harga_obat">Harga Checkup</label>
                            <input class="form-control" type="number" id="obat" value="{{ $chek->visit[count($chek->visit)-1]->harga_checkup_ori }}" name="harga_checkup">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="rujuk">Rujuk</label>
                            <select class="form-control" id="rujuk" name="rujuk">
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="selesai">Selesai</label>
                            <select class="form-control" id="selesai" name="selesai">
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-block btn-outline-secondary" type="submit">Simpan</button>
                    <a href="{{ url()->previous() }}"" class="btn btn-block btn-outline-danger" role="button">Back</a>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $(':input[type="submit"]').prop('disabled', true);
                $('input[type="text"]').keyup(function() {
                    if($(this).val() != '') {
                    $(':input[type="submit"]').prop('disabled', false);
                    }
                });
            });
        </script>
    </form>
    @endif

</div>
@endsection

