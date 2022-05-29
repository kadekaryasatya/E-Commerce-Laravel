@extends('layouts.auth')

@section('content')


<section class="vh-100">


  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">

        <div class="px-5 ms-xl-4">
          <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
          <span class="h1 fw-bold mb-0">ASHION</span>
        </div>

        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">


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

                        <form style="width: 23rem;" method="POST" action="{{ route('actionlogin') }}">
                            @csrf

                        <h3 class="fw-normal pt-5 mb-1 pb-4" style="letter-spacing: 1px;">Hii ... Admin</h3>


                        <div class="form-outline pt-1 mb-4">
                            <input placeholder="Email" type="email" id="username" class="form-control form-control-lg" name="username" id="username" required/>
                        </div>

                        <div class="form-outline mb-4">
                            <input placeholder="password" type="password" class="form-control form-control-lg"  name="password" id="password" required/>
                        </div>

                        <div class="pt-3 mb-4">
                        <button class="btn btn-info btn-lg btn-block" type="submit">LOGIN</button>
                        </div>
                    </form>

            {{-- <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p> --}}
            {{-- <p>Don't have an account? <a href="#!" class="link-info">Register here</a></p> --}}


        </div>

      </div>
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="{{ asset('imagellogin.jpg')}}"
          alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>
    </div>
  </div>
</section>
@endsection
