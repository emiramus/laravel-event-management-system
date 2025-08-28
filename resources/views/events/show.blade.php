@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Event Details</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $event->event_name }}</h5>
            <p class="card-text"><strong>Date:</strong> {{ $event->date->format('F j, Y') }}</p>
            <p class="card-text"><strong>Location:</strong> {{ $event->location }}</p>
            <p class="card-text"><strong>Description:</strong> {{ $event->description ?? 'No description provided.' }}</p>
            
            <div class="mt-3">
                <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
                <a href="{{ route('events.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
@endsection