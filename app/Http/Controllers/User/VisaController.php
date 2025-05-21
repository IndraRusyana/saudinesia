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

        return view('user.visa.index', compact('home', 'breadcrumbs'));
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

            'is_self' => 'required|boolean',
        ]);

        $user = auth()->user();

        if ($request->is_self) {
            // Ambil data dari profil user
            $profile = $user->profile;

            $visaData = [
                'user_id' => $user->id,
                'is_self' => true,

                'nama_lengkap' => $profile->full_name,
                'tanggal_lahir' => $profile->birth_date,
                'jenis_kelamin' => $request->jenis_kelamin ?? 'Laki-laki',
                'no_hp' => $profile->phone_number,
                'no_paspor' => $profile->no_paspor,
                'paspor_terbit' => $profile->paspor_terbit,
                'paspor_kadaluarsa' => $profile->paspor_kadaluarsa,
                'wilayah_terbit' => $profile->wilayah_terbit,

                'tanggal_berangkat' => $request->tanggal_berangkat,
                'maskapai_berangkat' => $request->maskapai_berangkat,
                'no_penerbangan_berangkat' => $request->no_penerbangan_berangkat,

                'tanggal_kembali' => $request->tanggal_kembali,
                'maskapai_kembali' => $request->maskapai_kembali,
                'no_penerbangan_kembali' => $request->no_penerbangan_kembali,

                'hotel_mekkah' => $request->hotel_mekkah,
                'checkin_mekkah' => $request->checkin_mekkah,
                'checkout_mekkah' => $request->checkout_mekkah,

                'hotel_madinah' => $request->hotel_madinah,
                'checkin_madinah' => $request->checkin_madinah,
                'checkout_madinah' => $request->checkout_madinah,

                'lampiran_ktp' => $request->lampiran_ktp,
                'lampiran_paspor' => $profile->lampiran_paspor,
                'lampiran_kk' => $request->lampiran_kk,
                'lampiran_tiket' => $request->lampiran_tiket,
                'lampiran_hotel' => $request->lampiran_hotel,
            ];
        } else {
            // Input manual
            $visaData = $request->only(['user_id', 'nama_lengkap', 'tanggal_lahir', 'jenis_kelamin', 'no_hp', 'no_paspor', 'paspor_terbit', 'paspor_kadaluarsa', 'wilayah_terbit', 'tanggal_berangkat', 'maskapai_berangkat', 'no_penerbangan_berangkat', 'tanggal_kembali', 'maskapai_kembali', 'no_penerbangan_kembali', 'hotel_mekkah', 'checkin_mekkah', 'checkout_mekkah', 'hotel_madinah', 'checkin_madinah', 'checkout_madinah', 'lampiran_ktp', 'lampiran_paspor', 'lampiran_kk', 'lampiran_tiket', 'lampiran_hotel']);
        }

        // Simpan file
        $fileFields = ['lampiran_ktp', 'lampiran_paspor', 'lampiran_kk', 'lampiran_tiket', 'lampiran_hotel'];
        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $visaData[$field] = $request->file($field)->store('lampiran', 'public_uploads');
            }
        }

        $validated['user_id'] = auth()->id(); // atau Auth::id()
        $visaData['is_self'] = false;

        // Simpan data ke database
        Visa::create($visaData);

        return redirect()->back()->with('success', 'Pengajuan visa berhasil dikirim.');
    }
}
