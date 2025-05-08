<?php

namespace App\Http\Controllers;

use App\Models\UserVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserVerificationController extends Controller
{
    // Untuk pelajar/tutor: upload KTP dan SIM
    public function store(Request $request)
    {
        $request->validate([
            'ktp' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'sim' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $user = Auth::user(); // pastikan user sudah login

        $data = [
            'user_id' => $user->id,
        ];

        if ($request->hasFile('ktp')) {
            $data['ktp_path'] = $request->file('ktp')->store('verifikasi_ktp');
        }

        if ($request->hasFile('sim')) {
            $data['sim_path'] = $request->file('sim')->store('verifikasi_sim');
        }

        // Jika sudah ada, update; kalau belum, buat baru
        $verification = UserVerification::updateOrCreate(
            ['user_id' => $user->id],
            $data
        );

        return response()->json([
            'message' => 'Dokumen berhasil diunggah!',
            'data' => $verification,
        ]);
    }

    // Untuk admin: verifikasi manual
    public function verify(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
            'admin_note' => 'nullable|string',
        ]);

        $verification = UserVerification::findOrFail($id);
        $verification->status = $request->status;
        $verification->admin_note = $request->admin_note;
        $verification->verified_at = now();
        $verification->save();

        return response()->json([
            'message' => 'Status verifikasi diperbarui.',
            'data' => $verification,
        ]);
    }
}
