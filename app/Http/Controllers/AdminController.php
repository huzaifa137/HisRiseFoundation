<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class AdminController extends Controller
{

    public function dashboard()
    {
        return view('frontend.dashboard');
    }

    public function adminUsers()
    {
        $users = User::all();
        return view('frontend.users', compact(['users']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'User created successfully');
    }


    public function update(Request $request)
    {
        $user = User::findOrFail($request->id);

        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'User updated!');
    }


    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return back()->with('success', 'User deleted!');
    }

    public function adminEvents()
    {
        $events = Event::orderBy('event_date', 'asc')->get();
        return view('frontend.events-admin', compact('events'));
    }

    public function storeEvent(Request $request)
    {
        $request->validate([
            'event_date' => 'required|date',
            'event_time' => 'required',
            'title' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        Event::create([
            'event_date' => $request->event_date,
            'event_time' => $request->event_time,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return back()->with('success', 'Event created successfully!');
    }

    public function updateEvent(Request $request)
    {
        $event = Event::findOrFail($request->id);

        $event->event_date = $request->event_date;
        $event->event_time = $request->event_time;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->save();

        return back()->with('success', 'Event updated successfully!');
    }

    public function deleteEvent($id)
    {
        Event::findOrFail($id)->delete();
        return back()->with('success', 'Event deleted!');
    }

}
