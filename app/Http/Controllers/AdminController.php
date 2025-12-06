<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Volunteer;
use App\Models\Program;
use App\Models\Partner;
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

            $dir = public_path('events');
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }

            $filename = time() . '_' . uniqid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('events'), $filename);
            $event->image = $filename;
        }


        $event->save();

        return redirect()->back()->with('success', 'Event created successfully!');
    }

    public function updateEvent(Request $request)
    {
        $event = Event::findOrFail($request->id);

        $request->validate([
            'event_date' => 'required|date',
            'event_time' => 'required',
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048'
        ]);

        // Update normal fields
        $event->event_date = $request->event_date;
        $event->event_time = $request->event_time;
        $event->title = $request->title;
        $event->description = $request->description;

        // Handle image upload
        if ($request->hasFile('image')) {

            // Delete old image
            if ($event->image && file_exists(public_path('events/' . $event->image))) {
                unlink(public_path('events/' . $event->image));
            }

            // Ensure folder exists
            $dir = public_path('events');
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }

            // Save new image
            $filename = time() . '_' . uniqid() . '.' .
                $request->image->getClientOriginalExtension();

            $request->image->move(public_path('events'), $filename);

            $event->image = $filename;
        }

        $event->save();

        return redirect()->back()->with('success', 'Event updated successfully!');
    }


    public function deleteEvent($id)
    {
        Event::findOrFail($id)->delete();
        return back()->with('success', 'Event deleted!');
    }

    public function storeVolunteer(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'area_of_interest' => 'required',
            'message' => 'required'
        ]);

        Volunteer::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Your volunteer request has been submitted successfully. Please wait for confirmation!'
        ]);
    }

    public function storePartner(Request $request)
    {

        $request->validate([
            'organization' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'organization_type' => 'required|string',
            'interest_area' => 'required|string',
            'message' => 'required|string',
        ]);

        Partner::create($request->all());

        return response()->json([
            'message' => 'Thank you for your interest! Our team will contact you soon.'
        ]);
    }

    public function adminVolunteers()
    {
        $volunteers = Volunteer::orderBy('id', 'asc')->get();
        return view('frontend.volunteers-admin', compact('volunteers'));
    }

    public function deleteVolunteer($id)
    {
        $volunteer = Volunteer::findOrFail($id);
        $volunteer->delete();

        return redirect()->back()->with('success', 'Volunteer deleted successfully!');
    }

    public function adminPartners()
    {
        $partners = Partner::orderBy('id', 'asc')->get();
        return view('frontend.partners-admin', compact('partners'));
    }

    public function deletePartner($id)
    {
        Partner::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Partner deleted successfully.');
    }

    public function adminPrograms()
    {
        $programs = Program::latest()->get();
        return view('frontend.programs-admin', compact('programs'));
    }

    public function storePrograms(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'details' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        $program = new Program();

        $program->title = $request->title;
        $program->excerpt = $request->excerpt;
        $program->details = $request->details;

        if ($request->hasFile('image')) {
            $filename = time() . '_' . uniqid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('programs'), $filename);
            $program->image = $filename;
        }

        $program->save();

        return redirect()->back()->with('success', 'Program created successfully!');
    }

    public function updatePrograms(Request $request)
    {
        $program = Program::findOrFail($request->id);

        $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'details' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {

            if ($program->image && file_exists(public_path('programs/' . $program->image))) {
                unlink(public_path('programs/' . $program->image));
            }

            $filename = time() . '_' . uniqid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('programs'), $filename);
            $program->image = $filename;
        }

        $program->update([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'details' => $request->details,
        ]);

        return redirect()->back()->with('success', 'Program updated successfully!');
    }

    public function deletePrograms($id)
    {
        $program = Program::findOrFail($id);

        if ($program->image && file_exists(public_path('programs/' . $program->image))) {
            unlink(public_path('programs/' . $program->image));
        }

        $program->delete();

        return redirect()->back()->with('success', 'Program deleted successfully.');
    }
}
