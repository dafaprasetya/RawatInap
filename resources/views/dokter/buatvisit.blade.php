@extends('core.core')

@section('content')

<div class="container">


    <form method="POST" action="{{ route('dokter_kunjunganp') }}">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pasien_id">Cari Pasien</label>
                            <input class="form-control" placeholder="cari pasein" id="tags">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pasien_id">Pasien</label>

                            <select class="form-control" id="pasien_id" name="pasien_id">
                                <option value="">Pilih Pasien</option>
                                @foreach ($pasien as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama_pasien }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="dokter_id">Dokter</label>
                    <input class="form-control" type="text" name="dokter_id" id="" value="{{ $dokter1->id }}" hidden>
                    <input class='form-control' type="text" name="" id="dokter_id" value="{{ $dokter1->nama_dokter }}" disabled>
                </div>
                <input type="number" id="hari" name="hari" value="1" hidden>
                <div class="form-group">
                    <label for="keluhan">Keluhan</label>
                    <textarea class="form-control" id="keluhan" name="keluhan" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="penyakit">Penyakit</label>
                    <input class="form-control" type="text" id="penyakit" name="penyakit">
                </div>
                <td><input type="text" id="perkembangan" name="perkembangan" value="hari pertama" hidden></td>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="obat">Obat</label>
                            <input class="form-control" type="text" id="obat" name="obat">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="harga_obat">Harga Obat</label>
                            <input class="form-control" type="number" id="harga_obat" name="harga_obat">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="harga_checkup">Harga Checkup</label>
                    <input class="form-control" type="number" id="harga_checkup" name="harga_checkup">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="rujuk">Rujuk</label></td>
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
                    <div class="form-group">

                        <button class="btn btn-block btn-outline-light" style="color: #333333" type="submit">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

