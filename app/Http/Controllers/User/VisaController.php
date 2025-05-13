<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visa;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class VisaController extends Controller
{
    //
    public function index()
    {
        $home = 'visa';

        $breadcrumbs = [
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Layanan', 'url' => null],
            ['label' => 'Visa', 'url' => null], // Aktif / halaman saat ini
        ];

        return view('user.serviceVisa', compact('home', 'breadcrumbs'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|',
            'pekerjaan' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:20',

            'no_paspor' => 'nullable|string|max:50',
            'paspor_terbit' => 'nullable|date',
            'paspor_kadaluarsa' => 'nullable|date',

            'tanggal_berangkat' => 'nullable|date',
            'maskapai_berangkat' => 'nullable|string|max:255',
            'no_penerbangan_berangkat' => 'nullable|string|max:50',

            'tanggal_kembali' => 'nullable|date',
            'maskapai_kembali' => 'nullable|string|max:255',
            'no_penerbangan_kembali' => 'nullable|string|max:50',

            'hotel_mekkah' => 'nullable|string|max:255',
            'checkin_mekkah' => 'nullable|date',
            'checkout_mekkah' => 'nullable|date',

            'hotel_madinah' => 'nullable|string|max:255',
            'checkin_madinah' => 'nullable|date',
            'checkout_madinah' => 'nullable|date',

            'lampiran_ktp' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'lampiran_paspor' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'lampiran_kk' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'lampiran_tiket' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'lampiran_hotel' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        ]);

        // dd($validated);

        // Simpan file
        $fileFields = ['lampiran_ktp', 'lampiran_paspor', 'lampiran_kk', 'lampiran_tiket', 'lampiran_hotel'];
        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $validated[$field] = $request->file($field)->store('lampiran', 'public');
            }
        }

        $validated['user_id'] = auth()->id(); // atau Auth::id()

        // Simpan data ke database
        Visa::create($validated);

        return redirect()->back()->with('success', 'Pengajuan visa berhasil dikirim.');
    }
}
