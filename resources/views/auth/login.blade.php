
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="icon" type="image/ico" href="images/LAIRICO.jpg" />
<style>
    body {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  /* background: #eceffc; */
  background-image: url("/images/home_bg.jpg"); 
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center;
  background-size:cover;
}

.btn {
  padding: 8px 20px;
  border-radius: 0;
  overflow: hidden;

  &::before {
    position: absolute;
    content: "";
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(
      120deg,
      transparent,
      var(--primary-color),
      transparent
    );
    transform: translateX(-100%);
    transition: 0.6s;
  }

  &:hover {
    background: transparent;
    box-shadow: 0 0 20px 10px hsla(204, 70%, 53%, 0.5);

    &::before {
      transform: translateX(100%);
    }
  }
}

.form-input-material {
  --input-default-border-color: white;
  --input-border-bottom-color: white;
  
  input {
    color: white;
  }
}

.login-form {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 50px 40px;
  color: white;
  background: rgba(0, 0, 0, 0.8);
  border-radius: 10px;
  box-shadow: 0 0.4px 0.4px rgba(128, 128, 128, 0.109),
    0 1px 1px rgba(128, 128, 128, 0.155),
    0 2.1px 2.1px rgba(128, 128, 128, 0.195),
    0 4.4px 4.4px rgba(128, 128, 128, 0.241),
    0 12px 12px rgba(128, 128, 128, 0.35);

  h1 {
    margin: 0 0 24px 0;
  }

  .form-input-material {
    margin: 12px 0;
  }

  .btn {
    width: 100%;
    margin: 18px 0 9px 0;
  }
}

</style>


    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" class="login-form">
        @csrf
            <h1>Login</h1>
            <div class="form-input-material">
              <label for="username">Username</label>
              <input type="text"  name="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" value="{{ old('username') }}" required autofocus/>
              @if ($errors->has('username'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-input-material mt-1">
              <label for="password">Password</label>
              <input type="password" type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"  required />
              @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary btn-ghost mt-3">Login</button>
       
    </form>



{{-- ==================== --}}
{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
