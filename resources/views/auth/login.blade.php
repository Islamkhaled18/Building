@extends('layouts.app')


@section('title')

صفحة تسجيل الدخول
    
@endsection

@section('content')

<div class="container">
    <div class="contact_bottom">
        <hr>
        <h3 >تسجيـــل الدخول</h3>
        <hr>
        <form method="POST" action="{{ route('login') }}">
            @csrf
    
            <div class="text2 row">    
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <br>

            <div class="text2 row">    
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" > 
    
                    @error('password')
                        <span class="invalid-feedback" role="alert" >
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <br>
            
            <div class="text2 row">
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>    
                        <label class="form-check-label" for="remember">
                            تذكرني
                        </label>
                    </div>
                </div>
            </div>
    
            <div class="form-group row mb-0">
                <div class="col-md-6">
                    <button type="submit" class="btn-warning">
                        تسجيل الدخول
                    </button>    
                    @if (Route::has('password.request'))
                        <a class="banner_btn" href="{{ route('password.request') }}">
                            هل نسيت كلمة المرور ؟
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>

@endsection