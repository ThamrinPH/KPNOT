<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
//load models
use App\Jadwal;
use App\Klien;
use App\Legal;
use App\Notariil;
use App\Warmerken;
use App\Ppat;
use App\Properti;
use App\Retribusi;
use App\Sk;
use App\Transaksi;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;



class FrontController extends Controller {
   
   
    private $page;


    public function __construct() {
        $this->page = new \stdClass();
        $this->user = Auth::user();
    }

    private function set_title($title) {
        if ($title === '') {
            $this->page->html_title = config('app.name');
        } else {
            $this->page->html_title = $title . ' | ' . config('app.name');
        }
        $this->page->title = $title;
    }
    
    //INDEX
    public function home() {
        $objects = Jadwal::with('klien')->get();
        $this->set_title('');
        return view('index2', [
            'page' => $this->page,
            'objects' => $objects
        ]);
    }

    //INDEX
    public function index() {
        $this->set_title('');
        return view('index', [
            'page' => $this->page
        ]);
    }

    public function laporan(){
        $this->set_title('Laporan');
        return view('admin.laporan',[
            'page'=> $this->page]);
    }

    public function laporan_pengeluaran(){
        $this->set_title('Laporan Pengeluaran');
        return view('admin.pengeluaran',[
            'page'=> $this->page]);
    }

    public function dashboard() {
        //niki dashboard
        $kliens = klien::count('id');
        $sks = Sk::count('id');
        $dretribusi = Retribusi::select('nominal')->get();
        $dtransaski = Transaksi::select('nominal')->get();
        $retribusis = Retribusi::sum('nominal');
        $transaksis = Transaksi::sum('nominal');
       
        $this->set_title('Dashboard');
        return view('admin.dashboard', [
            'kliens' => $kliens,
            'sks' => $sks,
            'retribusis' => $retribusis,
            'transaksis' => $transaksis,
            'page' => $this->page,
        ]);
    }

    public function login() {
        $this->set_title('');
        if ($this->user) {
            return redirect()->route('dashboard');
        } else {
            return view('auth.login', [
                'page' => $this->page
            ]);
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('index');
    }

    public function login_post(Request $req) {
        $email = $req->input('email');
        $password = $req->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->withErrors('Username and password do not match');
        }
    }

    //Revenue

    public function monthrvn($month = 1){
        $thismonth = DB::table('retribusi')
        ->select(DB::raw("(SUM(transaksis.nominal)-SUM(retribusis.nominal)) as revenue"))
        ->join('sks','retribusis.sk_id','=','sks.id')
         ->join('transaksis','sks.id','=','transaksis.sk_id')
         ->whereMonth('transaksis.waktu','=',$bln)
         ->whereYear('transaksis.waktu','=',$thisthn)
         ->get();

         return;
    }
    public function revenue() {
        $sum = [];
       $thisthn=Carbon::parse(Carbon::today())->format('Y');
        for ($i=1; $i < 13 ; $i++) { 
            $objects = DB::table('retribusis')
             ->select(DB::raw("(SUM(transaksis.nominal)-SUM(retribusis.nominal)) as revenue, MONTH(transaksis.waktu) as bulan"))
             ->join('sks','retribusis.sk_id','=','sks.id')
             ->join('transaksis','sks.id','=','transaksis.sk_id')
             ->whereMonth('transaksis.waktu','=',$i)
             ->whereYear('transaksis.waktu','=',$thisthn)
             ->groupBy("bulan")
             ->get();
            $sum[$i] = $objects;
        }
        //dd($sum);
        
        $this->set_title('Revenue perbulan pada tahun '.$thisthn);
        return view('admin.revenue', [
            'page' => $this->page,
            'objects' => $objects,
            'sum' => $sum,
            'thisthn' => $thisthn
        ]);
    }

