@extends('backend.layout.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 justify-content-center">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            @include('backend.inc.message')
                            <h4>Management ChildCategory</h4>
                            <button class="btn btn-primary mt-2 mt-xl-0" data-toggle="modal" data-target="#addChildCategoryModal">Add ChildCategory</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Subcategory</th>
                                            <th>Name</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($childcategories as $childcategory)
                                            <tr>
                                                <td class="category_{{ $childcategory->subcategory_id }}">
                                                    {{ $childcategory->subcategory->name }}
                                                </td>
                                                <td>{{ $childcategory->name }}</td>
                                                <td>
                                                    <!-- Edit Button trigger modal -->
                                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#editModal{{ $childcategory->id }}">
                                                        <i class="mdi mdi-table-edit"></i>
                                                    </button>
                                                </td>
                                                <td>
                                                    <!-- ChildCategory Delete Button trigger modal -->
                                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                        data-target="#deleteModal{{ $childcategory->id }}">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button>

                                                    <!-- ChildCategory Delete Modal -->
                                                    <div class="modal fade" id="deleteModal{{ $childcategory->id }}"
                                                        tabindex="-1" aria-labelledby="deleteModalLabel{{ $childcategory->id }}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <form action="{{ route('childcategory.destroy', $childcategory->id) }}"
                                                                method="post">@csrf
                                                                @method('DELETE')
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="deleteModalLabel{{ $childcategory->id }}">Delete confirmation</h5>
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
                                            <div class="modal fade" id="editModal{{ $childcategory->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $childcategory->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel{{ $childcategory->id }}">Edit ChildCategory</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('childcategory.update', $childcategory->id) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group">
                                                                    <label for="name">Name</label>
                                                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputName1" placeholder="Name" value="{{ old('name', $childcategory->name) }}" required>
                                                                    @error('name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group @error('subcategory_id') has-error @enderror">
                                                                    <label for="subcategory_id">Choose Subcategory</label>
                                                                    <select class="form-control" name="subcategory_id" required>
                                                                        <option value="" disabled>Select Subcategory</option>
                                                                        @foreach (App\Models\Subcategory::all() as $subcategory)
                                                                            <option value="{{ $subcategory->id }}" {{ $subcategory->id == old('subcategory_id', $childcategory->subcategory_id) ? 'selected' : '' }}>
                                                                                {{ $subcategory->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('subcategory_id')
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
                                                <td colspan="4" class="text-center">No child category to display</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add ChildCategory Modal -->
            <div class="modal fade" id="addChildCategoryModal" tabindex="-1" aria-labelledby="addChildCategoryModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addChildCategoryModalLabel">Add ChildCategory</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('childcategory.store') }}" method="POST">
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
                                <div class="form-group @error('subcategory_id') has-error @enderror">
                                    <label for="subcategory_id">Choose Subcategory</label>
                                    <select class="form-control" name="subcategory_id" required>
                                        <option value="" disabled selected>Select Subcategory</option>
                                        @foreach (App\Models\Subcategory::all() as $subcategory)
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('subcategory_id')
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
                td[class^="category_"] {
                    background-color: unset;
                }
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
                }
                td.category_10 {
                    background-color: rgb(84, 148, 245);
                }
                td.category_11 {
                    background-color: rgb(173, 24, 49);
                }
                td.category_12 {
                    background-color: rgb(209, 235, 139);
                }
                td.category_13 {
                    background-color: rgb(160, 235, 39);
                }
            </style>
        </div>
    </div>
@endsection
