<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
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
}
