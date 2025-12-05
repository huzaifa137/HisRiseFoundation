<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
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
            'description' => 'nullable|string',
            'image' => 'nullable|image'
        ]);

        $event = new Event();

        $event->event_date = $request->event_date;
        $event->event_time = $request->event_time;
        $event->title = $request->title;
        $event->description = $request->description;

        if ($request->hasFile('image')) {
            $event->image = $request->image->store('events', 'public');
        }

        $event->save();

        return redirect()->back()->with('success', 'Event created successfully!');
    }

    public function updateEvent(Request $request)
    {

        $event = Event::findOrFail($request->id);

        $data = $request->validate([
            'event_date' => 'required|date',
            'event_time' => 'required',
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {

            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }

            $data['image'] = $request->image->store('events', 'public');
        }

        $event->update($data);

    }

    public function deleteEvent($id)
    {
        Event::findOrFail($id)->delete();
        return back()->with('success', 'Event deleted!');
    }

}
