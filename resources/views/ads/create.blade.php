@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-9">
        @if ($errors->any())
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeachzz
        </div>
            
        @endif
    </div>
    
    <div class="row">
        <div class="col-md-3">
            @include('sidebar')
        </div>
        <div class="col-md-9">
            <form action="{{ route('ads.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card shadow">
                    <div class="card-header text-white" style="background-color:rgb(123, 129, 212)"><h2>Post your ad.</h2></div>
                    <div class="card-body">
                        <label for="file mt-2"><b>Upload 3 images</b></label>
                        <div class="form-inline form-group mt-2">
                            <div class="col-md-4">   
                               <image-preview />
                            </div>
                            <div class="col-md-4"> 
                                <first-image />
                            </div>
                            <div class="col-md-4">
                                <second-image />
                            </div>
                        </div>
                        <hr style="border: 2px solid #3117c7da"> 
                        <label for="file mt-2"><b>Category</b></label>
                        <div class="form-inline form-group mt-2">
                            <div class="col-md-4 form-inline">   
                               <category-dropdown />
                            </div>
                        </div>
                        <hr style="border: 2px solid #3117c7da">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter product name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control"  name="description" placeholder="Enter product description">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">original Price</label>
                            <input type="text" class="form-control" name="or_price" placeholder="Enter product original price" value="{{ old('or_price') }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Quantity</label>
                            <input type="text" class="form-control" name="quantity" placeholder="Enter product quantity" value="{{ old('quantity') }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" name="price" placeholder="Enter product price" value="{{ old('price') }}">
                        </div>
                        <div class="form-group">
                            <label for="price">sele_Price</label>
                            <input type="text" class="form-control" name="sale_price" placeholder="Enter product sale price" value="{{ old('sale_price') }}">
                        </div>
                        <div class="form-group">
                            <label for="price_status">Price Status</label>
                            <select name="price_status" class="form-control">
                                <option value="negotiable">Negotiable</option>
                                <option value="fixed">Fixed</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product_condition">Product Condition</label>
                            <select name="product_condition" class="form-control">
                                <option value="">Select</option>
                                <option value="likenew">Looks like New</option>
                                <option value="heavilyused">Heavily Used</option>
                                <option value="new">New</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="listing_location">Listing Location</label>
                            <input type="text" class="form-control" name="listing_location" value="{{ old('listing_location') }}">
                        </div>
                        <hr style="border: 2px solid #3117c7da"> 
                        <label for="file mt-2"><b>Category</b></label>
                        <div class="form-inline form-group mt-2">
                            <div class="col-md-4 form-inline">   
                               <country-dropdown />
                            </div>
                        </div>
                        <hr style="border: 2px solid #3117c7da"> 
                        <div class="form-group">
                            <label for="phone_number">Seller Contact Number</label>
                            <input type="number" class="form-control" name="phone_number" value="{{ old('phone_number') }}">
                        </div>
                        <div class="form-group">
                            <label for="link">Demo Link of Product</label>
                            <input type="text" class="form-control" name="link" value="{{ old('link') }}">
                        </div>
                        <button type="submit" class="btn btn-danger">Publish</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
