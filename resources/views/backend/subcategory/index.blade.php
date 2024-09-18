@extends('backend.layout.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 justify-content-center">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            @include('backend.inc.message')
                            <h4>Manage SubCategory</h4>
                            <button class="btn btn-primary mt-2 mt-xl-0" data-toggle="modal" data-target="#addSubcategoryModal">Add Subcategory</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Name</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($subcategories as $subcategory)
                                            <tr>
                                                <td class="category_{{ $subcategory->category_id }}">
                                                    {{ $subcategory->category->name }}
                                                </td>
                                                <td>{{ $subcategory->name }}</td>
                                                <td>
                                                    <!-- Edit Button trigger modal -->
                                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#editModal{{ $subcategory->id }}">
                                                        <i class="mdi mdi-table-edit"></i>
                                                    </button>
                                                </td>
                                                <td>
                                                    <!-- Delete Button trigger modal -->
                                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                        data-target="#deleteModal{{ $subcategory->id }}">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button>

                                                    <!-- Delete Modal -->
                                                    <div class="modal fade" id="deleteModal{{ $subcategory->id }}"
                                                        tabindex="-1" aria-labelledby="deleteModalLabel{{ $subcategory->id }}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <form action="{{ route('subcategory.destroy', $subcategory->id) }}"
                                                                method="post">@csrf
                                                                @method('DELETE')
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="deleteModalLabel{{ $subcategory->id }}">Delete confirmation</h5>
                                                                        <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p> Are you sure you want to delete this item?</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Cancel</button>
                                                                        <button type="submit" class="btn btn-danger">Yes, Delete it</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="editModal{{ $subcategory->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $subcategory->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel{{ $subcategory->id }}">Edit Subcategory</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('subcategory.update', $subcategory->id) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group">
                                                                    <label for="name">Name</label>
                                                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputName1" placeholder="Name" value="{{ old('name', $subcategory->name) }}" required>
                                                                    @error('name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group @error('category_id') has-error @enderror">
                                                                    <label for="category_id">Choose Category</label>
                                                                    <select class="form-control" name="category_id" required>
                                                                        <option value="" disabled>Select Category</option>
                                                                        @foreach (App\Models\Category::all() as $category)
                                                                            <option value="{{ $category->id }}" {{ $category->id == old('category_id', $subcategory->category_id) ? 'selected' : '' }}>
                                                                                {{ $category->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('category_id')
                                                                        <span class="text-danger" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">No subcategory to display</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Subcategory Modal -->
            <div class="modal fade" id="addSubcategoryModal" tabindex="-1" aria-labelledby="addSubcategoryModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addSubcategoryModalLabel">Add Subcategory</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('subcategory.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputName1" placeholder="Name" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group @error('category_id') has-error @enderror">
                                    <label for="category_id">Choose Category</label>
                                    <select class="form-control" name="category_id" required>
                                        <option value="" disabled selected>Select Category</option>
                                        @foreach (App\Models\Category::all() as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                td.category_1 {
                    background-color: aliceblue;
                }
                td.category_2 {
                    background-color: bisque;
                }
                td.category_3 {
                    background-color: thistle;
                }
                td.category_4 {
                    background-color: tomato;
                }
                td.category_5 {
                    background-color: gray;
                }
                td.category_6 {
                    background-color: unset;
                }
                td.category_7 {
                    background-color: springgreen;
                }
                td.category_8 {
                    background-color: orchid;
                }
                td.category_9 {
                    background-color: rgb(233, 110, 131);
                }td.category_10 {
                    background-color: rgb(84, 148, 245);
                }td.category_11 {
                    background-color: rgb(173, 24, 49);
                }td.category_12 {
                    background-color: rgb(209, 235, 139);
                }td.category_13 {
                    background-color: rgb(160, 235, 39);
                }

            </style>
        </div>
    </div>
@endsection
