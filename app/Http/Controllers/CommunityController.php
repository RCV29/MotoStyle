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

    public function edit(Request $request)
    {
        $user = Auth::user();  
        $communities = Community::where('user_id', $user->id)->get(); 
        return view('community', ['community' => $communities]); 
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

        if($request->has('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/community/';
            $file->move($path, $filename);
        }

        $user = Auth::user();

        $community = new Community([ 
            'image' => $path.$filename,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        $user->communities()->save($community); 
        return redirect()->route('community')->with('success', 'Community created successfully!');
    }
}
