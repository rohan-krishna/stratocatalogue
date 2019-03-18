@extends('master')

@section('content')
    <div class="container">
        <h3 class="title">Category Management</h3>
        <hr>

        <div>
            <form action="{{ route('storeNewCategory') }}" id="createNewCategoryForm" method="POST">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-5">
                            <select name="parent_id" class="form-control form-control-alternative">
                                <option value="">--Parent Category--</option>
                                @foreach($cats as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control form-control-alternative" placeholder="Category Name" name="name">
                        </div>
                        <div class="col">
                            <button typ="submit" class="btn btn-success">Add New</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

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
                        <a href="{{ route('editCategory', ['category' => $cat->id]) }}" class="btn btn-info">Edit Category</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

{{-- @push('footerScripts')
<script>
    $(document).ready(function() {

        var getCategories = function() {
            return axios.get("{{ route('getAllCategories') }}")
                .then(res => $("#categoriesBindedView").html(res.data))
        };

        getCategories();

        $('#createNewCategoryForm').submit(function(e) {
            
            e.preventDefault();
            
            $(this).serializeArray()

            // console.log($(this).serializeArray());
            axios({
                method: "POST",
                url: "{{ route('storeNewCategory') }}",
                data: $(this).serialize(),
            }).then(res => {
                // console.log(res.data);
                $("#createNewCategoryForm")[0].reset();
                return getCategories()
            })
        })
    })
</script>
@endpush --}}