    //JADWAL
    public function jadwal_list() {
        $objects = Jadwal::with('klien')->get();
        $this->set_title('Semua Jadwal');
        return view('admin.jadwal.jadwal-index', [
            'page' => $this->page,
            'objects' => $objects
        ]);
    }
    public function jadwal_calendar() {
        $objects = Jadwal::with('klien')->get();
        $this->set_title('Kalendar');
        return view('admin.jadwal.calendar', [
            'page' => $this->page,
            'objects' => $objects
        ]);
    }
    public function jadwal_createEdit($id = 0) {
        if ($id === 'new') {
            $this->set_title('Jadwal Baru');
            $object = new Jadwal();
        } else {
            $object = Jadwal::with('klien')->find($id);
            $this->set_title('Ubah Jadwal');
        }
        $relations = [];
        $relations['kliens'] = Klien::select(['nama', 'id'])->get();
        return view('admin.jadwal.jadwal-createEdit', [
            'page' => $this->page,
            'object' => $object,
            'relations' => $relations
        ]);
    }
    public function jadwal_save(Request $req) {
        $jadwal = createOrEditObject("App\\Jadwal", $req);

        //process time range
        $range = $req->input('range');
        $range = explode(';', $range);
        $mulai = sliderTimeToTimeString($range[0]);
        $selesai = sliderTimeToTimeString($range[1]);
        //endprocess

        $jadwal->mulai = $mulai;
        $jadwal->selesai = $selesai;
        saveObjectFromInput($jadwal, $req, [
            'tanggal' => 'date',
            'keterangan' => '-',
            'klien_id' => '-'
        ]);
        return redirect()->route('jadwal_createEdit', $jadwal->id)->with('success','');
    }
    public function jadwal_del($id){
        $jadwal = Jadwal::find($id);  
        $jadwal->delete();
        return redirect()->route('jadwal_list')->with('success','Jadwal berhasil dihapus');
    }
    public function jadwal_set(Request $req) {
        return redirect()->back()->with('success', 'delete');
    }

    //KLIEN
    public function klien_list() {
        $jadwal = [];
        $objects = Klien::with('jadwals', 'sks')->get();
        $this->set_title('Semua Klien');
        return view('admin.klien.klien-index', [
            'page' => $this->page,
            'objects' => $objects
        ]);
    }

    public function klien_createEdit($id = 0) {
        if ($id === 'new') {
            $this->set_title('Klien Baru');
            $object = new Jadwal();
        } else {
            $object = Klien::with('jadwals')->find($id);
            $this->set_title('Ubah Klien');
        }
        return view('admin.klien.klien-createEdit', [
            'page' => $this->page,
            'object' => $object,
        ]);
    }

    public function klien_save(Request $req) {
        $klien = createOrEditObject("App\\Klien", $req);
        saveObjectFromInput($klien, $req, [
            'no_ktp' => '-',
            'nama' => '-',
            'tgl_lahir' => 'date',
            'tempat_lahir' => '-',
            'alamat' => '-',
            'rt' => '-',
            'rw' => '-',
            'desa' => '-',
            'kecamatan' => '-',
            'kabupaten' => '-',
            'provinsi' => '-',
            'kodepos' => '-',
            'warga_negara' => '-',
            'status_pernikahan' => '-',
            'pekerjaan' => '-',
            'agama' => '-',
            'telpon' => '-',
            'handphone' => '-',
            'npwp' => '-',
        ]);

        return redirect()->route('klien_createEdit', $klien->id)->with('success','');
    }


    //LEGAL
    public function legal_list() {
        $objects = Legal::with('sk')->get();
        $relations['kliens'] = Klien::get();
        foreach ($objects as $object) {
            $object->lklien = unserialize($object->lklien);
        }
        $this->set_title('Semua Legal');
        return view('admin.legal.legal-index', [
            'page' => $this->page,
            'objects' => $objects,
            'relations' => $relations,
        ]);
    }

