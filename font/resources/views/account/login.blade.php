@extends('account.main')
@section('checkaccount')
<div class="container">
    <section
      class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4"
    >
      <div class="container">
        <div class="row justify-content-center">
          <div
            class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center"
          >

            <div class="card mb-3">
              <div class="card-body">
                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">
                    Login to Your Account
                  </h5>
                  <p class="text-center small">
                    Enter your username & password to login
                  </p>
                </div>

                <form class="row g-3" action="{{ route('actionLogin')}}" method="POST">
                  @csrf
                  <div class="col-12">
                    <label class="form-label"
                      >Email</label
                    >
                    <div class="input-group ">
                      <span class="input-group-text"
                        >@</span
                      >
                      <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email')}}"
                      />

                    </div>
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                  </div>

                  <div class="col-12">
                    <label class="form-label"
                      >Password</label
                    >
                    <input
                      type="password"
                      name="password"
                      class="form-control"
                      value="{{ old('password')}}"
                    />

                  </div>
                  @if ($errors->has('password'))
                  <span class="text-danger">{{ $errors->first('password') }}</span>
                  @endif
                  @if ($errors->has('loginError'))
                  <span class="text-danger">{{ $errors->first('loginError') }}</span>
                  @endif
                  @if (isset($messe))
                  <span class="text-danger">{{ $messe }}</span>
                  @endif
                  

                  {{-- <div class="col-12">
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="checkbox"
                        name="remember"
                        value="true"
                        id="rememberMe"
                      />
                      <label class="form-check-label" for="rememberMe"
                        >Remember me</label
                      >
                    </div>
                  </div> --}}
                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">
                      Login
                    </button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0">
                      Don't have account?
                      <a href="{{ route('register')}}">Create an account</a>
                    </p>
                  </div>
                </form>
              </div>
            </div>


          </div>
        </div>
      </div>
    </section>
  </div>
@endsection