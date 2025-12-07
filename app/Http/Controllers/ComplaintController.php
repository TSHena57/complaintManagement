<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\ComplaintDetail;
use Brian2694\Toastr\Facades\Toastr;
use DataTables;

class ComplaintController extends Controller
{
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
            'is_viewed' => 0,
        ]);

        Toastr::success("Added Successfully.");
        return redirect()->back();
    }

    public function edit($id)
    {
        $complaint = Complaint::find($id);
        return view('complaints.edit', compact('complaint'));
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
        ]);

        Toastr::success("Updated Successfully.");
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        try {
            Complaint::findOrFail($request->id)->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
