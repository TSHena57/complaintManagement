<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\ComplaintDetail;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use DataTables;

class ComplaintController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Complaint::with(['user'])->latest();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('complaints.components.action', compact('row'));
                })
                ->editColumn('created_at', function ($row) {
                    return date('d M, Y h:i A', strtotime($row->created_at));
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('complaints.index');
    }

    public function my_index(Request $request)
    {
        if ($request->ajax()) {
            $data = Complaint::where('user_id', auth()->id())->latest();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('complaints.components.action', compact('row'));
                })
                ->editColumn('created_at', function ($row) {
                    return date('d M, Y h:i A', strtotime($row->created_at));
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('complaints.my_index');
    }

    public function create()
    {
        return view('complaints.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'address' => 'required',
            'description' => 'required',
        ]);

        $complaint = Complaint::create([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'address' => $validated['address'],
            'description' => $validated['description'],
            'complaint_status' => 'pending',
            'notify_admin' => true
        ]);

        Toastr::success("Added Successfully.");
        return redirect()->back();
    }

    public function edit($id)
    {
        $complaint = Complaint::find($id);
        if ($complaint->user_id == auth()->id()) {
           return view('complaints.edit', compact('complaint'));
        }
        abort(404);
    }

    public function show($id)
    {
        $complaint = Complaint::find($id);
        if (auth()->id() == $complaint->user_id) {
            if ($complaint->notify_user) {
                $complaint->update(['notify_user' => false]);
            }
        } else {
            if ($complaint->notify_admin) {
                $complaint->update(['notify_admin' => false]);
            }
        }
        return view('complaints.show', compact('complaint'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'address' => 'required',
            'description' => 'required',
        ]);
        $complaint = Complaint::find($id);
        $complaint->update([
            'title' => $validated['title'],
            'address' => $validated['address'],
            'description' => $validated['description'],
            'notify_admin' => true
        ]);

        Toastr::success("Updated Successfully.");
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        try {
            $complaint = Complaint::findOrFail($request->id);            
            if ($complaint->user_id == auth()->id()) {
                $complaint->complaint_details()->delete();
                $complaint->delete();
            }
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function reply(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'remarks' => 'required|string'
        ]);

        try {
            DB::beginTransaction();
            $complaint = Complaint::find($id);
            $reply = ComplaintDetail::create([
                                    'user_id'    => auth()->id(),
                                    'complaint_id'    => $id,
                                    'remarks'    => $request->remarks,
                                ]);
            if (auth()->id() == $complaint->user_id) {
                $complaint->update(['notify_admin' => true, 'status' => $request->status]);

            } else {
                $complaint->update(['notify_user' => true, 'status' => $request->status]);
            }
            DB::commit();
            Toastr::success('Reply Sent successfully!', 'Success');
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Failed to sent ticket reply!', 'Error');
            return back();
        }
    }
}
