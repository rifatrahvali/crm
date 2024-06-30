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
        // BAR CHART KODU BAŞLANGIÇ
        // User modelinden verileri seçiyoruz ve her ay için kullanıcı sayısını ve ay bilgisini alıyoruz
        $user = User::selectRaw('count(id) as count, DATE_FORMAT(created_at,"%Y-%m") as month')
            ->groupBy('month') // Verileri ay bazında gruplandırıyoruz
            ->orderBy('month', 'asc') // Verileri ay sırasına göre artan şekilde sıralıyoruz
            ->get(); // Sorguyu çalıştırıyoruz ve sonuçları alıyoruz
        // Aylara göre verileri alıp $data['months'] değişkenine atıyoruz
        $data['months'] = $user->pluck('month');
        // Kullanıcı sayılarını alıp $data['counts'] değişkenine atıyoruz
        $data['counts'] = $user->pluck('count');
        // BAR CHART KODU BİTİŞ        

        return view('admin.index', $data);
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

    public function AdminUsers(Request $request)
    {
        // getRecord ' kodunu user.php modeline kendimiz yazdık.
        // kod fazlalığı olmasın
        $data['getRecord'] = User::getRecord();
        return view('admin.users.list', $data);
    }
    public function AdminUserView($id)
    {

        $data['getRecord'] = User::find($id);
        return view('admin.users.view', $data);
    }
}
