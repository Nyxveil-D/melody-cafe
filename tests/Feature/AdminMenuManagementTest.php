<?php

namespace Tests\Feature;

use App\Enums\UserRole;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminMenuManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_category_management(): void
    {
        $this->get(route('admin.menu.categories.index'))
            ->assertRedirect(route('admin.login'));
    }

    public function test_guest_cannot_access_item_management(): void
    {
        $this->get(route('admin.menu.items.index'))
            ->assertRedirect(route('admin.login'));
    }

    public function test_non_admin_cannot_access_category_management(): void
    {
        $user = User::factory()->create(['role' => UserRole::Manager]);

        $this->actingAs($user)->get(route('admin.menu.categories.index'))
            ->assertForbidden();
    }

    public function test_non_admin_cannot_access_item_management(): void
    {
        $user = User::factory()->create(['role' => UserRole::Staff]);

        $this->actingAs($user)->get(route('admin.menu.items.index'))
            ->assertForbidden();
    }

    public function test_admin_can_list_categories(): void
    {
        $admin = User::factory()->create(['role' => UserRole::Admin]);
        MenuCategory::factory()->create(['name' => 'Coffee']);

        $this->actingAs($admin)->get(route('admin.menu.categories.index'))
            ->assertOk()
            ->assertSee('Coffee');
    }

    public function test_admin_can_create_category(): void
    {
        $admin = User::factory()->create(['role' => UserRole::Admin]);

        $this->actingAs($admin)->post(route('admin.menu.categories.store'), [
            'name' => 'Desserts',
            'description' => 'Sweet items',
        ])->assertRedirect(route('admin.menu.categories.index'));

        $this->assertDatabaseHas('menu_categories', ['name' => 'Desserts']);
    }

    public function test_admin_can_update_category(): void
    {
        $admin = User::factory()->create(['role' => UserRole::Admin]);
        $category = MenuCategory::factory()->create();

        $this->actingAs($admin)->put(route('admin.menu.categories.update', $category), [
            'name' => 'Updated',
            'description' => 'Updated description',
        ])->assertRedirect(route('admin.menu.categories.index'));

        $this->assertDatabaseHas('menu_categories', ['id' => $category->id, 'name' => 'Updated']);
    }

    public function test_admin_can_delete_empty_category(): void
    {
        $admin = User::factory()->create(['role' => UserRole::Admin]);
        $category = MenuCategory::factory()->create();

        $this->actingAs($admin)->delete(route('admin.menu.categories.destroy', $category))
            ->assertRedirect(route('admin.menu.categories.index'));

        $this->assertDatabaseMissing('menu_categories', ['id' => $category->id]);
    }

    public function test_category_containing_menu_items_cannot_be_deleted(): void
    {
        $admin = User::factory()->create(['role' => UserRole::Admin]);
        $category = MenuCategory::factory()->create();
        MenuItem::factory()->create(['category_id' => $category->id]);

        $this->actingAs($admin)->delete(route('admin.menu.categories.destroy', $category))
            ->assertRedirect()
            ->assertSessionHas('error', 'Category cannot be deleted while it contains menu items.');

        $this->assertDatabaseHas('menu_categories', ['id' => $category->id]);
    }

    public function test_admin_can_list_menu_items(): void
    {
        $admin = User::factory()->create(['role' => UserRole::Admin]);
        $category = MenuCategory::factory()->create(['name' => 'Coffee']);
        MenuItem::factory()->create(['category_id' => $category->id, 'name' => 'Latte']);

        $this->actingAs($admin)->get(route('admin.menu.items.index'))
            ->assertOk()
            ->assertSee('Latte')
            ->assertSee('Coffee');
    }

    public function test_admin_can_create_menu_item(): void
    {
        $admin = User::factory()->create(['role' => UserRole::Admin]);
        $category = MenuCategory::factory()->create();

        $this->actingAs($admin)->post(route('admin.menu.items.store'), [
            'category_id' => $category->id,
            'name' => 'Cappuccino',
            'description' => 'Milk coffee',
            'price' => '25000.00',
            'is_available' => 1,
        ])->assertRedirect(route('admin.menu.items.index'));

        $this->assertDatabaseHas('menu_items', [
            'category_id' => $category->id,
            'name' => 'Cappuccino',
            'is_available' => 1,
        ]);
    }

    public function test_invalid_menu_item_data_is_rejected(): void
    {
        $admin = User::factory()->create(['role' => UserRole::Admin]);

        $this->actingAs($admin)->post(route('admin.menu.items.store'), [
            'category_id' => 999999,
            'name' => '',
            'price' => '0.001',
            'is_available' => 'not-a-boolean',
        ])->assertSessionHasErrors(['category_id', 'name', 'price', 'is_available']);
    }

    public function test_menu_item_belongs_to_category(): void
    {
        $category = MenuCategory::factory()->create();
        $item = MenuItem::factory()->create(['category_id' => $category->id]);

        $this->assertTrue($item->category->is($category));
    }

    public function test_admin_can_update_menu_item(): void
    {
        $admin = User::factory()->create(['role' => UserRole::Admin]);
        $category = MenuCategory::factory()->create();
        $item = MenuItem::factory()->create(['category_id' => $category->id]);

        $this->actingAs($admin)->put(route('admin.menu.items.update', $item), [
            'category_id' => $category->id,
            'name' => 'Updated item',
            'description' => null,
            'price' => '30000.00',
            'is_available' => 0,
        ])->assertRedirect(route('admin.menu.items.index'));

        $this->assertDatabaseHas('menu_items', ['id' => $item->id, 'name' => 'Updated item', 'is_available' => 0]);
    }

    public function test_admin_can_delete_menu_item(): void
    {
        $admin = User::factory()->create(['role' => UserRole::Admin]);
        $item = MenuItem::factory()->create(['category_id' => MenuCategory::factory()->create()->id]);

        $this->actingAs($admin)->delete(route('admin.menu.items.destroy', $item))
            ->assertRedirect(route('admin.menu.items.index'));

        $this->assertDatabaseMissing('menu_items', ['id' => $item->id]);
    }
}
