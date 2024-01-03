@extends('auth.layouts.auth-layout')
@section('content')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand d-flex justify-content-center">
                        <img src="../assets/img/stisla-fill.svg" alt="logo" width="100"
                            class="shadow-light rounded-circle">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Enter Your Email here. We will provide reset password link on your Email. </h4>
                        </div>


                        <div class="card-body">
                            @if (session('status'))
                                <p class="text-success">{{ session('status') }}</p>
                            @endif
                            <form method="POST" action="{{ route('password.email') }}" class="needs-validation"
                                novalidate="">
                                @csrf

                                {{-- email  --}}
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email"
                                        value="{{ old('email') }}" tabindex="1" required autofocus>

                                    @if ($errors->has('email'))
                                        <code>{{ $errors->first('email') }}</code>
                                    @endif

                                </div>



                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Email Password Reset Link
                                    </button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
