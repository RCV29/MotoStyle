<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{
    public function index()
    {
        $communities = Community::all();
        return view('community', ['community' => $communities]);
    }

    public function show(Request $request)
    {
        $user = Auth::user();
        $communities = Community::where('user_id', $user->id)->get();
        return view('community.show', ['community' => $communities]);
    }

    public function create()
    {
        return view('community.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg,webp',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $user = Auth::user();
        $filename = null;

        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            $path = 'uploads/community/';
            $file->move($path, $filename);
        }

        $community = new Community([
            'image' => isset($filename) ? $path . $filename : null,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        $user->communities()->save($community);
        return redirect()->route('community')->with('success', 'Community created successfully!');
    }

    public function edit($id)
    {
        $community = Community::findOrFail($id);
        return view('community.edit', ['community' => $community]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $community = Community::findOrFail($id);
        $filename = null;

        // Update image if provided
        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            $path = 'uploads/community/';
            $file->move($path, $filename);
            $community->image = $path . $filename;
        }

        $community->name = $request->input('name');
        $community->description = $request->input('description');
        $community->save();

        return redirect()->route('community')->with('success', 'Community updated successfully!');
    }

    public function destroy($id)
    {
        $community = Community::findOrFail($id);
        // Optionally delete the image file from storage if necessary
        $community->delete();

        return redirect()->route('community')->with('success', 'Community deleted successfully!');
    }

    public function see($id)
    {
    $community = Community::findOrFail($id);
    return view('community.see', compact('community'));
    }
}
