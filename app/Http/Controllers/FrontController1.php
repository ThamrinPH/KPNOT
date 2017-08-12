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
use App\Ppat;
use App\Properti;
use App\Retribusi;
use App\Sk;
use App\Transaksi;
use App\User;
use App\Warmerken;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class FrontController extends Controller {

    //dropzone
    

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
        $objects = Jadwal::with('klien')->paginate(20);
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
        $this->set_title('Dashboard');
        return view('admin.dashboard', [
            'page' => $this->page
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

    //JADWAL
    public function jadwal_list() {
        $objects = Jadwal::with('klien')->paginate(20);
        $this->set_title('Semua Jadwal');
        return view('admin.jadwal.jadwal-index', [
            'page' => $this->page,
            'objects' => $objects
        ]);
    }

    public function jadwal_calendar() {
        $objects = Jadwal::with('klien')->paginate(20);
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

    public function jadwal_delete(Request $req){


    }

    public function jadwal_set(Request $req) {
        return redirect()->back()->with('success', 'delete');
    }

    //KLIEN
    public function klien_list() {
        $jadwal = [];
        $objects = Klien::with('jadwals', 'sks')->paginate(20);
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
        $relations = [];
        return view('admin.klien.klien-createEdit', [
            'page' => $this->page,
            'object' => $object,
            'relations' => $relations
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

    public function klien_set(Request $req) {
        
    }

    //LEGAL
    public function legal_list() {
        $objects = Legal::with('sk')->paginate(20);
        $this->set_title('Semua Legal');
        return view('admin.legal.legal-index', [
            'page' => $this->page,
            'objects' => $objects
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
        return view('admin.legal.legal-createEdit', [
            'page' => $this->page,
            'object' => $object,
            'relations' => $relations
        ]);
    }

    public function legal_save(Request $req) {
        $temp = $req->file('lampiran')->getClientOriginalName();
        $req['lampiran']=$temp;
        if ($req->hasFile('lampiran')){
            Storage::put('Legal', $req->file('lampiran'));
        }else{
            dd(Storage::url($req['lampiran']));
            dd($req->hasFile('lampiran'));
        }
        $legal = createOrEditObject("App\\Legal", $req);
        saveObjectFromInput($legal, $req, [
            'waktu' => 'date',
            'lampiran' => '-',
            'sifat_surat' => '-',
            'keterangan' => '-',
            'sk_id' => '-',
        ]);

        return redirect()->route('legal_createEdit', $legal->id)->with('success','');
    }

    public function legal_set(Request $req) {
        
    }

    //NOTARIIL
    public function notariil_list() {
        $objects = Notariil::with('sk')->paginate(20);
        $this->set_title('Semua Notariil');
        return view('admin.notariil.notariil-index', [
            'page' => $this->page,
            'objects' => $objects
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
        return view('admin.notariil.notariil-createEdit', [
            'page' => $this->page,
            'object' => $object,
            'relations' => $relations
        ]);
    }

    public function notariil_save(Request $req) {
         $temp = $req->file('lampiran')->getClientOriginalName();
        $req['lampiran']=$temp;
        if ($req->hasFile('lampiran')){
            Storage::put('Notariil', $req->file('lampiran'));
        }else{
            dd(Storage::url($req['lampiran']));
            dd($req->hasFile('lampiran'));
        }
        $notariil = createOrEditObject("App\\Notariil", $req);
        saveObjectFromInput($notariil, $req, [
            'no_akta' => '-',
            'lampiran' => '-',
            'nama_akta' => '-',
            'keterangan' => '-',
            'waktu' => 'datetime',
            'sk_id' => '-',
        ]);

        return redirect()->route('notariil_createEdit', $notariil->id)->with('success','');
    }

    public function notariil_set(Request $req) {
        
    }

    //PPAT
    public function ppat_list() {
        $objects = Ppat::with('sk', 'properti')->paginate(20);
        $this->set_title('Semua PPAT');
        return view('admin.ppat.ppat-index', [
            'page' => $this->page,
            'objects' => $objects
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
        return view('admin.ppat.ppat-createEdit', [
            'page' => $this->page,
            'object' => $object,
            'relations' => $relations
        ]);
    }

    public function ppat_save(Request $req) {
        $temp = $req->file('lampiran')->getClientOriginalName();
        $req['lampiran']=$temp;
        if ($req->hasFile('lampiran')){
            Storage::put('PPAT', $req->file('lampiran'));
        }else{
            dd(Storage::url($req['lampiran']));
            dd($req->hasFile('lampiran'));
        }
        $ppat = createOrEditObject("App\\Ppat", $req);
        saveObjectFromInput($ppat, $req, [
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
            
        ]);

        return redirect()->route('ppat_createEdit', $ppat->id)->with('success','');
    }

    public function ppat_set(Request $req) {
        
    }

    //PROPERTI
    public function properti_list() {
        $objects = Properti::with('ppat')->paginate(20);
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
        $temp = $req->file('lampiran')->getClientOriginalName();
        $req['lampiran']=$temp;
        if ($req->hasFile('lampiran')){
            Storage::put('Properti', $req->file('lampiran'));
        }else{
            dd(Storage::url($req['lampiran']));
            dd($req->hasFile('lampiran'));
        }
        $properti = createOrEditObject("App\\Properti", $req);
        saveObjectFromInput($properti, $req, [
            'nomor_hm' => '-',
            'lampiran' => '-',
            'nib' => '-',
            'waktu_su' => 'datetime',
            'nomor_ssp' => '-',
            'luastanah' => '-',
            'luasbangunan' => '-',
            'letak' => '-',
            'nop' => '-',
            'njop' => '-',
            'pemeganghak' => '-',
            'jenis' => '-',
            'ppat_id' => '-',
            'alamat' => '-',
        ]);

        return redirect()->route('properti_createEdit', $properti->id)->with('success','');
    }

    public function properti_set(Request $req) {
        
    }

    //RETRIBUSI
    public function retribusi_list() {
        $objects = Retribusi::with('sk')->paginate(20);
        $this->set_title('Semua Retribusil');
        return view('admin.retribusi.retribusi-index', [
            'page' => $this->page,
            'objects' => $objects
        ]);
    }

    public function retribusi_createEdit($id = 0) {
        if ($id === 'new') {
            $this->set_title('Retribusil Baru');
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
        $temp = $req->file('lampiran')->getClientOriginalName();
        $req['lampiran']=$temp;
        if ($req->hasFile('lampiran')){
            Storage::put('Retribusi', $req->file('lampiran'));
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

    public function retribusi_set(Request $req) {
        
    }

    //SK
    public function sk_list() {
        $objects = Sk::with('warmerkens', 'notariils', 'legals', 'transaksis', 'retribusis', 'ppats', 'user', 'klien')->paginate(20);
        $this->set_title('Semua Surat Kerja');
        return view('admin.sk.sk-index', [
            'page' => $this->page,
            'objects' => $objects
        ]);
    }

    public function sk_createEdit($id = 0) {
        if ($id === 'new') {
            $this->set_title('Surat Kerja Baru');
            $object = new Jadwal();
        } else {
            $object = Sk::with('warmerkens', 'notariils', 'legals', 'transaksis', 'retribusis', 'ppats', 'user', 'klien')->find($id);
            $this->set_title('Ubah Surat Kerja');
        }
        $relations = [];
        $relations['kliens'] = Klien::get();
        $relations['users'] = User::get();
        return view('admin.sk.sk-createEdit', [
            'page' => $this->page,
            'object' => $object,
            'relations' => $relations
        ]);
    }

    public function sk_save(Request $req) {
        $sk = createOrEditObject("App\\Sk", $req);
        if(empty($sk->user_id)){
            $sk->user_id = Auth::user()->id;
        }
        saveObjectFromInput($sk, $req, [
            'pic' => '-',
            'keterangan' => '-',
            'klien_id' => '-',
        ]);

        return redirect()->route('sk_createEdit', $sk->id)->with('success','');
    }

    public function sk_set(Request $req) {
        
    }

    public function laporan_pemasukan(){
        $objects = Transaksi::with('sk')->paginate(20);
        $this->set_title('Laporan Pemasukan');
        return view('admin.pemasukan',[
            'page'=> $this->page,
             'objects' => $objects
            ]);
    }
    //TRANSAKSI
    public function transaksi_list() {
        $objects = Transaksi::with('sk')->paginate(20);
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
        $temp = $req->file('lampiran')->getClientOriginalName();
        $req['lampiran']=$temp;
        if ($req->hasFile('lampiran')){
            Storage::put('Transaksi', $req->file('lampiran'));
        }else{
            dd(Storage::url($req['lampiran']));
            dd($req->hasFile('lampiran'));
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

    public function transaksi_set(Request $req) {
        
    }

    //USER
    public function user_list() {
        if (Auth::user() && Auth::user()->id === 1) {
            $objects = User::with('sks')->where('id', '>', '1')->paginate(20);
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
         $temp = $req->file('lampiran')->getClientOriginalName();
        $req['lampiran']=$temp;
        if ($req->hasFile('lampiran')){
            Storage::put('foto_user', $req->file('lampiran'));
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
        $objects = Warmerken::with('sk')->paginate(20);
        $this->set_title('Semua Warmerken');
        return view('admin.warmerken.warmerken-index', [
            'page' => $this->page,
            'objects' => $objects
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
        $relations = [];
        $relations['sks'] = Sk::get();
        return view('admin.warmerken.warmerken-createEdit', [
            'page' => $this->page,
            'object' => $object,
            'relations' => $relations
        ]);
    }

    public function warmerken_save(Request $req) {
        $temp = $req->file('lampiran')->getClientOriginalName();
        $req['lampiran']=$temp;
        if ($req->hasFile('lampiran')){
            Storage::put('Warmek', $req->file('lampiran'));
        }else{
            dd(Storage::url($req['lampiran']));
            dd($req->hasFile('lampiran'));
        }
        $warmerken = createOrEditObject("App\\Warmerken", $req);
        saveObjectFromInput($warmerken, $req, [
            'waktu' => 'datetime',
            'sifat_surat' => '-',
            'keterangan' => '-',
            'sk_id' => '-',
            'lampiran' => '-',
        ]);

        return redirect()->route('warmerken_createEdit', $warmerken->id)->with('success','');
    }

    public function warmerken_set(Request $req) {
        
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
