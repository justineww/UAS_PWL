@extends('layout.main')
@section('title', ':Lamp:')
@section('content')
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="/users/password/update" method="post">
                @csrf
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
            </form>
        </div>
    </div>
@endsection