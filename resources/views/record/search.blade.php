@extends('layouts.app')

@section('content')
<main class="container">
    <h2>Search Call Records</h2>

    <form action="{{ url('cdr/number_serach') }}" method="GET" role="search" style="margin-bottom: 2rem;">
        <input 
            type="search" 
            name="caller_number" 
            placeholder="Enter Caller Number..." 
            value="{{ request('caller_number') }}" 
            required
        />
        <input type="submit" value="Search" />
    </form>

    @if(request()->filled('caller_number'))
        <h3>Results for "{{ request('caller_number') }}"</h3>
        
        <figure>
            <table role="grid">
                <thead>
                    <tr>
                        <th scope="col">Start Time</th>
                        <th scope="col">End Time</th>
                        <th scope="col">Caller ID</th>
                        <th scope="col">Caller Number</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($records as $record)
                        <tr>
                            <td>{{ $record->start_time }}</td>
                            <td>{{ $record->end_time }}</td>
                            <td>{{ $record->caller_id }}</td>
                            <td>{{ $record->caller_number }}</td>
                            <td>{{ $record->call_status }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center;">No records found for this number.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </figure>

        @if(isset($records) && $records->hasPages())
            {{ $records->links() }}
        @endif
    @endif

</main>
@endsection