    public function legal_createEdit($id = 0) {
        if ($id === 'new') {
            $this->set_title('Legal Baru');
            $object = new Jadwal();
        } else {
            $object = Legal::with('sk')->find($id);
            $this->set_title('Ubah Legal');
        }
        $relations = [];
        $relations['sks'] = Sk::get();
        $relations['kliens'] = Klien::get();
        $object->lklien=unserialize($object->lklien);
        return view('admin.legal.legal-createEdit', [
            'page' => $this->page,
            'object' => $object,
            'relations' => $relations,
        ]);
    }

    public function legal_save(Request $req) {
        
        if ($req->hasFile('lampiran')){
            $temp = $req->file('lampiran')->getClientOriginalName();
            $req['lampiran']=$temp;
            Storage::putFileAs('Legal', $req->file('lampiran'),$temp);
        }else{
            Storage::url($req['lampiran']);
            $req->hasFile('lampiran');
        }
        $legal = createOrEditObject("App\\Legal", $req);
        saveObjectFromInput($legal, $req, [
            'no_akta' => '-',
            'berita_acara' => '-',
            'lklien' => 'serialize',
            'waktu' => 'date',
            'keterangan' => '-',
            'lampiran' => '-',
            'sk_id' => '-',
        ]);
        return redirect()->route('legal_createEdit', $legal->id)->with('success','');
    }

    public function download_legal($lampiran){
        return  response()->download(storage_path('app/Legal/'.$lampiran));
    }

    public function legal_set(Request $req) {
        
    }

    //NOTARIIL
    public function notariil_list() {
        $objects = Notariil::with('sk')->get();
        $kliens = Klien::get();
        foreach ($objects as $object) {
            $object->lklien = unserialize($object->lklien);
        }
        $this->set_title('Semua Notariil');
        return view('admin.notariil.notariil-index', [
            'page' => $this->page,
            'objects' => $objects,
            'kliens' => $kliens
        ]);
    }

    public function notariil_createEdit($id = 0) {
        if ($id === 'new') {
            $this->set_title('Notariil Baru');
            $object = new Jadwal();
        } else {
            $object = Notariil::with('sk')->find($id);
            $this->set_title('Ubah Notariil');
        }
        $relations = [];
        $relations['sks'] = Sk::get();
        $relations['kliens'] = Klien::get();
        $object->lklien = unserialize($object->lklien);
        return view('admin.notariil.notariil-createEdit', [
            'page' => $this->page,
            'object' => $object,
            'relations' => $relations
        ]);
    }

    public function notariil_save(Request $req) {
       
        if ($req->hasFile('lampiran')){
             $temp = $req->file('lampiran')->getClientOriginalName();
        $req['lampiran']=$temp;
            Storage::putFileAs('Notariil', $req->file('lampiran'),$temp);
        }else{

        }
        $notariil = createOrEditObject("App\\Notariil", $req);
        saveObjectFromInput($notariil, $req, [
            'no_akta' => '-',
            'lampiran' => '-',
            'berita_acara' => '-',
            'keterangan' => '-',
            'waktu' => 'datetime',
            'sk_id' => '-',
            'lklien' => 'serialize'
        ]);

        return redirect()->route('notariil_createEdit', $notariil->id)->with('success','');
    }

    public function download_notariil($lampiran){
        return  response()->download(storage_path('app/Notariil/'.$lampiran));
    }

    //PPAT

    public function ppat_list() {
        $objects = Ppat::with('sk', 'properti')->get();
        $kliens = Klien::get();
        foreach ($objects as $object) {
            $object->lklien = unserialize($object->lklien);
        }
        $this->set_title('Semua PPAT');
        return view('admin.ppat.ppat-index', [
            'page' => $this->page,
            'objects' => $objects,
            'kliens' => $kliens
        ]);
    }

    public function ppat_createEdit($id = 0) {
        if ($id === 'new') {
            $this->set_title('PPAT Baru');
            $object = new Jadwal();
        } else {
            $object = Ppat::with('sk', 'properti')->find($id);
            $this->set_title('Ubah PPAT');
        }
        $relations = [];
        $relations['sks'] = Sk::get();
        $relations['propertis'] = Properti::get();
        $kliens = Klien::get();
        $object->lklien = unserialize($object->lklien);
        //$relations['klien']= Ppat::join('sks','ppats.sk_id','=','sks.id')->join()
        return view('admin.ppat.ppat-createEdit', [
            'page' => $this->page,
            'object' => $object,
            'relations' => $relations,
            'kliens' => $kliens
        ]);
    }

