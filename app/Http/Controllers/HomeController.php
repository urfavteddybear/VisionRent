<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Import the Storage facade

class HomeController extends Controller
{
    public function index()
    {
        // Helper function to format item data
        $formatItem = function ($item) {
            $imageUrl = null;
            if (isset($item->picture[0])) {
                $path = $item->picture[0];
                // Use Storage::url() to generate the full URL
                $imageUrl = Storage::url($path);
            }
            return [
                'id' => $item->id,
                'name' => $item->name,
                // 'description' => $item->description,
                'image' => $imageUrl,
                'price' => $item->price,
            ];
        };

        // Get featured equipment (latest 5 items)
        $featuredEquipment = Item::with('category')
            ->latest()
            ->take(5)
            ->get()
            ->map($formatItem);

        // Get camera & lens support items
        $cameraSupport = Item::with('category')
            ->whereHas('category', function ($query) {
                $query->whereIn('name', ['Mirrorless', 'DSLR', 'Action Camera', 'Lenses']);
            })
            ->take(10)
            ->get()
            ->map($formatItem);

        // Get lighting & audio items
        $lightingSupport = Item::with('category')
            ->whereHas('category', function ($query) {
                $query->whereIn('name', ['Lighting', 'Audio', 'Sound']);
            })
            ->take(10)
            ->get()
            ->map($formatItem);

        return view('welcome', compact('featuredEquipment', 'cameraSupport', 'lightingSupport'));
    }
}
