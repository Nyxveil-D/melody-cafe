<?php

namespace Tests\Feature;

use App\Models\MenuCategory;
use App\Models\MenuItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MenuPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_access_menu_page()
    {
        $response = $this->get(route('menu.index'));
        $response->assertStatus(200);
    }

    public function test_menu_page_displays_available_items()
    {
        $category = MenuCategory::factory()->create(['name' => 'Coffee']);
        $item = MenuItem::factory()->create([
            'category_id' => $category->id,
            'is_available' => true,
            'name' => 'Latte',
            'price' => 35000
        ]);

        $response = $this->get(route('menu.index'));
        $response->assertSee('Latte');
        $response->assertSee('Rp 35.000');
    }

    public function test_unavailable_menu_items_are_not_displayed()
    {
        $category = MenuCategory::factory()->create();
        $item = MenuItem::factory()->create(['category_id' => $category->id, 'is_available' => false, 'name' => 'Secret Item']);

        $response = $this->get(route('menu.index'));
        $response->assertDontSee('Secret Item');
    }

    public function test_menu_page_filters_by_category()
    {
        $cat1 = MenuCategory::factory()->create(['name' => 'Coffee']);
        $cat2 = MenuCategory::factory()->create(['name' => 'Pastry']);
        $item1 = MenuItem::factory()->create(['category_id' => $cat1->id, 'is_available' => true, 'name' => 'Coffee A']);
        $item2 = MenuItem::factory()->create(['category_id' => $cat2->id, 'is_available' => true, 'name' => 'Pastry B']);

        $response = $this->get(route('menu.index', ['category' => 'Coffee']));
        $response->assertSee('Coffee A');
        $response->assertDontSee('Pastry B');
    }
}
