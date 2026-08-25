@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@csrf
@if ($category->exists)
    @method('PUT')
@endif

<label for="name">Name</label>
<input id="name" name="name" value="{{ old('name', $category->name) }}" required maxlength="255">

<label for="description">Description</label>
<textarea id="description" name="description">{{ old('description', $category->description) }}</textarea>

<button type="submit">Save</button>
<a href="{{ route('admin.menu.categories.index') }}">Cancel</a>

@if (session('success'))<p>{{ session('success') }}</p>@endif
@if (session('error'))<p>{{ session('error') }}</p>@endif
@if ($errors->any())
    <p>Please fix validation errors.</p>
@endif

