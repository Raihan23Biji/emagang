<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorelogbookRequest;
use App\Http\Requests\UpdatelogbookRequest;
use App\Models\logbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LogbookController extends Controller
{
   // app/Http/Controllers/LogbookController.php
public function create()
{
    return view('pelamar.logbook');
}

public function store(Request $request)
{
    $request->validate([
        'kegiatan' => 'required|string',
    ]);

    Logbook::create([
        'user_id' => auth()->id(),
        'kegiatan' => $request->kegiatan,
    ]);

    return redirect()->back()->with('success', 'Logbook berhasil ditambahkan!');
}
public function index()
{
    $user = Auth::user();

    if ($user->role === 'admin') {
        $logbooks = Logbook::with('user')->latest()->get(); // semua logbook
    } else {
        $logbooks = Logbook::where('user_id', $user->id)->latest()->get(); // hanya milik user login
    }

    return view('pelamar.getlogbook', compact('logbooks'));
}
}