    public function ppat_save(Request $req) {
        
        if ($req->hasFile('lampiran')){
            $temp =$req->file('lampiran')->getClientOriginalName();
            $req['lampiran']=$temp;
            Storage::putFileAs('PPAT',$req->file('lampiran'), $temp);
        }else{
            dd(Storage::url($req['lampiran']));
            dd($req->hasFile('lampiran'));
        }
         $ppat = createOrEditObject("App\\Ppat", $req);
        //dd($req->lampiran);
        saveObjectFromInput($ppat, $req, [
            'no_akta' => '-',
            'berita_acara' => '-',
            'keterangan' => '-',
            'lampiran' => '-',
            'waktu' => 'datetime',
            'ht' => '-',
            'waktu_ssp' => 'datetime',
            'ssp' => '-',
            'waktu_bphtb' => 'datetime',
            'bphtb' => '-',
            'sk_id' => '-',
            'lklien' => 'serialize'
            
        ]);

        return redirect()->route('ppat_createEdit', $ppat->id)->with('success','');
    }

    public function download_ppat($lampiran){
        return  response()->download(storage_path('app/PPAT/'.$lampiran));
    }

    //PROPERTI
    public function properti_list() {
        $objects = Properti::with('ppat')->get();
        $this->set_title('Semua Properti');
        return view('admin.properti.properti-index', [
            'page' => $this->page,
            'objects' => $objects
        ]);
    }

    public function properti_createEdit($id = 0) {
        if ($id === 'new') {
            $this->set_title('Properti Baru');
            $object = new Jadwal();
        } else {
            $object = Properti::with('ppat')->find($id);
            $this->set_title('Ubah Properti');
        }
        $relations = [];
        $relations['ppats'] = Ppat::get();
        return view('admin.properti.properti-createEdit', [
            'page' => $this->page,
            'object' => $object,
            'relations' => $relations
        ]);
    }

    public function properti_save(Request $req) {
        if ($req->hasFile('lampiran')){
            $temp = $req->file('lampiran')->getClientOriginalName();
            $req->lampiran=$temp;
            Storage::putFileAs('Properti', $req->file('lampiran'),$temp);
        }
        $properti = createOrEditObject("App\\Properti", $req);
        saveObjectFromInput($properti, $req, [
            'jenis_hak' => '-',
            'no_hak' => '-',
            'desa' => '-',
            'akhr_tgl_hak' => 'datetime',
            'nib' => '-',
            'letak' => '-',
            'jenis_asal_hak' => '-',
            'asal_hak' => '-',
            'jenis_dp' => '-',
            'tgl_dp' => 'datetime',
            'no_dp' => '-',
            'tgl_su' => 'datetime',
            'no_su' => '-',
            'luastanah' => '-',
            'nama_pemegang_hak' => '-',
            'jenis_date_hak' => '-',
            'tgl_pemeganghak' => 'datetime',
            'tempat_pps' => '-',
            'tgl_pps' => 'datetime',
            'disahkanoleh' => '-',
            'nomor_ssp' => '-',
            'luasbangunan' => '-',
            'nop' => '-',
            'njop' => '-',
            'pemeganghak' => '-',
            'ppat_id' => '-',
            'lampiran' => '-',
        ]);

        return redirect()->route('properti_createEdit', $properti->id)->with('success','');
    }

    public function download_properti($lampiran){
        return  response()->download(storage_path('app/Properti/'.$lampiran));
    }

    public function properti_set(Request $req) {
        
    }
    //RETRIBUSI
    public function retribusi_list() {
        $objects = Retribusi::with('sk')->get();
        $this->set_title('Semua Retribusi');
        return view('admin.retribusi.retribusi-index', [
            'page' => $this->page,
            'objects' => $objects
        ]);
    }

