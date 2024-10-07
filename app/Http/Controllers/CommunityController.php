<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Community;
use App\Models\CommunityComment;
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
        $community->delete();

        return redirect()->route('community')->with('success', 'Community deleted successfully!');
    }

    public function see($id)
    {
        $community = Community::findOrFail($id);
        $comments = $community->comments()->with('user')->get(); 

        return view('community.see', compact('community', 'comments'));
    }

    public function comment($id, Request $request)
    {
        $community = Community::findOrFail($id);

        $request->validate(['comment' => 'required|string|max:255']);

        $communityComment = new CommunityComment();
        $communityComment->user_id = auth()->id(); 
        $communityComment->community_id = $community->id;
        $communityComment->comment = htmlspecialchars($request->input('comment'));
        $communityComment->save();

        return redirect()->route('community.see', $community->id)->with('success', 'Comment submitted successfully!');
    }
}
