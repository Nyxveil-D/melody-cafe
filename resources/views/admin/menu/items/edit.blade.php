<h1>Edit Menu Item</h1>
<form method="POST" action="{{ route('admin.menu.items.update', $item) }}">
    @include('admin.menu.items._form')
</form>