    public function retribusi_createEdit($id = 0) {
        if ($id === 'new') {
            $this->set_title('Retribusi Baru');
            $object = new Jadwal();
        } else {
            $object = Retribusi::with('sk')->find($id);
            $this->set_title('Ubah Retribusil');
        }
        $relations = [];
        $relations['sks'] = Sk::get();
        return view('admin.retribusi.retribusi-createEdit', [
            'page' => $this->page,
            'object' => $object,
            'relations' => $relations
        ]);
    }

    public function retribusi_save(Request $req) {
        
        if ($req->hasFile('lampiran')){
            $temp = $req->file('lampiran')->getClientOriginalName();
            $req['lampiran']=$temp;
            Storage::putFileAs('Retribusi', $req->file('lampiran'),$temp);
        }else{
            dd(Storage::url($req['lampiran']));
            dd($req->hasFile('lampiran'));
        }
    
        $retribusi = createOrEditObject("App\\Retribusi", $req);
        saveObjectFromInput($retribusi, $req, [
            'waktu' => 'datetime',
            'lampiran' => '-',
            'jenis' => '-',
            'keterangan' => '-',
            'nominal' => '-',
            'sk_id' => '-',
        ]);

        return redirect()->route('retribusi_createEdit', $retribusi->id)->with('success','');
    }

    public function retribusi_detail(Request $req) {
       $bln=Carbon::parse(Carbon::today())->format('m');
       $thisthn=Carbon::parse(Carbon::today())->format('Y');
        if (empty($req->month)){
            $objects = DB::table('retribusis')
             ->select(DB::raw("*"))
             ->whereMonth('waktu','=',$bln)
             ->whereYear('waktu','=',$thisthn)
             ->get();
            $sum = $objects->sum('nominal');
        }else{
             $objects = DB::table('retribusis')
             ->select(DB::raw("*"))
             ->whereMonth('waktu','=',$req->month)
             ->whereYear('waktu','=',$req->year)
             ->get();
            $sum = $objects->sum('nominal');
        }
        $this->set_title('Pengeluaran Bulanan');
        return view('admin.retribusi.retribusi-details', [
            'page' => $this->page,
            'objects' => $objects,
            'sum' => $sum,
            'thisthn' => $thisthn
        ]);
    }

    public function download_retribusi($lampiran){
        return  response()->download(storage_path('app/Retribusi/'.$lampiran));
    }

    //SK
    public function sk_details($id){
        $this->set_title('Detail Surat Kerja');
        $objects = Sk::with('transaksis','retribusis','klien')->where('id',$id)->get();
        $transaksis = Transaksi::where('sk_id',$id)->get();
        $retribusis = Retribusi::where('sk_id',$id)->get();
        return view('admin.sk.sk-details',[
            'page' => $this->page,
            'objects' => $objects,
            'transaksis' => $transaksis,
            'retribusis' => $retribusis
            ]);
    }
    
    public function sk_list() {
        $objects = Sk::with('warmerkens', 'notariils', 'legals', 'transaksis', 'retribusis', 'ppats', 'user', 'klien')->get();
        $this->set_title('Semua Surat Kerja');
        return view('admin.sk.sk-index', [
            'page' => $this->page,
            'objects' => $objects
        ]);
    }

