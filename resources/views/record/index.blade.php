@extends('layouts.app') @section('content')
<main class="container">
    <h2>Call Records - {{ count($records) }}</h2>

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
                        <td>{{ \Carbon\Carbon::parse($record->start_time)->format('M d, Y g:i A') }}</td>
                        <td>{{ \Carbon\Carbon::parse($record->end_time)->format('M d, Y g:i A') }}</td>
                        <td>{{ $record->caller_id }}</td>
                        <td>{{ $record->caller_number }}</td>
                        <td>
                            @if($record->call_status === 'Answered')
                                <ins>{{ $record->call_status }}</ins> @elseif($record->call_status === 'Missed')
                                <del>{{ $record->call_status }}</del> @else
                                {{ $record->call_status }}
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center;">No call records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </figure>
</main>
@endsection