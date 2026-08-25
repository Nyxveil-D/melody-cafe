<h1>Menu Items</h1>

@if (session('success'))<p>{{ session('success') }}</p>@endif
@if (session('error'))<p>{{ session('error') }}</p>@endif
<a href="{{ route('admin.menu.items.create') }}">Create menu item</a>
<a href="{{ route('admin.menu.categories.index') }}">Categories</a>

<ul>
@foreach ($items as $item)
    <li>
        {{ $item->name }} — {{ $item->category->name }} — {{ $item->price }}
        <a href="{{ route('admin.menu.items.edit', $item) }}">Edit</a>
        <form method="POST" action="{{ route('admin.menu.items.destroy', $item) }}" style="display:inline">
            @csrf @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </li>
@endforeach
</ul>
