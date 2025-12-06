<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MasterController extends Controller
{
    public function load($page)
    {

        $data = [];

        switch ($page) {

            case 'about':
                // $data['title'] = 'About Our NGO';
                // $data['stats'] = [
                //     'beneficiaries' => 12000,
                //     'regions' => 5,
                //     'programs' => 14,
                // ];
                break;

            case 'contact':
                // $data['phones'] = ['+256 700 000000', '+256 780 000000'];
                // $data['email'] = 'info@ngo.org';
                break;

            case 'donate':
                // $data['payment_methods'] = ['Mobile Money', 'Bank Transfer', 'Card'];
                break;

            case 'blog':
                // $data['posts'] = Blog::latest()->take(5)->get();
                break;

            case 'projects':
                // $data['projects'] = Project::active()->get();
                break;

            case 'login':
                // $data['projects'] = Project::active()->get();
                break;

            case 'sermon':
                $data['program'] = Program::orderBy('id', 'desc')->get();
                break;

            case 'volunteers':
                break;

            case 'event':
                $data['events'] = Event::orderBy('event_date', 'asc')->get();
                break;

            default:

        }

        if (view()->exists("frontend.$page")) {
            return view("frontend.$page", $data);
        }

        abort(404);
    }

    public function Userlogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'errors' => [
                    'email' => ['This email is not registered.']
                ]
            ], 401);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'errors' => [
                    'password' => ['The password you entered is incorrect.']
                ]
            ], 401);
        }

        Auth::login($user);
        $request->session()->regenerate();
        $request->session()->put('LoggedAdmin', $user->id);

        return response()->json([
            'message' => 'Login successful!',
            'redirect' => route('admin.dashboard')
        ], 200);
    }

    public function storeUser()
    {

        $email = 'huzaifabukenya227@gmail.com';
        $password = 'Pa$$w0rd!';

        $user = User::create([
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        dd('Dummy user created successfully');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->forget('LoggedAdmin');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('/')->with('status', 'Logged out successfully');
    }

    public function index()
    {
        return view('frontend.index');
    }

    public function events()
    {
        return view('frontend.events');
    }

}
