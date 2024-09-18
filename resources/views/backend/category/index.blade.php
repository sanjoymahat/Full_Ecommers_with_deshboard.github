@extends('backend.layout.master')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 justify-content-center">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2>Category Management</h2>
                        <a href="{{route('category.create')}}"  class="btn btn-primary mt-2 mt-xl-0" data-toggle="modal" data-target="#addCategoryModal">Add Category</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table  table-bordered border-solid:1px">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Category Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($categories as $category)
                                    <tr>
                                        <td>
                                            <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" width="50" height="50">
                                        </td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#viewCategoryModal{{ $category->id }}">View</button>
                                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editCategoryModal{{ $category->id }}">Edit</button>
                                            <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- View Category Modal -->
                                    <div class="modal fade" id="viewCategoryModal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="viewCategoryModalLabel{{ $category->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="viewCategoryModalLabel{{ $category->id }}">View Category</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>ID:</strong> {{ $category->id }}</p>
                                                    <p><strong>Category Name:</strong> {{ $category->name }}</p>
                                                    <p><strong>Image:</strong> <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" width="100"></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Edit Category Modal -->
                                    <div class="modal fade" id="editCategoryModal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel{{ $category->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editCategoryModalLabel{{ $category->id }}">Edit Category</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="name">Category Name</label>
                                                            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="image">Category Image</label>
                                                            <input type="file" class="form-control" id="image" name="image">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <td colspan="4">No records found.</td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Category Image</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
