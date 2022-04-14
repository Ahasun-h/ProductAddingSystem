@extends('backend.auth.app')

@section('title', 'Dashbord')

@section('auth_content')
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark" style="height: 100vh;">
            <div class="auth-box bg-dark">
              <div id="loginform">
                <div class="text-center pt-3 pb-3">
                  <span class="db">
                      <img src="{{ asset('backend/assets/images/logo.png') }}" alt="logo" />
                  </span>
                </div>
                <!-- Form -->
                <form class="form-horizontal mt-3" id="loginform" method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="row">
                    <div class="col-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white h-100" id="basic-addon1">
                                    <i class="mdi mdi-account fs-4"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" required autocomplete="email" autofocus/>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-warning text-white h-100" id="basic-addon2">
                                    <i class="mdi mdi-lock fs-4"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required autocomplete="current-password"/>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror 
                        </div>

                        <div class="input-group row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember" style="color: #fff;">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>



                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <div class="pt-1">
                          <button class="btn btn-info" id="to-recover" type="button">
                            <i class="mdi mdi-lock fs-4 me-1"></i> Lost password?
                          </button>
                          <button class="btn btn-success float-end text-white" type="submit">
                            Login
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
@endsection
        