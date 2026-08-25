<h1>Edit Menu Category</h1>
<form method="POST" action="{{ route('admin.menu.categories.update', $category) }}">
    @include('admin.menu.categories._form')
</form>
