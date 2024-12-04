<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Rental;

class ProfileController extends Controller
{
    public function index()
    {
        $rentals = Rental::where('user_id', auth()->id())->get();

        return Inertia::render('Profile', [
            'activeRentals' => $rentals->where('end_date', '>=', now()),
            'historyRentals' => $rentals->where('end_date', '<', now()),
        ]);
    }
}
