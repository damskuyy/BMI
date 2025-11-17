<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberBEController extends Controller
{
    public function index()
    {
        $member = Member::all();
        $members = Member::latest()->paginate(10);
        return view('member_be.index', compact('members'));
    }

    public function create()
    {
        return view('member_be.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'sector' => 'required|in:MFG,KUL,KRJ',
            'business' => 'required|string|max:255',
            'product' => 'required|string|max:255',
            'domicile' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $fotoPath = $request->file('foto') ? $request->file('foto')->store('members', 'public') : null;
        
        Member::create(array_merge(
            $request->only(['name', 'position', 'sector', 'business', 'product', 'domicile', 'phone']),
            ['foto' => $fotoPath]
        ));
        return redirect()->route('member_be.index')->with('success', 'Member created successfully.');
    }

    public function edit(Member $member)
    {
        return view('member_be.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'sector' => 'required|in:MFG,KUL,KRJ',
            'business' => 'required|string|max:255',
            'product' => 'required|string|max:255',
            'domicile' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        // Handle foto update
        if ($request->hasFile('foto')) {
            if ($member->foto && file_exists(storage_path('app/public/'.$member->foto))) {
                unlink(storage_path('app/public/'.$member->foto));
            }
            $member->foto = $request->file('foto')->store('member', 'public');
        }

        $member->update($request->only(['name', 'position', 'sector', 'business', 'product', 'domicile', 'phone']));
        $member->save();

        return redirect()->route('member_be.index')->with('success', 'Member updated successfully.');
    }

    public function destroy(Member $member)
    {
        // Delete foto file if exists
        if ($member->foto && file_exists(storage_path('app/public/'.$member->foto))) {
            unlink(storage_path('app/public/'.$member->foto));
        }
        $member->delete();
        return redirect()->route('member_be.index')->with('success', 'Member deleted successfully.');
    }
}
