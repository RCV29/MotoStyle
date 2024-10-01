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

    public function create()
    {
        return view('communitycreate'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $user = Auth::user();

        $community = new Community([ 
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        $user->communities()->save($community); 
        return redirect()->route('community')->with('success', 'Community created successfully!');
    }
}
