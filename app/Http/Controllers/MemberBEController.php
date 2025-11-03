<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberBEController extends Controller
{
    public function index()
    {
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
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'sector' => 'required|string|max:255',
            'business' => 'required|string|max:255',
            'product' => 'required|string|max:255',
            'domicile' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        Member::create($request->only(['name', 'position', 'sector', 'business', 'product', 'domicile', 'phone']));
        return redirect()->route('members.index')->with('success', 'Member created successfully.');
    }

    public function edit(Member $member)
    {
        return view('member_be.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'sector' => 'required|string|max:255',
            'business' => 'required|string|max:255',
            'product' => 'required|string|max:255',
            'domicile' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $member->update($request->only(['name', 'position', 'sector', 'business', 'product', 'domicile', 'phone']));
        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
    }
}
