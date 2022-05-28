@extends('layouts.auth')

@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-warning mb-4">
    <div class="container">
        <a class="navbar-brand" href="/"><strong>TOKO KLONTONG</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<h1><center>Hai, Admin !</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Admin Login</div>

                <div class="card-body">
                    @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-warning">{{ $error }}</div>
                    @endforeach
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="alert alert-warning">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('actionlogin') }}">
                        @csrf
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" required class="form-control">
                        </div>
                        <div class="form-group">
                            <p></p>
                            <button type="submit" class="btn btn-warning">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
