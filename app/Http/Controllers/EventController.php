<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $events = Event::when($search, function ($query, $search) {
            return $query->where('event_name', 'like', "%{$search}%")
                         ->orWhere('location', 'like', "%{$search}%");
        })->latest()->paginate(10);
        
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_name' => 'required|max:50',
            'date' => 'required|date',
            'location' => 'required|max:100',
            'description' => 'nullable'
        ]);

        Event::create($request->all());

        return redirect()->route('events.index')
                         ->with('success', 'Event created successfully.');
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'event_name' => 'required|max:50',
            'date' => 'required|date',
            'location' => 'required|max:100',
            'description' => 'nullable'
        ]);

        $event->update($request->all());

        return redirect()->route('events.index')
                         ->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')
                         ->with('success', 'Event deleted successfully.');
    }
}