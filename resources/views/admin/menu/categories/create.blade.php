<h1>Create Menu Category</h1>
<form method="POST" action="{{ route('admin.menu.categories.store') }}">
    @include('admin.menu.categories._form', ['category' => new \App\Models\MenuCategory()])
</form>
