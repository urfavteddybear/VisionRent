<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Rental;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $selectedCategory = $request->query('category');
        $searchTerm = $request->query('search');

        $items = Item::with('category')
            // Apply search filter if search term exists
            ->when($searchTerm, function ($query) use ($searchTerm) {
                return $query->where(function($q) use ($searchTerm) {
                    $q->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $searchTerm . '%');
                });
            })
            // Apply category filter if category is selected
            ->when($selectedCategory, function ($query) use ($selectedCategory) {
                return $query->where('category_id', $selectedCategory);
            })
            ->latest()
            ->paginate(12);

        // Transform the items to include image URLs
        $items->getCollection()->transform(function ($item) {
            $item->imageUrl = isset($item->picture[0]) ? Storage::url($item->picture[0]) : null;
            return $item;
        });

        return view('items.index', compact('categories', 'items', 'selectedCategory'));
    }
    public function show(Item $item)
    {
        // Transform the image paths to full URLs
        $images = collect($item->picture)->map(function($path) {
            return Storage::url($path);
        });

        return view('items.show', compact('item', 'images'));
    }

    public function cameraSupportIndex()
    {
        $items = Item::with('category')
            ->whereHas('category', function ($query) {
                $query->whereIn('name', ['Mirrorless', 'DSLR', 'Action Camera', 'Lenses']);
            })
            ->latest()
            ->paginate(15);

        $items->getCollection()->transform(function ($item) {
            $item->imageUrl = isset($item->picture[0]) ? Storage::url($item->picture[0]) : null;
            return $item;
        });

        return view('items.camera-support', compact('items'));
    }

    public function lightingAudioIndex()
    {
        $items = Item::with('category')
            ->whereHas('category', function ($query) {
                $query->whereIn('name', ['Lighting', 'Audio', 'Sound']);
            })
            ->latest()
            ->paginate(15);

        $items->getCollection()->transform(function ($item) {
            $item->imageUrl = isset($item->picture[0]) ? Storage::url($item->picture[0]) : null;
            return $item;
        });

        return view('items.lighting-audio', compact('items'));
    }

    public function checkAvailability(Item $item, Request $request)
    {
        // Get selected month and year from request, default to current month
        $month = $request->input('month', now()->month);
        $year = $request->input('year', now()->year);

        // Create Carbon instance for selected date
        $selectedDate = Carbon::createFromDate($year, $month, 1);

        $rentals = Rental::where('item_id', $item->id)
            ->where('status', '!=', 'returned')
            ->whereMonth('start_date', '<=', $selectedDate->endOfMonth())
            ->whereMonth('end_date', '>=', $selectedDate->startOfMonth())
            ->select('start_date', 'end_date')
            ->get();

        $availability = [];
        $currentDate = $selectedDate->copy()->startOfMonth();
        $endDate = $selectedDate->copy()->endOfMonth();

        while ($currentDate <= $endDate) {
            $dateString = $currentDate->format('Y-m-d');

            // Count how many items are rented on this date
            $rentedCount = $rentals->filter(function($rental) use ($currentDate) {
                return $currentDate->between($rental->start_date, $rental->end_date);
            })->count();

            $availability[$dateString] = [
                'available' => $item->stock - $rentedCount,
                'total' => $item->stock
            ];

            $currentDate->addDay();
        }

        if ($request->ajax()) {
            return view('items.availability', [
                'item' => $item,
                'availability' => $availability,
                'currentDate' => $selectedDate,
            ])->render();
        }

        return view('items.availability', [
            'item' => $item,
            'availability' => $availability,
            'currentDate' => $selectedDate,
        ]);
    }
}
