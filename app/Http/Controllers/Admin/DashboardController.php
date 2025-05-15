<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\Pendaftaran;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

            $data = [
                'title' => "Dashboard",
                'jumlah_tidak_diterima' => Pendaftaran::join('users', 'pendaftaran.id_users', '=', 'users.id')->leftjoin('detail_users', 'detail_users.id_users', '=', 'users.id')->where('status_pendaftaran', 'tidak diterima')->get()->count(),
                'jumlah_diterima' => Pendaftaran::join('users', 'pendaftaran.id_users', '=', 'users.id')->leftjoin('detail_users', 'detail_users.id_users', '=', 'users.id')->where('status_pendaftaran', 'diterima')->get()->count(),
                'jumlah_pelamar' =>  User::leftJoin('detail_users', 'detail_users.id_users', '=', 'users.id')->where('role', 'pelamar')->get()->count(),
            ];
    
            return view('admin/dashboard')->with('data', $data);
        

    }
}
