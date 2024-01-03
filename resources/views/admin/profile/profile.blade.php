@extends('admin.layout.layout')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hi, {{old('name', $user->name) }}</h2>
            <p class="section-lead">
                Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">

                <div class="col-12 col-md-12 col-lg-7">
                    {{-- profile update card  --}}
                    <div class="card">
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('profile.update') }}">
                                    @csrf
                                    @method('patch')
                                    <div class="row">
                                        {{-- name  --}}
                                        <div class="form-group col-md-6 col-12">
                                            <label>Name</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                value="{{ old('name', $user->name) }}" required="">
                                            @if ($errors->has('name'))
                                                <code>{{ $errors->first('name') }}</code>
                                            @endif
                                        </div>
                                        {{-- email  --}}
                                        <div class="form-group col-md-6 col-12">
                                            <label>Email</label>
                                            <input type="email" id="email" name="email" class="form-control"
                                                value="{{ old('email', $user->email) }}" required="">
                                            @if ($errors->has('email'))
                                                <code>{{ $errors->first('email') }}</code>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-primary">Update profile</button>
                                    </div>
                                </form>


                            </div>

                    </div>

                    {{-- password change card --}}
                    <div class="card">
                        <div class="card-header">
                            <h4>Change your Password</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('password.update') }}">
                                @csrf
                                @method('put')
                                <div class="row">
                                    {{-- current pass  --}}
                                    <div class="form-group col-12">
                                        <label>current password</label>
                                        <input type="password" id="current_password" name="current_password" class="form-control" required="" autocomplete="current-password">
                                        @if ($errors->updatePassword->has('current_password'))
                                            <code>{{ $errors->updatePassword->first('current_password') }}</code>
                                        @endif
                                    </div>
                                    {{-- new pass  --}}
                                    <div class="form-group col-12">
                                        <label>New password</label>
                                        <input type="password" id="password" name="password" class="form-control" required="" autocomplete="new-password">
                                        @if ($errors->updatePassword->has('password'))
                                            <code>{{ $errors->updatePassword->first('password') }}</code>
                                        @endif
                                    </div>
                                    {{-- confirm pass  --}}
                                    <div class="form-group col-12">
                                        <label>Confirm password</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required="" autocomplete="new-password">
                                        @if ($errors->updatePassword->has('password_confirmation'))
                                            <code>{{ $errors->updatePassword->first('password_confirmation') }}</code>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary">Change password</button>
                                </div>
                            </form>


                        </div>

                </div>
                </div>
            </div>
        </div>
    </section>
@endsection
