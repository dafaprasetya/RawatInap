<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Kamar;
use App\Models\Pasien;
use App\Models\PerkembanganPasien;
use App\Models\User;
use App\Models\VisitDokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DokterController extends Controller
{
    function index() {
        $kamar1terisi = DB::table('kamars')->where('kelas','=','I')->where('terisi','=','ya')->get();
        $kamar2terisi = DB::table('kamars')->where('kelas','=','II')->where('terisi','=','ya')->get();
        $kamar3terisi = DB::table('kamars')->where('kelas','=','III')->where('terisi','=','ya')->get();
        $kamar1 = DB::table('kamars')->where('kelas','=','I')->where('terisi','=','tidak')->get();
        $kamar2 = DB::table('kamars')->where('kelas','=','II')->where('terisi','=','tidak')->get();
        $kamar3 = DB::table('kamars')->where('kelas','=','III')->where('terisi','=','tidak')->get();
        $dokter = DB::table('dokters')->where('user_id','=', auth()->user()->id)->get();
        function getiddokter() {
            foreach (auth()->user()->dokter as $uid) {
                return $uid->id;
            }
        }
        $visit  = VisitDokter::where('dokter_id','=',getiddokter())->first();
        // $visit  = VisitDokter::where('dokter_id','=',auth()->user()->dokter->first());
        $kamar = Kamar::all();
        return view('dokter.index',[
            'kamar1'=>$kamar1,
            'kamar2'=>$kamar2,
            'kamar3'=>$kamar3,
            'kamar1terisi'=>$kamar1terisi,
            'kamar2terisi'=>$kamar2terisi,
            'kamar3terisi'=>$kamar3terisi,
            'dokter'=>$dokter,
            'visit'=>$visit,
        ]);
    }
    function buatvisit() {
        $pasien = Pasien::all();
        $dokter = Dokter::all();
        $dokter1 = Dokter::where('user_id','=', auth()->user()->id)->first();

        return view('dokter.buatvisit',['pasien'=>$pasien,'dokter'=>$dokter,'dokter1'=>$dokter1]);
    }
    function checkup($id) {
        $checkup = VisitDokter::findOrFail($id);
        $checkkk = PerkembanganPasien::findOrFail($id);
        return view('dokter.checkup',['checkup'=>$checkup, 'chek'=>$checkkk]);
    }
    function perkembangan(Request $request, $id) {
         // Validasi input
         $request->validate([
            'pasien_id' => 'required',
            'dokter_id' => 'required',
            'hari' => 'required|integer',
            'keluhan' => 'required',
            'perkembangan' => 'required',
            'penyakit' => 'required',
            'obat' => 'required',
            'rujuk' => 'required|in:yes,no',
            'selesai' => 'required|in:yes,no',
        ]);
        // Simpan data kunjungan
        $visit = VisitDokter::create([
            'pasien_id' => $request->pasien_id,
            'dokter_id' => $request->dokter_id,
            'hari' => $request->hari,
            'keluhan' => $request->keluhan,
            'perkembangan' => $request->perkembangan,
            'penyakit' => $request->penyakit,
            'obat' => $request->obat,
            'rujuk' => $request->rujuk,
            'perkembangan_pasien_id' => $id,
            'selesai' => $request->selesai,
        ]);
        return redirect()->back()->with('success', 'Data kunjungan dokter berhasil disimpan.');

    }
    function buatvisitp(Request $request) {
        // Validasi input
        $request->validate([
            'pasien_id' => 'required',
            'dokter_id' => 'required',
            'hari' => 'required|integer',
            'keluhan' => 'required',
            'perkembangan' => 'required',
            'penyakit' => 'required',
            'obat' => 'required',
            'rujuk' => 'required|in:yes,no',
            'selesai' => 'required|in:yes,no',
        ]);
        $perkembangan = PerkembanganPasien::create([
            'pasien_id' => $request->pasien_id,
            'dokter_id' => $request->dokter_id,
            'hari' => $request->hari,
            'keluhan' => $request->keluhan,
            'perkembangan' => $request->perkembangan,
            'penyakit' => $request->penyakit,
            'obat' => $request->obat,
            'rujuk' => $request->rujuk,
            'selesai' => $request->selesai,
        ]);
        // Simpan data kunjungan
        $visit = VisitDokter::create([
            'pasien_id' => $request->pasien_id,
            'dokter_id' => $request->dokter_id,
            'hari' => $request->hari,
            'keluhan' => $request->keluhan,
            'perkembangan' => $request->perkembangan,
            'penyakit' => $request->penyakit,
            'obat' => $request->obat,
            'rujuk' => $request->rujuk,
            'perkembangan_pasien_id' => DB::getPdo()->lastInsertId(),
            'selesai' => $request->selesai,
        ]);
        $perkembangan->visit_dokter_id = $visit->id;

        // Notifikasi atau pesan berhasil
        return redirect()->route('dokter_checkup', $visit->id)->with('success', 'Data kunjungan dokter berhasil disimpan.');


    }
}