    public function sk_createEdit($id = 0) {
        $relations = [];
        $relations['kliens'] = Klien::get();
        $relations['users'] = User::get();     
        $relations['warmerken'] = Warmerken::where('sk_id',$id)->get();
        $edits=0;
        if ($id === 'new') {
            $this->set_title('Surat Kerja Baru');
            $this->page->html_status=0;
            $object = new Jadwal();
        } else {
            $object = Sk::with('warmerkens', 'notariils', 'legals', 'transaksis', 'retribusis', 'ppats', 'user', 'klien')->find($id);
             if ($object->jenis_transaksi === 'PPAT'){
                 $edits = Ppat::where('sk_id',$id)->get();
             } elseif ($object->jenis_transaksi === 'Notariil') {
                 $edits = Notariil::where('sk_id',$id)->get();
             } elseif ($object->jenis_transaksi === 'Legal') {
                 $edits = Legal::where('sk_id',$id)->get();
             } elseif ($object->jenis_transaksi === 'Warmerken') {
                 $edits = Warmerken::where('sk_id',$id)->get();
             }
            $this->set_title('Ubah Surat Kerja');
            $this->page->html_status=1;
            foreach ($edits as $edit) {
                 $edit->lklien=unserialize($edit->lklien);
                 //dd($edit->lklien);
            }
        }
        return view('admin.sk.sk-createEdit', [
            'page' => $this->page,
            'object' => $object,
            'relations' => $relations,
            'edits' => $edits
        ]);
    }

    public function sk_save(Request $req) {
        $now = Carbon::now();
        $req->status_pembayaran = 'Belum Lunas';
        $req->status_pengerjaan = 'Belum Selesai';
        $sk = createOrEditObject("App\\Sk", $req);
        $type=$req->get('jenis_transaksi');
        $tmplklien=serialize($req->lklien);
        
        saveObjectFromInput($sk, $req, [
            'user_id' => '-',
            'keterangan' => '-',
            'klien_id' => '-',
            'jenis_transaksi' => '-',
            'nilai_transaksi' => '-',
            'status_pembayaran' => '-',
            'status_pengerjaan' => '-'
        ]);
        $skid = $sk->id;
        if (empty($req->sk_id)) {
            if ($type == 'PPAT'){
                $ppat = new Ppat;
                $ppat->berita_acara = $req->berita_acara;
                $ppat->lklien = $tmplklien;
                $ppat->sk_id = $skid;
                $ppat->waktu = $now;
                $ppat->waktu_ssp = $now;
                $ppat->waktu_bphtb = $now;
                $ppat->save();
            }elseif ($type == 'Notariil') {
                $notariil = new Notariil;
                $notariil->berita_acara = $req->berita_acara;
                $notariil->lklien = $tmplklien;
                $notariil->sk_id = $skid;
                $notariil->waktu = $now;
                $notariil->save();
            }elseif ($type == 'Legal') {
                $legal = new Legal;
                $legal->berita_acara = $req->berita_acara;
                $legal->lklien = $tmplklien;
                $legal->sk_id = $skid;
                $legal->waktu = $now;
                $legal->save();
            }else {
                $warmek = new Warmerken;
                $warmek->berita_acara = $req->berita_acara;
                $warmek->lklien = $tmplklien;
                $warmek->sk_id = $skid;
                $warmek->waktu = $now;
                $warmek->save();
            }
        }
        else
        {
            if ($type == 'PPAT'){
                $ppat = Ppat::where('sk_id',$skid);
                $ppat->berita_acara = $req->berita_acara;
                $ppat->lklien = $tmplklien;
                $ppat->save();
            }elseif ($type == 'Notariil') {
                $notariil = Notariil::where('sk_id',$skid);
                $notariil->berita_acara = $req->berita_acara;
                $notariil->lklien = $tmplklien;
                $notariil->save();
            }elseif ($type == 'Legal') {
                $legal = Legal::where('sk_id',$skid);
                $legal->berita_acara = $req->berita_acara;
                $legal->lklien = $tmplklien;
                $legal->save();
            }else {
                $warmek = Warmerken::where('sk_id',$skid);
                $warmek->berita_acara = $req->berita_acara;
                $warmek->lklien = $tmplklien;
                $warmek->save();
            }
        }


        return redirect()->route('sk_createEdit', $sk->id)->with('success','');
    }

    public function sk_set(Request $req) {
        
    }

