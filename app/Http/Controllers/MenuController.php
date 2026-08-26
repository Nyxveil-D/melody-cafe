<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use App\Models\MenuItem;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request): View
    {
        $categorySlug = $request->query('category');
        
        $categories = MenuCategory::all();
        
        $query = MenuItem::where('is_available', true)->with('category');
        
        if ($categorySlug) {
            $query->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('name', $categorySlug);
            });
        }
        
        $items = $query->orderBy('name')->get();
        
        return view('menu.index', [
            'categories' => $categories,
            'items' => $items,
            'activeCategory' => $categorySlug,
        ]);
    }
}
