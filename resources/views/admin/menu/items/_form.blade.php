@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@csrf
@if ($item->exists)
    @method('PUT')
@endif

<label for="category_id">Category</label>
<select id="category_id" name="category_id" required>
    <option value="">Select category</option>
    @foreach ($categories as $category)
        <option value="{{ $category->id }}" @selected(old('category_id', $item->category_id) == $category->id)>{{ $category->name }}</option>
    @endforeach
</select>

<label for="name">Name</label>
<input id="name" name="name" value="{{ old('name', $item->name) }}" required maxlength="255">

<label for="description">Description</label>
<textarea id="description" name="description">{{ old('description', $item->description) }}</textarea>

<label for="price">Price</label>
<input id="price" name="price" value="{{ old('price', $item->price) }}" required inputmode="decimal">

<input type="hidden" name="is_available" value="0">
<label><input type="checkbox" name="is_available" value="1" @checked(old('is_available', $item->exists ? $item->is_available : true))> Available</label>

<button type="submit">Save</button>
<a href="{{ route('admin.menu.items.index') }}">Cancel</a>
