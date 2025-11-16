<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;
use App\Models\User;
use DataTables;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:User-list', ['only' => ['index']]);
        $this->middleware('permission:User-create', ['only' => ['store']]);
        $this->middleware('permission:User-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:User-show', ['only' => ['index']]);
        $this->middleware('permission:User-delete', ['only' => ['destroy']]);
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $data['roles'] = Role::where('status',1)->where('id','>',1)->get(['id','name']);
        if ($request->ajax()) {
            $data = User::with(['country:id,name','city:id,name'])->where('id','!=',1);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('user.components.action', compact('row'));
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('user.index', $data);
        
    }

    public function list_for_select_ajax(Request $request)
    {
        $items = User::query();
        if ($request->search != '') {
            $items = $items->whereLike(['name','email'], $request->search);
        }
        $items = $items->paginate(10,['id','name','email']);
        $response = [];
        foreach($items as $item){
            $response[]  =[
                'id'    => $item->id,
                'text'  => $item->name
            ];
        }
        $data['results'] =  $response;
        if ($items->count() > 0)
        {
            $data['pagination'] =  ["more" => true];
        }
        return response()->json($data);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'mobile' => 'required|string|max:15|unique:users,mobile',
                'email' => 'required|email|unique:users,email',
                'nid' => 'nullable|string|unique:users,nid',
                'passport' => 'nullable|string|unique:users,passport',
                'address' => 'nullable|string|max:500',
                'gender' => ['nullable', Rule::in(['Male', 'Female', 'Others','0'])],
                'blood_group' => ['nullable', Rule::in(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-','0'])],
                'religion' => 'nullable|string',
                'country_id' => 'nullable|integer',
                'city_id' => 'nullable|integer',
                'service' => ['nullable', Rule::in(['Army', 'Navy', 'Air'])],
                'rank_id' => 'nullable|integer',
                'appointment_classification_id' => 'nullable|integer',
                'date_of_commission' => 'nullable|date',
                'date_of_join_in_dscsc' => 'nullable|date',
                // 'country_id' => 'nullable|integer|exists:countries,id',
                // 'city_id' => 'nullable|integer|exists:cities,id',
                // 'date_of_join_in_dscsc' => 'nullable|date|after_or_equal:date_of_commission',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'password' => 'nullable|string|min:6',
                'signature' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'user_type' => ['nullable', Rule::in(['Parmanent', 'Non-Parmanent'])],
                'role_id' => 'nullable|integer|exists:roles,id',
            ]);

            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('users/photos', 'public');
            } else {
                $photoPath = null;
            }

            // Handle signature upload
            if ($request->hasFile('signature')) {
                $signaturePath = $request->file('signature')->store('users/signatures', 'public');
            } else {
                $signaturePath = null;
            }

            DB::beginTransaction();
            // Create user
            $user = User::create([
                'name' => $validated['name'],
                'mobile' => $validated['mobile'],
                'email' => $validated['email'],
                'nid' => $validated['nid'],
                'passport' => $validated['passport'],
                'address' => $validated['address'],
                'gender' => $validated['gender'],
                'blood_group' => $validated['blood_group'],
                'religion' => $validated['religion'],
                'country_id' => $validated['country_id'],
                'city_id' => $validated['city_id'],
                'service' => $validated['service'],
                'rank_id' => $validated['rank_id'],
                'appointment_classification_id' => $validated['appointment_classification_id'],
                'date_of_commission' => $validated['date_of_commission'],
                'date_of_join_in_dscsc' => $validated['date_of_join_in_dscsc'],
                'photo' => $photoPath,
                'password' => Hash::make($validated['password']),
                'signature' => $signaturePath,
                'user_type' => $validated['user_type'],
                'role_id' => $validated['role_id'],
            ]);
            $role = Role::find($validated['role_id']);
            $user->syncRoles([$role->name]);
            DB::commit();
            Toastr::success("Added Successfully.");
            return redirect()->route('user.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $data['user'] = User::findOrFail($id);
        $data['roles'] = Role::where('status',1)->where('id','>',1)->get(['id','name']);
        return view('user.edit', $data);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $user = User::findOrFail($id);
            $prev_role = $user->role_id;
            $new_role = $request->role_id;
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'mobile' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'nid' => 'nullable|string|max:50',
                'passport' => 'nullable|string|max:50',
                'address' => 'nullable|string|max:255',
                'gender' => 'nullable|string',
                'blood_group' => 'nullable|string',
                'religion' => 'nullable|string',
                'country_id' => 'nullable|integer',
                'city_id' => 'nullable|integer',
                'service' => 'nullable|string',
                'rank_id' => 'nullable|integer',
                'appointment_classification_id' => 'nullable|integer',
                'date_of_commission' => 'nullable|date',
                'date_of_join_in_dscsc' => 'nullable|date',
                'user_type' => 'nullable|string',
                'role_id' => 'nullable|integer',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'signature' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'password' => 'nullable|string|min:6',
            ]);
            $user->fill(collect($validatedData)->except(['password', 'photo', 'signature'])->toArray());
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            if ($request->hasFile('photo')) {
                if ($user->photo && file_exists(public_path('uploads/users/' . $user->photo))) {
                    unlink(public_path('uploads/users/' . $user->photo));
                }

                $photoName = time() . '_photo.' . $request->photo->extension();
                $request->photo->move(public_path('uploads/users'), $photoName);
                $user->photo = $photoName;
            }

            if ($request->hasFile('signature')) {
                if ($user->signature && file_exists(public_path('uploads/users/' . $user->signature))) {
                    unlink(public_path('uploads/users/' . $user->signature));
                }

                $signatureName = time() . '_signature.' . $request->signature->extension();
                $request->signature->move(public_path('uploads/users'), $signatureName);
                $user->signature = $signatureName;
            }
            $user->save();
            if ($prev_role != $new_role) {
                $role = Role::find($validatedData['role_id']);
                $user->syncRoles([$role->name]);
            }
            DB::commit();

            Toastr::success("Updated Successfully.");
            return redirect()->route('user.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        try {
            User::findOrFail($request->id)->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function list_for_select_ajax_based_on_classification(Request $request)
    {
        $items = User::query();
        if ($request->search != '') {
            $items = $items->whereLike(['name','email'], $request->search);
        }
        $items = $items->whereHas('appointment_classification', function($q) use ($request){
                            $q->where('name', $request->appointment_classification);
                        })
                        ->with(['appointment_classification'])
                        ->when($request->service, function ($query, $service) {
                            return $query->where('service', $service);
                        })
                        ->paginate(10,['id','name','email','service','appointment_classification_id']);
        $response = [];
        foreach($items as $item){
            $response[]  =[
                'id'    => $item->id,
                'text'  => $item->appointment_classification->name.' : '.$item->name
            ];
        }
        $data['results'] =  $response;
        if ($items->count() > 0)
        {
            $data['pagination'] =  ["more" => true];
        }
        return response()->json($data);
    }
}
