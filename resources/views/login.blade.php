<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
    </head>
    <body>
    <section class="login_section">
        <div class="login_form">
            <form action="{{ url('/login') }}" method="post">
                {{ csrf_field() }}
                @if($errors->first('wrongUser')) {{ $errors->first('wrongUser') }} @endif
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter Email" value="{{old( 'email' )}}">
                    @if($errors->first('email')) {{ $errors->first('email') }} @endif
                </div>
                <div class="form-group">
                    <div class="forget_block">
                        <label for="password">Password</label>
                    </div>
                    <input type="password" name="password" id="password"  placeholder="Enter your password">
                    @if($errors->first('password')) {{ $errors->first('password') }} @endif
                </div>
                <input type="submit" value="Sign In" />
            </form>
        </div>
    </section>
    </body>
    <script src="{{ asset('js/app.js') }}"></script>
</html>