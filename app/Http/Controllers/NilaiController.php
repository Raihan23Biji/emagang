<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pendaftaran;
use App\Models\NilaiMagang;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class NilaiController extends Controller
{
    public function index()
    {
        return view('pelamar.nilaimagang');
    }

    public function upload($id)
    {
        $user = User::findOrFail($id);
        $pendaftaran = Pendaftaran::where('id_users', $id)->first(); // atau pakai `latest()` jika ingin yg terbaru
    
        return view('admin.nilai_form', compact('user', 'pendaftaran'));
    }

    public function store(Request $request, $id)
{
    $request->validate([
        'nilai' => 'required|array|size:6',
        'nilai.*.angka' => 'required|integer|min:0|max:100',
    ]);

    $nilai = new NilaiMagang();
    $nilai->user_id = $id;
    $nilai->kepribadian = $request->nilai[0]['angka'];
    $nilai->penguasaan_materi = $request->nilai[1]['angka'];
    $nilai->kedisiplinan = $request->nilai[2]['angka'];
    $nilai->kreativitas = $request->nilai[3]['angka'];
    $nilai->kerja_sama_tim = $request->nilai[4]['angka'];
    $nilai->tanggung_jawab = $request->nilai[5]['angka'];
    $nilai->save();

    return redirect()->back()->with('success', 'Nilai berhasil disimpan.');
}
public function download()
{
    $user = Auth::user();
    $nilai = NilaiMagang::where('user_id', $user->id)->first();
    $pendaftaran = Pendaftaran::where('id_users', $user->id)->first();

    if (!$nilai) {
        return redirect()->back()->with('error', 'Nilai belum tersedia.');
    }

    // Hitung nilai dan konversi ke huruf
    $aspek = [
        'Kepribadian' => $nilai->kepribadian,
        'Penguasaan materi pekerjaan' => $nilai->penguasaan_materi,
        'Kedisiplinan' => $nilai->kedisiplinan,
        'Kreativitas' => $nilai->kreativitas,
        'Kerja sama tim' => $nilai->kerja_sama_tim,
        'Tanggung jawab' => $nilai->tanggung_jawab,
    ];

    $nilaiHuruf = function ($angka) {
        if ($angka >= 86) return 'A';
        if ($angka >= 75) return 'B';
        if ($angka >= 41) return 'C';
        if ($angka >= 21) return 'D';
        return 'E';
    };

    $aspekHuruf = [];
    $total = 0;
    foreach ($aspek as $label => $angka) {
        $huruf = $nilaiHuruf($angka);
        $aspekHuruf[] = [
            'label' => $label,
            'angka' => $angka,
            'huruf' => $huruf,
        ];
        $total += $angka;
    }

    $rataRata = $total / count($aspek);
    $rataHuruf = $nilaiHuruf($rataRata);

    $pdf = Pdf::loadView('pelamar.nilaimagang', [
        'user' => $user,
        'pendaftaran' => $pendaftaran,
        'aspekHuruf' => $aspekHuruf,
        'total' => $total,
        'rataRata' => $rataRata,
        'rataHuruf' => $rataHuruf,
    ]);

    return $pdf->download('Lembar_Nilai_' . $user->name . '.pdf');
}

   

}
