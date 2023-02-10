@extends ('layouts.layout')
@section("content")
    <section class="clients_section">
        <div class="clients_nav">
            <a href="/dashboard"><span>&#x3c;</span> Go back to dashboard</a>
            <button onclick="window.location.href='client/create'">Create client</button>
        </div>
        <table>
        <theader>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Cash loan</th>
                <th>Home loan</th>
                <th>Actions</th>
            </tr>
        </theader>
        <tbody>
        @foreach ($clients as $client)
            <tr>
                <td>{{ $client->first_name }}</td>
                <td>{{ $client->last_name }}</td>
                <td>{{ $client->email }}</td>
                <td>{{ $client->phone_number }}</td>
                <td>{{ $client->cashLoanProducts()->first() ? 'Yes' : 'No' }}</td>
                <td>{{ $client->homeLoanProducts()->first() ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ url('/client/' . $client->id . '/edit') }}">
                        <button class="editClient">Edit</button>
                    </a>
                    <button class="deleteClient" data-id="{{ $client->id }}">Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </section>
@endsection