<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{

    public function AdminDashboard(Request $request)
    {
        return view('admin.index');
    }
    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function AdminLogin(Request $request)
    {
        return view('admin.AdminLogin');
    }
    public function AdminProfile(Request $request)
    {
        $data['getRecord'] = User::find(Auth::user()->id);
        return view('admin.AdminProfile', $data);
    }
    public function AdminProfileUpdate(Request $request)
    {
        
        $user = $request->validate([
            'email' => 'required|unique:users,email,' . Auth::user()->id,
            'username' => 'required|unique:users,username,' . Auth::user()->id,
        ]);
    

        $user = User::find(Auth::user()->id);

        $user->name = trim($request->name);
        $user->username = trim($request->username);
        $user->email = trim($request->email);

        if (!empty($request->password)) {
            $user->password = Hash::make(trim($request->password));
        }
        if (!empty($request->file('photo'))) {
            $file = $request->file('photo');
            $randomPhotoName = Str::random(30);
            $filename = $randomPhotoName . '.' . $file->getClientOriginalExtension();
            $file->move('upload/', $filename);
            $user->photo = $filename;
            
        }
        $user->phone = trim($request->phone);
        $user->address = trim($request->address);
        $user->about = trim($request->about);
        $user->github_info = trim($request->github_info);
        $user->x_info = trim($request->x_info);
        $user->linkedin_info = trim($request->linkedin_info);
        $user->website = trim($request->website);
        $user->save();
        // return redirect('admin/profile')->with('success', 'Profil bilgileri güncellendi.');
        return redirect()->back()->with('success', 'Profil bilgileri güncellendi.');
    }
}
