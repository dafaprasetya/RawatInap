<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->role =='admin') {
            return redirect()->route('index');
        }elseif (auth()->user()->role == 'dokter') {
            return redirect()->route('dokter_index');
        } else{
            $kamar1terisi = DB::table('kamars')->where('kelas','=','I')->where('terisi','=','ya')->get();
            $kamar2terisi = DB::table('kamars')->where('kelas','=','II')->where('terisi','=','ya')->get();
            $kamar3terisi = DB::table('kamars')->where('kelas','=','III')->where('terisi','=','ya')->get();
            $kamar1 = DB::table('kamars')->where('kelas','=','I')->where('terisi','=','tidak')->get();
            $kamar2 = DB::table('kamars')->where('kelas','=','II')->where('terisi','=','tidak')->get();
            $kamar3 = DB::table('kamars')->where('kelas','=','III')->where('terisi','=','tidak')->get();
            return view('home',[
                'kamar1'=>$kamar1,
                'kamar2'=>$kamar2,
                'kamar3'=>$kamar3,
                'kamar1terisi'=>$kamar1terisi,
                'kamar2terisi'=>$kamar2terisi,
                'kamar3terisi'=>$kamar3terisi,
            ]);
        }
    }
}
