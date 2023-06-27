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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
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
        $harga1 = Kamar::where('kelas','=','I')->first();
        $harga2 = Kamar::where('kelas','=','II')->first();
        $harga3 = Kamar::where('kelas','=','III')->first();
        $dokter = DB::table('dokters')->where('user_id','=', auth()->user()->id)->first();
        $invoice = Invoice::all();
        function getiddokter() {
            foreach (auth()->user()->dokter as $uid) {
                return $uid->id;
            }
        }
        // $visit  = DB::table('perkembangan_pasiens')->where('dokter_id','=',getiddokter())->get();
        $visit = PerkembanganPasien::where([
            'dokter_id' => getiddokter(),
            'selesai' => 'no',
            ])->get();
        $visitall = PerkembanganPasien::where([
            'dokter_id' => getiddokter(),
            ])->orderBy('id','DESC')->get();

        // $visit  = VisitDokter::where('dokter_id','=',auth()->user()->dokter->first());
        $kamar = Kamar::all();
        return view('dokter.index',[
            'kamar1'=>$kamar1,
            'kamar2'=>$kamar2,
            'kamar3'=>$kamar3,
            'kamar1terisi'=>$kamar1terisi,
            'kamar2terisi'=>$kamar2terisi,
            'kamar3terisi'=>$kamar3terisi,
            'harga1'=>$harga1,
            'harga2'=>$harga2,
            'harga3'=>$harga3,
            'dokter'=>$dokter,
            'visit'=>$visit,
            'visitall'=> $visitall,
            'invoice'=>$invoice,
        ]);
    }
    function buatvisit() {
        $pasien = Pasien::where('keluar','=','no')->get();
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
            'harga_obat' => 'required',
            'harga_checkup' => 'required',
            'rujuk' => 'required|in:yes,no',
            'selesai' => 'required|in:yes,no',
        ]);
        // Simpan data kunjungan
        $vd = VisitDokter::where(['perkembangan_pasien_id'=>$id, 'selesai'=>'no'])->get();
        $total_obat = $request->harga_obat + $vd[count($vd)-1]->harga_obat;
        $obat_sudah = $request->obat.', '.$vd[count($vd)-1]->obat_yang_sudah;
        $total_checkup = $request->harga_checkup + $vd[count($vd)-1]->harga_checkup;
        $visit = VisitDokter::create([
            'pasien_id' => $request->pasien_id,
            'dokter_id' => $request->dokter_id,
            'hari' => $request->hari,
            'keluhan' => $request->keluhan,
            'perkembangan' => $request->perkembangan,
            'penyakit' => $request->penyakit,
            'obat' => $request->obat,
            'obat_yang_sudah' => $obat_sudah,
            'harga_obat' => $total_obat,
            'harga_obat_ori' => $request->harga_obat,
            'harga_checkup_ori' => $request->harga_checkup,
            'harga_checkup' => $total_checkup,
            'rujuk' => $request->rujuk,
            'perkembangan_pasien_id' => $id,
            'selesai' => $request->selesai,
        ]);
        $total_all = ($total_obat + $total_checkup) + ($visit->pasien->kamar->harga * $visit->hari);


        if ($request->selesai == 'yes') {
            $kamar = Kamar::findOrFail($visit->pasien->kamar_id);
            $kamar->terisi = 'tidak';
            $kamar->save();
            $perkembangan = PerkembanganPasien::findOrFail($id);
            $perkembangan->selesai = 'yes';
            $perkembangan->save();
            $invoice = new Invoice();
            $invoice->pasien_id = $visit->pasien_id;
            $invoice->dokter_id = $visit->dokter_id;
            $invoice->kamar_id = $visit->pasien->kamar->id;
            $invoice->nama_pasien = $visit->pasien->nama_pasien;
            $invoice->harga_kamar = $visit->pasien->kamar->harga;
            $invoice->hari = $visit->hari;
            $invoice->total = $total_all;
            $invoice->total_obat_perhari = $total_obat;
            $invoice->obat = $obat_sudah;
            $invoice->total_checkup_perhari = $total_checkup;
            $invoice->save();
            $perkembangan = PerkembanganPasien::findOrFail($id);
            $perkembangan->invoice_id = $invoice->id;
            $perkembangan->save();
            $pasien = Pasien::findOrFail($visit->pasien_id);
            $pasien->keluar = 'yes';
            $pasien->save();
            return redirect()->route('dokter_index');
        }else{

            return redirect()->back()->with('success', 'Data kunjungan dokter berhasil disimpan.');
        }

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
            'harga_obat' => 'required',
            'harga_checkup' => 'required',
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
        $vd = VisitDokter::where(['perkembangan_pasien_id'=>$perkembangan->id, 'selesai' => 'no'])->get();

        if (count($vd) == 0) {

            $total_obat = $request->harga_obat;
            $total_checkup = $request->harga_checkup;
            $obat_sudah = $request->obat;
        }else{

            $total_obat = $request->harga_obat + $vd[count($vd)-1]->harga_obat;
            $total_checkup = $request->harga_checkup + $vd[count($vd)-1]->harga_checkup;
            $obat_sudah = $request->obat.$vd[count($vd)-1]->obat;
        }
        $visit = VisitDokter::create([
            'pasien_id' => $request->pasien_id,
            'dokter_id' => $request->dokter_id,
            'hari' => $request->hari,
            'keluhan' => $request->keluhan,
            'perkembangan' => $request->perkembangan,
            'penyakit' => $request->penyakit,
            'obat' => $request->obat,
            'obat_yang_sudah' => $obat_sudah,
            'harga_obat' => $total_obat,
            'harga_obat_ori' => $request->harga_obat,
            'harga_checkup_ori' => $request->harga_checkup,
            'harga_checkup' => $total_checkup,
            'rujuk' => $request->rujuk,
            'perkembangan_pasien_id' => $perkembangan->id,
            'selesai' => $request->selesai,
        ]);
        $perkembangan->visit_dokter_id = $visit->id;

        // Notifikasi atau pesan berhasil
        return redirect()->route('dokter_checkup', $perkembangan->id)->with('success', 'Data kunjungan dokter berhasil disimpan.');


    }

}
