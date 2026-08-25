<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMenuCategoryRequest;
use App\Http\Requests\Admin\UpdateMenuCategoryRequest;
use App\Models\MenuCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MenuCategoryController extends Controller
{
    public function index(): View
    {
        return view('admin.menu.categories.index', [
            'categories' => MenuCategory::withCount('menuItems')->orderBy('name')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.menu.categories.create');
    }

    public function store(StoreMenuCategoryRequest $request): RedirectResponse
    {
        MenuCategory::create($request->validated());

        return to_route('admin.menu.categories.index')->with('success', 'Category created.');
    }

    public function edit(MenuCategory $category): View
    {
        return view('admin.menu.categories.edit', compact('category'));
    }

    public function update(UpdateMenuCategoryRequest $request, MenuCategory $category): RedirectResponse
    {
        $category->update($request->validated());

        return to_route('admin.menu.categories.index')->with('success', 'Category updated.');
    }

    public function destroy(MenuCategory $category): RedirectResponse
    {
        if ($category->menuItems()->exists()) {
            return back()->with('error', 'Category cannot be deleted while it contains menu items.');
        }

        $category->delete();

        return to_route('admin.menu.categories.index')->with('success', 'Category deleted.');
    }
}

