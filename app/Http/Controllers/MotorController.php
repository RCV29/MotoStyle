<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motor;
use Illuminate\Support\Facades\Auth;

class MotorController extends Controller
{
    public function index(){
        $motors = Motor::all();
        return view('motor', ['motor' => $motors]);
    }

    public function create(){
        return view('motorcreate');
    }

    public function store(Request $request){

        $user = Auth::user();

        $motor = new Motor([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        $user->motor()->save($motor);
        
    }
}
