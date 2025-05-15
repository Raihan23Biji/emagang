<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Absensi;

use App\Models\User; 
class AbsensiController extends Controller
{
    public function camera()
    {
        return view('absensi.camera');
    }

    public function uploadPhoto(Request $request)
    {
        $dataURL = $request->input('photo_absen');
    
        if (preg_match('/^data:image\/(\w+);base64,/', $dataURL, $type)) {
            $data = substr($dataURL, strpos($dataURL, ',') + 1);
            $type = strtolower($type[1]);
    
            if (!in_array($type, ['jpg', 'jpeg', 'png'])) {
                return back()->with('error', 'Tipe gambar tidak didukung');
            }
    
            $binaryData = base64_decode($data);
    
            // Simpan langsung ke database sebagai longblob
            Absensi::create([
                'user_id' => Auth::id(),
                'status_absen' => 'hadir',
                'waktu_absen' => now(),
                'photo_absen' => $binaryData,
            ]);
    
            return back()->with('success', 'Absensi berhasil dikirim!');
        }
    
        return back()->with('error', 'Gagal memproses foto');
    }
   
public function index()
{
    $data = Absensi::with('user')->get();
    $users = User::all(); // ambil semua user

    return view('admin.absensi', compact('data', 'users'));
}
public function getByUserId($id)
{
    $absensi = Absensi::with('user')
                ->where('user_id', $id)
                ->orderBy('waktu_absen', 'desc')
                ->get();

    return view('admin.absensi_by_user', compact('absensi'));

    // Jika untuk API:
    // return response()->json($absensi);
}

}
