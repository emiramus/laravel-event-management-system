@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Event List</h1>
    
    @if($events->count() > 0)
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Event Name</th>
                        <th>Date</th>
                        <th>Location</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                        <tr>
                            <td>{{ $event->id }}</td>
                            <td>{{ $event->event_name }}</td>
                            <td>{{ $event->date->format('M d, Y') }}</td>
                            <td>{{ $event->location }}</td>
                            <td>
                                <a href="{{ route('events.show', $event->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">
            No events found. <a href="{{ route('events.create') }}">Create the first event</a>.
        </div>
    @endif
@endsection