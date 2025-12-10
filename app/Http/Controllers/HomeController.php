<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Complaint;
use App\Models\User;
use App\Mail\StudentInfoMail;
use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function submit(Request $request)
    {
        $data = $request->all();

        Mail::to($data['email'])->send(new StudentInfoMail($data));

        return back()->with('success', 'Email sent successfully!');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $data['user'] = auth()->user();
        return view('dashboard_admin', $data);
    }

    public function index()
    {
        $data['complaints'] = Complaint::count();
        $data['complaint_in_progress'] = Complaint::where('complaint_status', 'processing')->count();
        $data['complaint_completed'] = Complaint::where('complaint_status', 'solved')->count();
        $data['complainers'] = User::where('role_id', 3)->count();
        return view('home',$data);
    }

    public function complaints()
    {
        $data['complaints'] = Complaint::count();
        $data['complaint_pending'] = Complaint::where('complaint_status', 'pending')->count();
        $data['complaint_in_progress'] = Complaint::where('complaint_status', 'processing')->count();
        $data['complaint_completed'] = Complaint::where('complaint_status', 'solved')->count();
        $data['complaints_data'] = Complaint::all();
        return view('complaints',$data);
    }
    
    public function complaint_details($id)
    {
        $data['complaint'] = Complaint::find($id);
        return view('complaint_details', $data);
    }
    
    public function information()
    {
        return view('information');
    }
    
    public function complaint_details_print($id)
    {
        $data['complaint'] = Complaint::find($id);
        return view('complaint_details_print', $data);
    }

    public function change_password()
    {
        return view('user.change_password');
    }

    public function update_change_password(Request $request)
    {
        try {
            $request->validate([
                'new_password' => [
                    'required',
                    'string',
                    'min:8',
                    'confirmed',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/',
                ],
            ], [
                'new_password.regex' => 'Password must include at least one uppercase letter, one lowercase letter, one number, and one special character.',
            ]);
            
            $user = auth()->user();
            
            $user->password = Hash::make($request->new_password);
            $user->save();
            
            Toastr::success("Password changed successfully!");
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }
}
