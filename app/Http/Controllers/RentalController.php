<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller
{
    public function show($id)
    {
        $rental = Rental::with('item')->findOrFail($id);

        if ($rental->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('rental-detail', compact('rental'));
    }
}
