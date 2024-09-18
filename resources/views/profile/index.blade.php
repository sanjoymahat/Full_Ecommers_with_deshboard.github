@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('sidebar')
            </div>

            <div class="col-md-5">
                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif

                <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header text-white" style="background-color: red">Update profile</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Fullname</label>
                                <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" value="{{ auth()->user()->address }}">
                            </div>
                            <div class="form-group">
                                <label for="image">Profile picture</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Update profile</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-4">
                @if (session('status') === 'password-updated')
                    <div class="alert alert-success">Your password has been updated</div>
                @endif

                <form action="{{ route('password.update') }}" method="post">
                    
                    @csrf
                    <div class="card">
                        <div class="card-header text-white" style="background-color: red">Change password</div>
                        <div class="card-body">
                            <a href="{{ url('password/reset') }}" class="">Forgetpassword</a>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
