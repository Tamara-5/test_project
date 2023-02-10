@extends ('layouts.layout')
@section("content")
    <section class="reports_section">
        <div class="clients_nav">
            <a href="/dashboard"><span>&#x3c;</span> Go back to dashboard</a>
        </div>
        <table>
        <theader>
            <tr>
                <th>Product Type</th>
                <th>Product Value</th>
                <th>Creation date</th>
            </tr>
        </theader>
        <tbody>
        @foreach ($loans as $loan)
            <tr>
                <td>{{ $loan?->loan_amount ? 'Cash Loan' : 'Home Loan' }}</td>
                <td>{{ $loan?->loan_amount ??  $loan?->property_value . ' - ' . $loan?->down_payment_amount}}</td>
                <td>{{ $loan?->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </section>
@endsection