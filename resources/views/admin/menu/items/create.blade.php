<h1>Create Menu Item</h1>
<form method="POST" action="{{ route('admin.menu.items.store') }}">
    @include('admin.menu.items._form', ['item' => new \App\Models\MenuItem()])
</form>
