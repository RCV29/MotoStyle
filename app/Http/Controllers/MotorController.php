<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Motor;
use App\Models\MotorComment;
use Illuminate\Support\Facades\Auth;

class MotorController extends Controller
{
    public function index()
    {
        $motors = Motor::all();
        return view('motor', ['motor' => $motors]);
    }

    public function show(Request $request)
    {
        $user = Auth::user(); 
        $motors = Motor::where('user_id', $user->id)->get(); 
        return view('motor.show', ['motor' => $motors]);
    }

    public function create()
    {
        return view('motor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg,webp',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $user = Auth::user();

        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            $path = 'uploads/motors/';
            $file->move($path, $filename);
        }

        $motor = new Motor([
            'image' => isset($filename) ? $path . $filename : null,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        $user->motor()->save($motor);

        return redirect()->route('motor')->with('success', 'Motor created successfully!');
    }

    public function edit($id)
    {
        $motor = Motor::findOrFail($id);
        return view('motor.edit', ['motor' => $motor]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $motor = Motor::findOrFail($id);
        
        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            $path = 'uploads/motors/';
            $file->move($path, $filename);
            $motor->image = $path . $filename;
        }

        $motor->name = $request->input('name');
        $motor->description = $request->input('description');

        $motor->save();

        return redirect()->route('motor')->with('success', 'Motor updated successfully!');
    }

    public function destroy($id)
    {
        $motor = Motor::findOrFail($id);
        $motor->delete();

        return redirect()->route('motor')->with('success', 'Motor deleted successfully!');
    }

    public function see($id)
    {
        $motor = Motor::findOrFail($id);
        $comments = $motor->comments()->with('user')->get(); 

        return view('motor.see', compact('motor', 'comments'));
    }

    public function comment($id, Request $request)
    {
        $motor = Motor::findOrFail($id);

        $request->validate(['comment' => 'required|string|max:255']);

        $motorComment = new MotorComment();
        $motorComment->user_id = auth()->id();
        $motorComment->motor_id = $motor->id;
        $motorComment->comment = htmlspecialchars($request->input('comment'));
        $motorComment->save();

        return redirect()->route('motor.see', $motor->id)->with('success', 'Comment submitted successfully!');
    }
}