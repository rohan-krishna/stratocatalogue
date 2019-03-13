<div class="d-block" style="height: 65vh !important; overflow-y: scroll;">
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Parent</th>
            <th>Actions</th>
        </tr>
        @foreach($cats as $cat)
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>
                {{ $cat->name }}
            </td>
            <td>{{ optional($cat->parentCategory())->name }}</td>
            <td>
                <a href="{{ route('deleteCategory', ['category' => $cat->id]) }}" class="btn btn-danger">Delete Category</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>