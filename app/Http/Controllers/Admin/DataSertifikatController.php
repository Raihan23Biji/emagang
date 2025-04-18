<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Pendaftaran;
use App\Models\Sertifikat;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendMail;

class DataSertifikatController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data = [
            'title' => "Data Sertifikat",
            'data_sertifikat' => Sertifikat::join('users', 'sertifikat.created_by', '=', 'users.id')->orderBy('sertifikat.id_sertifikat', 'DESC')->get(),
        ];

        return view('admin/datasertifikat')->with('data', $data);
    }

    public function approve(Request $request){

        $id_sertifikat = $request->id_sertifikat;
        $data = [
            'status_pengajuan' => $request->status_pengajuan,
            'updated_by' => Auth::user()->id,
        ];


        Sertifikat::where('id_sertifikat', $id_sertifikat)->update($data);

        return redirect()->back()->with('suc_message', 'Data Berhasil disimpan!');
    }
}
