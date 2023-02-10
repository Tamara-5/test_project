@extends ('layouts.layout')
@section("content")

    <div class="clients_nav">
        <a href="/all-clients"><span>&#x3c;</span> Go back to clients</a>
    </div>
    <div class="tabs">
    <div class="tab-header">
        <div class="tab-header-item" data-tab="tab-1">Client Data</div>
        <div class="tab-header-item" data-tab="tab-2">Cash Loan Product Data</div>
        <div class="tab-header-item" data-tab="tab-3">Home Loan Product Data</div>
    </div>
    <div class="tab-content">
    <div class="tab-item" id="tab-1">
        @if(session('editedclient'))
            <div class="alert-success">
                {{ session('editedclient') }}
            </div>
        @endif
        <section class="clients_section">
            <form action="/client/{{ $client->id }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="first_name">First name:</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{old( 'first_name' ) ?? $client->first_name}}">
                    @if($errors->first('first_name')) {{ $errors->first('first_name') }} @endif
                </div>
                <div class="form-group">
                    <label for="last_name">Last name:</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{old( 'last_name' ) ?? $client->last_name}}">
                    @if($errors->first('last_name')) {{ $errors->first('last_name') }} @endif
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{old( 'email' ) ?? $client->email}}">
                    @if($errors->first('email')) {{ $errors->first('email') }} @endif
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone number:</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{old( 'phone_number' ) ?? $client->phone_number}}">
                    @if($errors->first('phone_number')) {{ $errors->first('phone_number') }} @endif
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </section>
    </div>
    <div class="tab-item" id="tab-2">
        <section id="cashloan_section">

            @if($client->cashLoanProducts()->first() && $client->cashLoanProducts()->value('adviser_id') != auth()->user()->id)
                <p class="center">The loan belongs to another adviser</p>
            @else
                @if($client->cashLoanProducts()->first())
                    <h3>Edit Cash Loan</h3>
                @else
                    <h3>Create Cash Loan</h3>
                @endif
                <form action="/client/{{ $client->id }}/cashloan" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="loan_amount">Loan Amount:</label>
                        <input type="number" class="form-control" id="loan_amount" name="loan_amount" value="{{old( 'loan_amount' ) ?? $client->cashLoanProducts()->value('loan_amount')}}">
                        @if($errors->first('loan_amount')) {{ $errors->first('loan_amount') }} @endif
                    </div>
                    <button type="submit" class="btn btn-primary"">Save</button>
                </form>
            @endif
            @if(session('cashloan'))
                <div class="alert-success">
                    {{ session('cashloan') }}
                </div>
            @endif
        </section>
    </div>
    <div class="tab-item" id="tab-3">
        @if(session('homeloan'))
            <div class="alert-success">
                {{ session('homeloan') }}
            </div>
        @endif
        <section id="homeloan_section">
            @if($client->homeLoanProducts()->first() && $client->homeLoanProducts()->value('adviser_id') != auth()->user()->id)
                <p class="center">The loan belongs to another adviser</p>
            @else
                @if($client->homeLoanProducts()->first())
                    <h3>Edit Home Loan</h3>
                @else
                    <h3>Create Home Loan</h3>
                @endif
                <form action="/client/{{ $client->id }}/homeloan" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="property_value">Property Value:</label>
                        <input type="number" class="form-control" id="property_value" name="property_value" value="{{old( 'property_value' ) ?? $client->homeLoanProducts()->value('property_value')}}">
                        @if($errors->first('property_value')) {{ $errors->first('property_value') }} @endif
                    </div>
                    <div class="form-group">
                        <label for="down_payment_amount">Down Payment Amount:</label>
                        <input type="number" class="form-control" id="down_payment_amount" name="down_payment_amount" value="{{old( 'down_payment_amount' ) ?? $client->homeLoanProducts()->value('down_payment_amount')}}">
                        @if($errors->first('down_payment_amount')) {{ $errors->first('down_payment_amount') }} @endif
                    </div>
                    <button id="updateOrCreateHome" type="submit" class="btn btn-primary" data-id="{{ $client->id }}">Save</button>
                </form>
            @endif
        </section>
    </div>
  </div>
</div>    
@endsection