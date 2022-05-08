@extends('admin.admin_master')
@section('admin')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>User Profile Update</h2>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form method="post" action="{{ route('update.user.profile') }}">
                @csrf
                <div class="form-group">
                    <label for="username">User name</label>
                    <input type="text" id="username" name="name" value={{ $user->name }} class="form-control input-lg">
                </div>
                <div class="form-group">
                    <label for="email">User email</label>
                    <input type="text" id="email" name="email" value={{ $user->email }} class="form-control input-lg">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
