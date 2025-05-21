<?php

namespace App\Http\Controllers\User;

use App\Models\UserProfile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $home = 'profile';

        $breadcrumbs = [
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Layanan', 'url' => null],
            ['label' => 'Muttowif', 'url' => null], // Aktif / halaman saat ini
        ];

        $profile = UserProfile::where('user_id', auth()->id())->first();
        return view('user.profiles.index', compact('profile', 'home', 'breadcrumbs'));
    }

    public function create()
    {
        return view('user.profiles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'pekerjaan' => 'nullable|string',
            'no_hp' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
            'no_paspor' => 'nullable|string',
            'paspor_terbit' => 'nullable|date',
            'paspor_kadaluarsa' => 'nullable|date',
            'wilayah_terbit' => 'nullable|string',
            'lampiran_paspor' => 'nullable|file|max:2048',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('photos');
        }

        if ($request->hasFile('lampiran_paspor')) {
            $data['lampiran_paspor'] = $request->file('lampiran_paspor')->store('lampiran_paspor');
        }

        UserProfile::create($data);

        return redirect()->route('profiles.index')->with('success', 'Profil berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $home = 'muttowif';

        $breadcrumbs = [
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Layanan', 'url' => null],
            ['label' => 'Muttowif', 'url' => null], // Aktif / halaman saat ini
        ];

        $userProfile = UserProfile::where('user_id', auth()->id())->findOrFail($id);

        // Cek kepemilikan (opsional, keamanan tambahan)
        if ($userProfile->user_id !== auth()->id()) {
            abort(403);
        }

        return view('user.profiles.edit', compact('userProfile', 'home', 'breadcrumbs'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $userProfile = $user->profile;

        if (!$userProfile) {
            abort(404);
        }

        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'pekerjaan' => 'nullable|string',
            'no_hp' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
            'no_paspor' => 'nullable|string',
            'paspor_terbit' => 'nullable|date',
            'paspor_kadaluarsa' => 'nullable|date',
            'wilayah_terbit' => 'nullable|string',
            'lampiran_paspor' => 'nullable|file|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            if ($userProfile->photo) {
                Storage::delete($userProfile->photo);
            }
            $data['photo'] = $request->file('photo')->store('photos', 'public_uploads');
        }

        if ($request->hasFile('lampiran_paspor')) {
            if ($userProfile->lampiran_paspor) {
                Storage::delete($userProfile->lampiran_paspor);
            }
            $data['lampiran_paspor'] = $request->file('lampiran_paspor')->store('lampiran_paspor', 'public_uploads');
        }

        $userProfile->update($data);

        return redirect()->route('profiles.index')->with('success', 'Profil berhasil diperbarui.');
    }

    public function destroy(UserProfile $userProfile)
    {
        if ($userProfile->photo) {
            Storage::delete($userProfile->photo);
        }

        if ($userProfile->lampiran_paspor) {
            Storage::delete($userProfile->lampiran_paspor);
        }

        $userProfile->delete();

        return redirect()->route('profiles.index')->with('success', 'Profil berhasil dihapus.');
    }
}
