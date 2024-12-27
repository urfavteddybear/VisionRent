<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get featured equipment (latest 5 items)
        $featuredEquipment = Item::with('category')
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'description' => $item->description,
                    'image' => $item->picture[0] ?? null  // Assuming the first picture is the main one
                ];
            });

        // Get camera & lens support items
        $cameraSupport = Item::with('category')
            ->whereHas('category', function ($query) {
                $query->whereIn('name', ['Mirrorless', 'DSLR', 'Action Camera', 'Lenses']);
            })
            ->take(10)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'description' => $item->description,
                    'image' => $item->picture[0] ?? null
                ];
            });

        // Get lighting & audio items (assuming you have these categories)
        $lightingSupport = Item::with('category')
            ->whereHas('category', function ($query) {
                $query->whereIn('name', ['Lighting', 'Audio', 'Sound']);
            })
            ->take(10)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'description' => $item->description,
                    'image' => $item->picture[0] ?? null
                ];
            });

        return view('welcome', compact('featuredEquipment', 'cameraSupport', 'lightingSupport'));
    }
}
