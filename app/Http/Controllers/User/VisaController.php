<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Visa;
use App\Models\PriceVisa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class VisaController extends Controller
{
    public function index()
    {
        $home = 'visa';

        $breadcrumbs = [['label' => 'Home', 'url' => '/'], ['label' => 'Layanan', 'url' => null], ['label' => 'Visa', 'url' => null]];

        $user = auth()->user();
        $profile = $user->profile; // pastikan relasi 'profile' ada di model User

        return view('user.visa.index', compact('home', 'breadcrumbs', 'profile'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'pekerjaan' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:20',

            'no_paspor' => 'nullable|string|max:50',
            'paspor_terbit' => 'nullable|date',
            'paspor_kadaluarsa' => 'nullable|date',
            'wilayah_terbit' => 'nullable|string|max:255',

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
        $visaData = ['user_id' => $user->id, 'is_self' => $request->is_self];

        if ($request->is_self) {
            $profile = $user->profile;
            $visaData += [
                'nama_lengkap' => $profile->nama_lengkap,
                'tanggal_lahir' => $profile->tanggal_lahir,
                'jenis_kelamin' => $profile->jenis_kelamin ?? 'Laki-laki',
                'no_hp' => $profile->no_hp,
                'no_paspor' => $profile->no_paspor,
                'paspor_terbit' => $profile->paspor_terbit,
                'paspor_kadaluarsa' => $profile->paspor_kadaluarsa,
                'wilayah_terbit' => $profile->wilayah_terbit,
            ];
        } else {
            $visaData += $request->only(['nama_lengkap', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'pekerjaan', 'no_hp', 'no_paspor', 'paspor_terbit', 'paspor_kadaluarsa', 'wilayah_terbit']);
        }

        $visaData += $request->only(['tanggal_berangkat', 'maskapai_berangkat', 'no_penerbangan_berangkat', 'tanggal_kembali', 'maskapai_kembali', 'no_penerbangan_kembali', 'hotel_mekkah', 'checkin_mekkah', 'checkout_mekkah', 'hotel_madinah', 'checkin_madinah', 'checkout_madinah']);

        foreach (['lampiran_ktp', 'lampiran_paspor', 'lampiran_kk', 'lampiran_tiket', 'lampiran_hotel'] as $field) {
            if ($request->hasFile($field)) {
                $visaData[$field] = $request->file($field)->store('temp_visa', 'public_uploads');
            }
        }

        session(['visa_temp_data' => $visaData]);

        $harga = PriceVisa::latest()->first()?->price ?? 0;

        return view('user.visa.detail', [
            'home' => 'visa',
            'breadcrumbs' => [['label' => 'Home', 'url' => '/'], ['label' => 'Layanan', 'url' => null], ['label' => 'Visa', 'url' => null]],
            'data' => $visaData,
            'harga' => $harga,
        ]);
    }

    public function detail($id)
    {
        $visa = Visa::findOrFail($id);
        $harga = VisaPrice::latest()->first()?->price ?? 0;

        $home = 'visa';
        $breadcrumbs = [['label' => 'Home', 'url' => '/'], ['label' => 'Layanan', 'url' => null], ['label' => 'Visa', 'url' => null]];

        return view('user.visa.detail', compact('visa', 'harga', 'home', 'breadcrumbs'));
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'unit_price' => 'required|numeric|min:0',
        ]);

        $visaData = session('visa_temp_data');

        if (!$visaData) {
            return redirect()
                ->route('visa.form')
                ->withErrors(['message' => 'Data visa tidak ditemukan.']);
        }

        // Pindahkan file dari temp ke lampiran
        foreach (['lampiran_ktp', 'lampiran_paspor', 'lampiran_kk', 'lampiran_tiket', 'lampiran_hotel'] as $field) {
            if (!empty($visaData[$field])) {
                $oldPath = str_replace('uploads/', '', $visaData[$field]); // e.g. temp_visa/ktp_xxx.pdf
                $newPath = str_replace('temp_visa/', 'lampiran/', $oldPath);

                if (\Storage::disk('public_uploads')->exists($oldPath)) {
                    \Storage::disk('public_uploads')->move($oldPath, $newPath);
                    $visaData[$field] = $newPath; // update path ke yang baru
                }
            }
        }

        // Simpan data ke database
        $visa = Visa::create($visaData);

        // Bersihkan session
        session()->forget('visa_temp_data');

        return view('user.visa.forward-checkout', [
            'itemable_type' => Visa::class,
            'itemable_id' => $visa->id,
            'unit_price' => $request->unit_price,
            'home' => 'visa',
            'breadcrumbs' => [['label' => 'Home', 'url' => '/'], ['label' => 'Layanan', 'url' => null], ['label' => 'Visa', 'url' => null]],
        ]);
    }
}