    public function laporan_pemasukan(){
        $objects = Transaksi::with('sk')->get();
        
        $this->set_title('Laporan Pemasukan');
        return view('admin.pemasukan',[
            'page'=> $this->page,
            'objects' => $objects
            ]);
    }
    //TRANSAKSI
     public function transaksi_detail(Request $req) {
       $bln=Carbon::parse(Carbon::today())->format('m');
       $thisthn=Carbon::parse(Carbon::today())->format('Y');
        if (empty($req->month)){
            $objects = DB::table('transaksis')
             ->select(DB::raw("*"))
             ->whereMonth('waktu','=',$bln)
             ->whereYear('waktu','=',$thisthn)
             ->get();
            $sum = $objects->sum('nominal');
        }else{
             $objects = DB::table('transaksis')
             ->select(DB::raw("*"))
             ->whereMonth('waktu','=',$req->month)
             ->whereYear('waktu','=',$req->year)
             ->get();
            $sum = $objects->sum('nominal');
        }
        $this->set_title('Pemasukan Bulanan');
        return view('admin.transaksi.transaksi-details', [
            'page' => $this->page,
            'objects' => $objects,
            'sum' => $sum,
            'thisthn' => $thisthn
        ]);
    }

    public function transaksi_list() {
        $objects = Transaksi::with('sk')->get();
        $this->set_title('Semua Transaksi');
        return view('admin.transaksi.transaksi-index', [
            'page' => $this->page,
            'objects' => $objects
        ]);
    }

    public function transaksi_createEdit($id = 0) {
        if ($id === 'new') {
            $this->set_title('Transaksi Baru');
            $object = new Jadwal();
        } else {
            $object = Transaksi::with('sk')->find($id);
            $this->set_title('Ubah Transaksi');
            $object->filedir=Storage::url('/Transaksi',$object->lampiran);
            //$object->lampiran="/Transaksi/".$object->lampiran;
        }
        $relations = [];
        $relations['sks'] = Sk::get();
        return view('admin.transaksi.transaksi-createEdit', [
            'page' => $this->page,
            'object' => $object,
            'relations' => $relations
        ]);
    }

    public function transaksi_save(Request $req) {
        
        if ($req->hasFile('lampiran')){
            $temp = $req->file('lampiran')->getClientOriginalName();
            $req['lampiran']=$temp;
            Storage::putFileAs('Transaksi', $req->file('lampiran'),$temp);
        }else{
        }
        $transaksi = createOrEditObject("App\\Transaksi", $req);
        saveObjectFromInput($transaksi, $req, [
            'waktu' => 'datetime',
            'jenis' => '-',
            'keterangan' => '-',
            'lampiran' => '-',
            'nominal' => '-',
            'sk_id' => '-',
        ]);

        return redirect()->route('transaksi_createEdit', $transaksi->id)->with('success','');
    }

    public function download_transaksi($lampiran){
        return  response()->download(storage_path('app/Transaksi/'.$lampiran));
    }
   

    //USER
    public function user_list() {
        if (Auth::user() && Auth::user()->id === 1) {
            $objects = User::with('sks')->where('id', '>', '1')->get();
            $this->set_title('Semua User');
            return view('admin.user.user-index', [
                'page' => $this->page,
                'objects' => $objects
            ]);
        } else {
            return redirect()->route('dashboard');
        }
    }

    public function user_createEdit($id = 0) {
        if (Auth::user() && Auth::user()->id === 1) {
            if ($id === 'new') {
                $this->set_title('User Baru');
                $object = new Jadwal();
            } else {
                $object = User::with('sks')->find($id);
                $this->set_title('Ubah User');
            }
            $relations = [];
            return view('admin.user.user-createEdit', [
                'page' => $this->page,
                'object' => $object,
                'relations' => $relations
            ]);
        } else {
            return redirect()->route('dashboard');
        }
    }

