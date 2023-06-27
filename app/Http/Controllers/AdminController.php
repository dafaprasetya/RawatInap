<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Invoice;
use App\Models\Kamar;
use App\Models\Pasien;
use App\Models\PerkembanganPasien;
use App\Models\User;
use App\Models\VisitDokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function index() {
        $kamar1terisi = DB::table('kamars')->where('kelas','=','I')->where('terisi','=','ya')->get();
        $kamar2terisi = DB::table('kamars')->where('kelas','=','II')->where('terisi','=','ya')->get();
        $kamar3terisi = DB::table('kamars')->where('kelas','=','III')->where('terisi','=','ya')->get();
        $kamar1 = DB::table('kamars')->where('kelas','=','I')->where('terisi','=','tidak')->get();
        $kamar2 = DB::table('kamars')->where('kelas','=','II')->where('terisi','=','tidak')->get();
        $kamar3 = DB::table('kamars')->where('kelas','=','III')->where('terisi','=','tidak')->get();
        $harga1 = Kamar::where('kelas','=','I')->first();
        $harga2 = Kamar::where('kelas','=','II')->first();
        $harga3 = Kamar::where('kelas','=','III')->first();
        $kamar = Kamar::all();
        $pasiendirawat = DB::table('pasiens')->where('keluar','=','no')->get();
        $pasienselesai = DB::table('pasiens')->where('keluar','=','yes')->get();
        $dokter = Dokter::all();
        $visit = PerkembanganPasien::all();
        $invoice = Invoice::all();
        $vd = VisitDokter::all();

        return view('admin.index',[
            'kamar1'=>$kamar1,
            'kamar2'=>$kamar2,
            'kamar3'=>$kamar3,
            'kamar1terisi'=>$kamar1terisi,
            'kamar2terisi'=>$kamar2terisi,
            'kamar3terisi'=>$kamar3terisi,
            'pasiendirawat'=>$pasiendirawat,
            'pasienselesai'=>$pasienselesai,
            'dokter'=>$dokter,
            'kamar'=>$kamar,
            'harga1'=>$harga1,
            'harga2'=>$harga2,
            'harga3'=>$harga3,
            'dokter'=>$dokter,
            'invoice'=>$invoice,
            'visit' =>$visit
        ]);
    }
    function pasiendone()
    {
        $pasien = PerkembanganPasien::where('selesai','=','yes')->get();
        $invoice = Invoice::all();
        return view('admin.index',['pasien'=>$pasien,'invoice'=>$invoice,]);
    }
    function pasiendirawat()
    {
        $pasien = PerkembanganPasien::where('selesai','=','no')->get();

        return view('admin.index',['pasien'=>$pasien]);
    }
    function buatpasien() {
        $kamar = Kamar::all();
        $kamar1 = DB::table('kamars')->where('kelas','=','I')->where('terisi','=','tidak')->get();
        $kamar2 = DB::table('kamars')->where('kelas','=','II')->where('terisi','=','tidak')->get();
        $kamar3 = DB::table('kamars')->where('kelas','=','III')->where('terisi','=','tidak')->get();
        return view('admin.buatpasien',[
            'kamars'=>$kamar,
            'kamar1'=>$kamar1,
            'kamar2'=>$kamar2,
            'kamar3'=>$kamar3,
        ]);
    }
    function buatpasienp(Request $request) {
        $validatedData = $request->validate([
            'nik' => 'required|string|max:17',
            'nama_pasien' => 'required|string|max:45',
            'no_hp' => 'required|string|max:13',
            'alamat' => 'required|string|max:45',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'kamar_id' => 'nullable|exists:kamars,id',
            'tgl_masuk' => 'required|date',
            'gol_darah' => 'required|in:A,AB,B,O',
            'pekerjaan' => 'required|string|max:25',
            'warga_negara' => 'required|in:WNA,WNI',
            'status' => 'required|in:menikah,belum menikah',
            'nama_kk' => 'required|string|max:45',
            'pekerjaan_kk' => 'required|string|max:25',
            'nama_penanggung_jwb' => 'required|string|max:45',
            'nomor_penanggung_jwb' => 'required|string|max:13',
        ]);
        // Buat instance model Kamar baru
        $pasien = new Pasien();
        $pasien->nik = $validatedData['nik'];
        $pasien->nama_pasien = $validatedData['nama_pasien'];
        $pasien->no_hp = $validatedData['no_hp'];
        $pasien->alamat = $validatedData['alamat'];
        $pasien->tgl_lahir = $validatedData['tgl_lahir'];
        $pasien->jenis_kelamin = $validatedData['jenis_kelamin'];
        $pasien->kamar_id = $validatedData['kamar_id'];
        $pasien->tgl_masuk = $validatedData['tgl_masuk'];
        $pasien->gol_darah = $validatedData['gol_darah'];
        $pasien->pekerjaan = $validatedData['pekerjaan'];
        $pasien->warga_negara = $validatedData['warga_negara'];
        $pasien->status = $validatedData['status'];
        $pasien->nama_kk = $validatedData['nama_kk'];
        $pasien->pekerjaan_kk = $validatedData['pekerjaan_kk'];
        $pasien->nama_penanggung_jwb = $validatedData['nama_penanggung_jwb'];
        $pasien->nomor_penanggung_jwb = $validatedData['nomor_penanggung_jwb'];
        $pasien->save();
        $kamar = Kamar::findOrFail($request['kamar_id']);
        $kamar->terisi = 'ya';
        $kamar->save();

        return redirect()->route('index')->with('success', 'Data Kamar berhasil disimpan.');
        // return redirect()->back()->withErrors($validatedData)->withInput();
    }
    function buatdokter()
    {
        $user = DB::table('users')->where('role','=','user')->get();
        return view('admin.buatdokter',['user'=>$user]);
    }
    function buatdokterp(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|numeric',
            'nama_dokter' => 'required|string|max:45',
            'user_id' => 'required|exists:users,id',
            'spesialis' => 'required|string|max:25',
            'jadwal' => 'required|string|max:45',
        ]);
        $dokter = new Dokter();
        $dokter->nik = $request->nik;
        $dokter->nama_dokter = $request->nama_dokter;
        $dokter->spesialis = $request->spesialis;
        $dokter->jadwal = $request->jadwal;
        $dokter->user_id = $request->user_id;
        $dokter->save();
        $user = User::findOrFail($request['user_id']);
        $user->role = 'dokter';
        $user->save();

        return redirect()->route('index')->with('success', 'Data dokter berhasil disimpan');

    }
    function invoice($id)
    {
        $invoice = Invoice::findOrFail($id);
        $perkembangan = PerkembanganPasien::where('invoice_id','=',$id)->first();
        return view('admin.invoice',[
            'invoice'=>$invoice,
            'perkembangan'=>$perkembangan,
        ]);
    }
}
