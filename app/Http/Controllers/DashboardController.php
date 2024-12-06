<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Support\Facades\Auth;
use App\Models\Rental;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data rentals berdasarkan user yang sedang login
        $user = Auth::user();

        if (!$user) {
            abort(403, 'Unauthorized action.');
        }

        $rentals = Rental::where('user_id', $user->id)
            ->where('status', 'rented')
            ->with('item') // Memastikan relasi dengan item di-load
            ->get();

        return view('dashboard', compact('rentals'));
    }
    public function showHistory()
    {
        $user = Auth::user();
        $histories = History::where('user_id', $user->id)
            ->get();
        return view('history', compact('histories'));
    }
}
