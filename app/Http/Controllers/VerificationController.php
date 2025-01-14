<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Notifications\VerificationResultNotification;

class VerificationController extends Controller
{
    public function showForm()
    {
        return view('verification.form');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'nik' => 'required|string|size:16|unique:users,nik',
            'phone' => 'required|string|max:15|regex:/^([0-9\s\-\+\(\)]*)$/',
            'address' => 'required|string|max:500',
            'ktp_file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = auth()->user();

        if ($request->hasFile('ktp_file')) {
            $file = $request->file('ktp_file');
            $path = $file->store('user_data', 'public');
            $validated['ktp_path'] = $path;
        }

        $user->update([
            'full_name' => $validated['full_name'],
            'nik' => $validated['nik'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'ktp_path' => $validated['ktp_path'],
            'verification_status' => 'pending'
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Data verifikasi berhasil dikirim. Silakan tunggu verifikasi dari admin.');
    }
}

