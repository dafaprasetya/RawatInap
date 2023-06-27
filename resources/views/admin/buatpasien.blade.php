@extends('core.core')
@section('title')
    Invoice
@endsection
@section('content')
<div class="container">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="{{ route('buatpasienpost') }}">
        @csrf
        <div class="row d-flex justify-content-center" style="font-size: 13px">
            <div class="col-md-6">
                <div class="form-group input-group-sm">
                    <label for="nik">NIK:</label>
                    <input class="form-control" type="text" id="nik" name="nik" required maxlength="17">
                </div>
                <div class="form-group input-group-sm">
                    <label for="nama_pasien">Nama Pasien:</label>
                    <input class="form-control" type="text" id="nama_pasien" name="nama_pasien" required maxlength="45">
                </div>
                <div class="form-group input-group-sm">
                    <label for="no_hp">Nomor HP:</label>
                    <input class="form-control" type="number" id="no_hp" name="no_hp" required maxlength="13">
                </div>
                <div class="form-group input-group-sm">
                    <label for="alamat">Alamat:</label>

                    <textarea id="alamat" name="alamat" class="form-control" cols="30" rows="3"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group input-group-sm">
                            <label for="tgl_lahir">Tanggal Lahir:</label>
                            <input class="form-control" type="date" id="tgl_lahir" name="tgl_lahir" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group input-group-sm">
                            <label for="jenis_kelamin">Jenis Kelamin:</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group input-group-sm">
                            <label for="kamar_id">Kamar:</label>
                            <select class="form-control" id="kamar_id" name="kamar_id">
                                <option value="">Pilih Kamar</option>
                                <option value="" disabled>Kelas I</option>
                                @if ($kamar1->isEmpty())
                                    <option value="" disabled>Kamar Kelas I sedang kosong</option>
                                @else
                                @foreach($kamar1 as $kamar)
                                    <option value="{{ $kamar->id }}">{{ $kamar->nama_kamar }}</option>
                                @endforeach
                                @endif
                                    <option value="" disabled>Kelas II</option>
                                @foreach($kamar2 as $kamar)
                                    <option value="{{ $kamar->id }}">{{ $kamar->nama_kamar }}</option>
                                @endforeach
                                    <option value="" disabled>Kelas III</option>
                                @foreach($kamar3 as $kamar)
                                        <option value="{{ $kamar->id }}">{{ $kamar->nama_kamar }}</option>
                                @endforeach
                            </select>
                            </td>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group input-group-sm">
                            <label for="tgl_masuk">Tanggal Masuk:</label>
                            <input class="form-control" type="date" id="tgl_masuk" name="tgl_masuk" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group input-group-sm">
                            <label for="gol_darah">Golongan Darah:</label>
                            <select class="form-control" id="gol_darah" name="gol_darah" required>
                                <option value="A">A</option>
                                <option value="AB">AB</option>
                                <option value="B">B</option>
                                <option value="O">O</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group input-group-sm">
                            <label for="pekerjaan">Pekerjaan:</label>
                            <input class="form-control" type="text" id="pekerjaan" name="pekerjaan" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group input-group-sm">
                    <label for="warga_negara">Warga Negara:</label>
                    <select class="form-control" id="warga_negara" name="warga_negara" required>
                        <option value="WNA">WNA</option>
                        <option value="WNI">WNI</option>
                    </select>
                </div>
                <div class="form-group input-group-sm">
                    <label for="status">Status:</label></td>
                    <select class="form-control" id="status" name="status" required>
                        <option value="menikah">Menikah</option>
                        <option value="belum menikah">Belum Menikah</option>
                    </select>
                </div>
                <div class="form-group input-group-sm">
                    <label for="nama_kk">Nama Kepala Keluarga:</label>
                    <input class="form-control" type="text" id="nama_kk" name="nama_kk" required maxlength="45">
                </div>
                <div class="form-group input-group-sm">
                    <label for="pekerjaan_kk">Pekerjaan Kepala Keluarga:</label>
                    <input class="form-control" type="text" id="pekerjaan_kk" name="pekerjaan_kk" required maxlength="25">
                </div>
                <div class="form-group input-group-sm">
                    <label for="nama_penanggung_jwb">Nama Penanggung Jawab:</label>
                    <input class="form-control" type="text" id="nama_penanggung_jwb" name="nama_penanggung_jwb" required maxlength="45">
                </div>
                <div class="form-group input-group-sm">
                    <label for="nomor_penanggung_jwb">Nomor Penanggung Jawab:</label>
                    <input class="form-control" type="tel" id="nomor_penanggung_jwb" name="nomor_penanggung_jwb" required maxlength="13">
                </div>
                <div class="form-group input-group-sm">
                    <button class="form-control btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </div>

    </form>
</div>
@endsection