    public function user_save(Request $req) {
        
        if ($req->hasFile('lampiran')){
            $temp = $req->file('lampiran')->getClientOriginalName();
            $req['lampiran']=$temp;
            Storage::putFileAs('foto_user', $req->file('lampiran'),$temp);
        }else{
            dd(Storage::url($req['lampiran']));
            dd($req->hasFile('lampiran'));
        }
        if (Auth::user() && Auth::user()->id === 1) {
            if ($req->input('password') !== ''){
                if ($req->input('password') !== $req->input('confirmpassword')){
                    return redirect()->back()->withErrors('Password invalid');
                }else{
                   
                }
            }
            $user = createOrEditObject("App\\User", $req);
            $user->password = bcrypt($req->input('password'));
            $user->email = $req->input('email');
            $user->name = $req->input('name');
            $user->divisi = $req->input('divisi');
            $user->lampiran = $req->input('lampiran');
            $user->save();
            return redirect()->route('user_createEdit', $user->id)->with('success','');
        } else {
            return redirect()->route('dashboard');
        }
    }

    public function user_set(Request $req) {
        if (Auth::user() && Auth::user()->id === 1) {
            
        } else {
            return redirect()->route('dashboard');
        }
    }

    //WARMERKEN
    public function warmerken_list() {
        $objects = Warmerken::with('sk')->get();
        $kliens = Klien::get();
        // nek unserialize klien dari table sendiri
        foreach ($objects as $object) {
            $object->lklien = unserialize($object->lklien);
        }
        $this->set_title('Semua Warmerken');
        return view('admin.warmerken.warmerken-index', [
            'page' => $this->page,
            'objects' => $objects,
            'kliens' => $kliens
        ]);
    }

    public function warmerken_createEdit($id = 0) {
        if ($id === 'new') {
            $this->set_title('Warmerken Baru');
            $object = new Jadwal();
        } else {
            $object = Warmerken::with('sk')->find($id);
            $this->set_title('Ubah Warmerken');
        }
        $object->lklien=unserialize($object->lklien);
        $relations = [];
        $relations['sks'] = Sk::get();
        $relations['kliens'] = Klien::get();
        return view('admin.warmerken.warmerken-createEdit', [
            'page' => $this->page,
            'object' => $object,
            'relations' => $relations
        ]);
    }

    public function warmerken_save(Request $req) {
        $req->lklien = serialize($req->lklien);        
        if ($req->hasFile('lampiran')){
            $temp = $req->file('lampiran')->getClientOriginalName();
            $req['lampiran']=$temp;
            Storage::putFileAs('Warmek', $req->file('lampiran'),$temp);
        }else{
            dd($req->hasFile('lampiran'));
        }
        $warmerken = createOrEditObject("App\\Warmerken", $req);
        saveObjectFromInput($warmerken, $req, [
            'waktu' => 'datetime',
            'no_akta' => '-',
            'berita_acara' => '-',
            'keterangan' => '-',
            'lampiran' => '-',
            'sk_id' => '-',
            'lklien' => 'serialize'
        ]);

        return redirect()->route('warmerken_createEdit', $warmerken->id)->with('success','');
        }


    public function download_warmerken($lampiran){
        return  response()->download(storage_path('app/Warmek/'.$lampiran));
    }

}

function createOrEditObject($model, $req) {
    $object = [];
    if (!empty($req->input('id'))) {
        $object = $model::find($req->input('id'));
    } else {
        $object = new $model();
    }
    return $object;
}

function saveObjectFromInput($object, $req, $props) {
    foreach ($props as $prop => $type) {
        if ($type === '-') {
            $object->$prop = $req->input($prop);
        } else if ($type === 'date') {
            $object->$prop = DatePickerToDateString($req->input($prop));
        } else if ($type === 'datetime') {
            $object->$prop = DatePickerToDateString($req->input($prop));
        } else if ($type === 'serialize') {
            $object->$prop = serialize($req->input($prop));
        }
    }
    $object->save();
}

function sliderTimeToTimeString($string) {
    return intval(intval($string) / 1000) . intval((intval($string) % 1000) / 100) . ':' . (intval($string) % 100 == 0 ? '00' : '30') . ':00';
}

function DatePickerToDateString($string) {
    $dates = explode('/', $string);
    return $dates[2] . '-' . $dates[0] . '-' . $dates[1];
}
