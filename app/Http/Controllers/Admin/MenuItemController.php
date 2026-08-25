<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMenuItemRequest;
use App\Http\Requests\Admin\UpdateMenuItemRequest;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MenuItemController extends Controller
{
    public function index(): View
    {
        return view('admin.menu.items.index', [
            'items' => MenuItem::with('category')->orderBy('name')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.menu.items.create', [
            'categories' => MenuCategory::orderBy('name')->get(),
        ]);
    }

    public function store(StoreMenuItemRequest $request): RedirectResponse
    {
        MenuItem::create($request->validated());

        return to_route('admin.menu.items.index')->with('success', 'Menu item created.');
    }

    public function edit(MenuItem $item): View
    {
        return view('admin.menu.items.edit', [
            'item' => $item,
            'categories' => MenuCategory::orderBy('name')->get(),
        ]);
    }

    public function update(UpdateMenuItemRequest $request, MenuItem $item): RedirectResponse
    {
        $item->update($request->validated());

        return to_route('admin.menu.items.index')->with('success', 'Menu item updated.');
    }

    public function destroy(MenuItem $item): RedirectResponse
    {
        $item->delete();

        return to_route('admin.menu.items.index')->with('success', 'Menu item deleted.');
    }
}

