<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VerificationController extends Controller
{
    public function showForm()
    {
        return view('verification.form');
    }

    public function showResubmitForm()
    {
        $user = auth()->user();

        if (!$user->canResubmit()) {
            return redirect()->route('dashboard');
        }

        // Pre-fill form dengan data sebelumnya
        return view('verification.resubmit', [
            'user' => $user,
            'rejectionReason' => $user->rejection_reason
        ]);
    }

    protected function handleVerificationData(Request $request, User $user)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'nik' => 'required|string|size:16|unique:users,nik,' . $user->id,
            'phone' => 'required|string|max:15|regex:/^([0-9\s\-\+\(\)]*)$/',
            'address' => 'required|string|max:500',
            'ktp_file' => $request->hasFile('ktp_file') ? 'required|image|mimes:jpeg,png,jpg|max:2048' : '',
        ]);

        if ($request->hasFile('ktp_file')) {
            // Hapus file KTP lama jika ada
            if ($user->ktp_path) {
                Storage::disk('public')->delete($user->ktp_path);
            }

            $file = $request->file('ktp_file');
            $path = $file->store('user_data', 'public');
            $validated['ktp_path'] = $path;
        }

        $user->update([
            'full_name' => $validated['full_name'],
            'nik' => $validated['nik'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'ktp_path' => $validated['ktp_path'] ?? $user->ktp_path,
            'verification_status' => 'pending'
        ]);
    }

    public function submit(Request $request)
    {
        $user = auth()->user();
        $this->handleVerificationData($request, $user);

        return redirect()->route('dashboard')
            ->with('success', 'Data verifikasi berhasil dikirim. Silakan tunggu verifikasi dari admin.');
    }

    public function resubmit(Request $request)
    {
        $user = auth()->user();

        if (!$user->canResubmit()) {
            return redirect()->route('dashboard');
        }

        $this->handleVerificationData($request, $user);

        return redirect()->route('dashboard')
            ->with('success', 'Data verifikasi berhasil dikirim ulang. Silakan tunggu verifikasi dari admin.');
    }
}
