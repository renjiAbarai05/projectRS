<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="icon" type="image/ico" href="images/LAIRICO.jpg" />

<!-- Sweetalert2 JS and CSS-->
<script src="{{ asset('js/sweetalert2@10.min.js') }}"
integrity="sha512-Wv8c8chIOY6Gt4Fesj+VYlEt+Qd+GIIKcoZGtPPh7l6Edc0QZlJoYQGVoQIBDDAFSzRNbJfnS9ml47BGRNdNiQ=="
crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ asset('css/sweetalert2@10.min.css') }}"
integrity="sha512-NU255TKQ55xzDS6UHQgO9HQ4jVWoAEGG/lh2Vme0E2ymREox7e8qwIfn6BFem8lbahhU9E2IQrHZlFAxtKWH2Q=="
crossorigin="anonymous" />

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
    padding: 20px 40px;
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

        <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}"  class="login-form">
            @csrf
                    <h1>Register</h1>
                    <div class="form-input-material">
                        <label for="firstName" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                        <input id="firstName" type="text" class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" value="{{ old('firstName') }}" required autofocus>

                        @if ($errors->has('firstName'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('firstName') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-input-material">
                        <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>

                        <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required>

                        @if ($errors->has('username'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-input-material">
                       <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    
                
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
    
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
        
                    <div class="form-input-material">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
        
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                     
                    </div>

                    <button type="submit" class="btn btn-primary btn-ghost mt-3">Register</button>
               
            </form>
        
        

 <script>
     
     Swal.fire('Please Login to book or create an account first.');

</script>           
        