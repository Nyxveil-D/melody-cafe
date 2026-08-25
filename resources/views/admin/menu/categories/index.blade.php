<h1>Menu Categories</h1>

@if (session('success'))<p>{{ session('success') }}</p>@endif
@if (session('error'))<p>{{ session('error') }}</p>@endif
<a href="{{ route('admin.menu.categories.create') }}">Create category</a>
<a href="{{ route('admin.menu.items.index') }}">Menu items</a>

<ul>
@foreach ($categories as $category)
    <li>
        {{ $category->name }} ({{ $category->menu_items_count }})
        <a href="{{ route('admin.menu.categories.edit', $category) }}">Edit</a>
        <form method="POST" action="{{ route('admin.menu.categories.destroy', $category) }}" style="display:inline">
            @csrf @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </li>
@endforeach
</ul>
