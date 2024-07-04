<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\ResetPassword;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisteredMail;

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

        $data['TotalEmail'] = User::where('email')->where('is_delete', '=', 0)->count();
        $data['TotalAdmin'] = User::where('role', '=', 'admin')->where('is_delete', '=', 0)->count();
        $data['TotalAgent'] = User::where('role', '=', 'agent')->where('is_delete', '=', 0)->count();
        $data['TotalUser'] = User::where('role', '=', 'user')->where('is_delete', '=', 0)->count();
        $data['TotalActive'] = User::where('status', '=', 'active')->where('is_delete', '=', 0)->count();
        $data['TotalUserActive'] = User::where('status', '=', 'active')->where('role','=','user')->where('is_delete', '=', 0)->count();
        $data['TotalInactive'] = User::where('status', '=', 'inactive')->where('is_delete', '=', 0)->count();

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
        $data['getRecord'] = User::getRecord($request);

        // COUNT 
        $data['TotalEmail'] = User::where('email')->where('is_delete', '=', 0)->count();
        $data['TotalAdmin'] = User::where('role', '=', 'admin')->where('is_delete', '=', 0)->count();
        $data['TotalAgent'] = User::where('role', '=', 'agent')->where('is_delete', '=', 0)->count();
        $data['TotalUser'] = User::where('role', '=', 'user')->where('is_delete', '=', 0)->count();
        $data['TotalActive'] = User::where('status', '=', 'active')->where('is_delete', '=', 0)->count();
        $data['TotalUserActive'] = User::where('status', '=', 'active')->where('role','=','user')->where('is_delete', '=', 0)->count();
        $data['TotalInactive'] = User::where('status', '=', 'inactive')->where('is_delete', '=', 0)->count();
        return view('admin.users.list', $data);
    }
    public function AdminUserView($id)
    {

        $data['getRecord'] = User::find($id);
        return view('admin.users.view', $data);
    }

    public function UserAdd()
    {
        return view('admin.users.add');
    }


    public function UserAddStore(Request $request)
    {
        // dd($request->all());

        // Email benzersiz olmalıdır
        $save = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
        ]);
        $save = new User;
        $save->name = trim($request->name);
        $save->username = trim($request->username);
        $save->email = trim($request->email);
        $save->photo = trim($request->photo);
        $save->phone = trim($request->phone);
        $save->role = trim($request->role);
        $save->status = trim($request->status);
        $save->about = trim($request->about);
        $save->github_info = trim($request->github_info);
        $save->x_info = trim($request->x_info);
        $save->linkedin_info = trim($request->linkedin_info);
        $save->website = trim($request->website);
        $save->password = bcrypt('defaultpassword');
        $save->remember_token = Str::random(50);
        $save->save();


        Mail::to($save->email)->send(new RegisteredMail($save));
        return redirect('admin/users/list')->with('success', 'Kullanıcı kayıt edildi.');
    }

    public function SetNewPassword($token)
    {
        $data['token'] = $token;
        return view('auth.ResetPassword', $data);
    }
    public function AdminUsersDeleteUser($id, Request $request)
    {
        $softDelete = User::find($id);
        $softDelete->is_delete = 1;
        $softDelete->save();
        return redirect('admin/users/list')->with('success', 'Kullanıcı silindi.');
    }
    public function SetNewPasswordPost($token, ResetPassword $request)
    {

        $user = User::where('remember_token', '=', $token);

        if ($user->count() == 0) {
            abort(403);
        }
        $user = $user->first();

        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(50);

        $user->save();
        return redirect('admin/login')->with('success', 'Parola başarıyla değiştirildi.');
    }

    public function AdminUsersEdit($id)
    {
        $data['getRecord'] = User::find($id);
        return view('admin.users.edit', $data);
    }
    public function AdminUsersEditPOST($id, Request $request)
    {
        // Kullanıcı doğrulama ve doğrulama kuralları
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', // Ad alanı zorunlu, string türünde ve maksimum 255 karakter olmalıdır.
            'username' => 'required|string|max:255|unique:users,username,' . $id, // Kullanıcı adı zorunlu, string türünde, maksimum 255 karakter ve benzersiz olmalıdır (kullanıcı ID'si hariç).
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Fotoğraf alanı isteğe bağlı, resim formatında ve maksimum 2048 KB boyutunda olabilir.
            'phone' => 'required|string|max:255', // Telefon alanı zorunlu, string türünde ve maksimum 255 karakter olmalıdır.
            'address' => 'nullable|string|max:255', // Adres alanı isteğe bağlı, string türünde ve maksimum 255 karakter olabilir.
            'about' => 'nullable|string', // Hakkında alanı isteğe bağlı ve string türünde olabilir.
            'github_info' => 'nullable|url', // GitHub bilgisi alanı isteğe bağlı ve URL formatında olabilir.
            'x_info' => 'nullable|url', // X (Twitter) bilgisi alanı isteğe bağlı ve URL formatında olabilir.
            'linkedin_info' => 'nullable|url', // LinkedIn bilgisi alanı isteğe bağlı ve URL formatında olabilir.
            'website' => 'nullable|url', // Web sitesi alanı isteğe bağlı ve URL formatında olabilir.
            'role' => 'required|string|in:admin,agent,user', // Rol alanı zorunlu, string türünde ve 'admin', 'agent' veya 'user' değerlerinden biri olmalıdır.
            'status' => 'required|string|in:active,inactive', // Durum alanı zorunlu, string türünde ve 'active' veya 'inactive' değerlerinden biri olmalıdır.
        ]);

        // Kullanıcıyı bul
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'Kullanıcı bulunamadı.'); // Eğer kullanıcı bulunamazsa hata mesajıyla birlikte geri döner.
        }

        // Kullanıcı bilgilerini güncelle
        $user->name = trim($request->name); // Kullanıcının adını günceller.
        $user->username = trim($request->username); // Kullanıcı adını günceller.

        // Fotoğraf güncelleme işlemi
        if ($request->hasFile('photo')) { // Eğer yeni bir fotoğraf yüklenmişse:
            $file = $request->file('photo'); // Dosyayı alır.
            $randomPhotoName = Str::random(30); // Rastgele bir dosya adı oluşturur.
            $filename = $randomPhotoName . '.' . $file->getClientOriginalExtension(); // Yeni dosya adını belirler.
            $filePath = public_path('upload/'); // Dosyanın kaydedileceği yol.

            try {
                $file->move($filePath, $filename); // Dosyayı belirtilen yere kaydeder.
                $user->photo = $filename; // Kullanıcının fotoğraf alanını günceller.
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Fotoğraf yükleme sırasında bir hata oluştu: ' . $e->getMessage()); // Hata oluşursa hata mesajıyla birlikte geri döner.
            }
        }

        $user->phone = trim($request->phone); // Kullanıcının telefonunu günceller.
        $user->address = trim($request->address); // Kullanıcının adresini günceller.
        $user->about = trim($request->about); // Kullanıcının hakkında bilgisini günceller.
        $user->github_info = trim($request->github_info); // Kullanıcının GitHub bilgisini günceller.
        $user->x_info = trim($request->x_info); // Kullanıcının X (Twitter) bilgisini günceller.
        $user->linkedin_info = trim($request->linkedin_info); // Kullanıcının LinkedIn bilgisini günceller.
        $user->website = trim($request->website); // Kullanıcının web sitesi bilgisini günceller.
        $user->role = trim($request->role); // Kullanıcının rolünü günceller.
        $user->status = trim($request->status); // Kullanıcının durumunu günceller.
        $user->save(); // Tüm güncellemeleri veritabanına kaydeder.

        return redirect()->back()->with('success', 'Profil bilgileri güncellendi.'); // Başarı mesajıyla birlikte kullanıcıyı eski sayfaya yönlendirir.
    }


}

