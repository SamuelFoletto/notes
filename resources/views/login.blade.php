@extends('layouts.main_layout')
@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-8">
                <div class="card p-5">
                    
                    <div class="text-center p-3">
                        <img src="assets/images/logo.png" alt="Notes logo">
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-10 col-12">
                            @if(session('WithoutLogin'))
                                <div class="alert alert-warning">
                                    {{ session('WithoutLogin') }}
                                </div>
                            @endif
                            <form action="/loginSubmit" method="post" novalidate>
                                @csrf
                                <div class="mb-3">
                                    <label for="text_username" class="form-label">Username</label>
                                    <input type="email" class="form-control bg-dark text-info" name="text_username" value="{{ old('text_username') }}" required>

                                    @error('text_username')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="text_password" class="form-label">Password</label>
                                    <input type="password" class="form-control bg-dark text-info" name="text_password" value="{{ old('text_password') }}" required>

                                    @error('text_password')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-secondary w-100">LOGIN</button>
                                </div>

                                @if(session('LoginError'))
                                    <div class="alert alert-danger">
                                        {{ session('LoginError') }}
                                    </div>
                                @endif

                                @if(session('logout'))
                                    <div class="alert alert-success">
                                        {{ session('logout') }}
                                    </div>
                                @endif
                            </form>

                        </div>
                    </div>


                    <!-- copy -->
                    <div class="text-center text-secondary mt-3">
                        <small>&copy; <?= date('Y') ?> Notes</small>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection