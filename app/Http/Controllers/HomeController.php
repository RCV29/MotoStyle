<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Motor;
use App\Models\Community;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function admin_dashboard()
    {
        $userCount = User::count(); 
        $motorCount = Motor::count(); 
        $communityCount = Community::count(); 

        return view('admin.dashboard', compact('userCount', 'motorCount', 'communityCount'));
    }

    public function dashboard()
    {
        $motorCount = Motor::count(); 
        $communityCount = Community::count(); 

        return view('dashboard', compact('motorCount', 'communityCount'));
    }

    public function user_index()
    {
        $users = User::all();
        return view('admin.user', compact('users'));
    }

    public function user_edit(User $user)
    {
        return view('admin.useredit', compact('user'));
    }

    public function user_update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:255|unique:users,name,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('admin.user')->with('success', 'User updated successfully.');
    }

    public function user_destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user')->with('success', 'User deleted successfully.');
    }

    public function motor_index()
    {
        $motors = Motor::all();
        return view('admin.motor', compact('motors'));
    }

    public function motor_edit($id)
    {
        $motor = Motor::findOrFail($id);
        return view('admin.motoredit', ['motor' => $motor]);
    }

    public function motor_update(Request $request, $id)
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

        return redirect()->route('admin.motor')->with('success', 'Motor updated successfully!');
    }

    public function motor_destroy(Motor $motor)
    {
        $motor->delete();
        return redirect()->route('admin.motor')->with('success', 'Motor deleted successfully.');
    }

    public function community_index()
    {
        $communities = Community::all();
        return view('admin.community', compact('communities'));
    }

    public function community_edit($id)
    {
        $community = Community::findOrFail($id);
        return view('admin.communityedit', ['community' => $community]);
    }

    public function community_update(Request $request, $id)
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

        return redirect()->route('admin.community')->with('success', 'Community updated successfully!');
    }

    public function community_destroy(Community $community)
    {
        $community->delete();
        return redirect()->route('admin.community')->with('success', 'Community deleted successfully.');
    }

    public function extract_motor()
    {
        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the header row for motors
        $sheet->setCellValue('A1', 'Motor ID');
        $sheet->setCellValue('B1', 'Motor Name');
        $sheet->setCellValue('C1', 'Motor Description');
        $sheet->setCellValue('D1', 'Motor Image');

        // Fetch data from the Motor model
        $motors = Motor::all();
        $row = 2; // Start from the second row for motors
        foreach ($motors as $motor) {
            $sheet->setCellValue('A' . $row, $motor->id);
            $sheet->setCellValue('B' . $row, $motor->name);
            $sheet->setCellValue('C' . $row, $motor->description);
            $sheet->setCellValue('D' . $row, $motor->image);
            $row++;
        }

        // Create a writer and save the file
        $writer = new Xlsx($spreadsheet);

        // Set the filename
        $fileName = 'motors_data.xlsx';

        // Set headers to prompt download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');

        // Write the file to the output
        $writer->save('php://output');
        exit;
    }

    public function extract_community()
    {
        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the header row for communities
        $sheet->setCellValue('A1', 'Community ID');
        $sheet->setCellValue('B1', 'Community Name');
        $sheet->setCellValue('C1', 'Community Description');
        $sheet->setCellValue('D1', 'Community Image');

        // Fetch data from the Community model
        $communities = Community::all();
        $row = 2; // Start from the second row for communities
        foreach ($communities as $community) {
            $sheet->setCellValue('A' . $row, $community->id);
            $sheet->setCellValue('B' . $row, $community->name);
            $sheet->setCellValue('C' . $row, $community->description);
            $sheet->setCellValue('D' . $row, $community->image);
            $row++;
        }

        // Create a writer and save the file
        $writer = new Xlsx($spreadsheet);

        // Set the filename
        $fileName = 'communities_data.xlsx';

        // Set headers to prompt download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');

        // Write the file to the output
        $writer->save('php://output');
        exit;
    }
}
