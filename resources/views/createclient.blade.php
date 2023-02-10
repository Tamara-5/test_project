@extends ('layouts.layout')
@section("content")
    <section class="clients_section">
        <div class="clients_nav">
            <a href="/all-clients"><span>&#x3c;</span> Go back to clients</a>
        </div>
        <form action="/client" method="post">
            @csrf
            <div class="form-group">
                <label for="first_name">First name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{old( 'first_name' )}}">
                @if($errors->first('first_name')) {{ $errors->first('first_name') }} @endif
            </div>
            <div class="form-group">
                <label for="last_name">Last name:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{old( 'last_name' )}}">
                @if($errors->first('last_name')) {{ $errors->first('last_name') }} @endif
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{old( 'email' )}}">
                @if($errors->first('email')) {{ $errors->first('email') }} @endif
            </div>
            <div class="form-group">
                <label for="phone_number">Phone number:</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{old( 'phone_number' )}}">
                @if($errors->first('phone_number')) {{ $errors->first('phone_number') }} @endif
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </section>
@endsection