<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];
    // fillable boş bıraktık tablodaki tüm sütunlara hükmetsin diye
    // protected $fillable = [];
    // 'name',
    // 'email',
    // 'password',

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    // users tablosundan kayıtları alarak id’ye göre azalan sırada sıralar ve
    // her sayfada 5 kayıt olacak şekilde sayfalar.
    static public function getRecord(Request $request)
    {
        $return = self::select('users.*')
            ->where('is_delete', '=', 0) // sadece 0 olanları listele //sil butonu 1'e çekiyor
            ->orderBy('id', 'asc');

        // ARAMA BAŞLANGIÇ

        if (!empty($request->input('genel'))) {
            $genel = $request->input('genel');
            $return = $return->where(function ($query) use ($genel) {
                if (is_numeric($genel)) {
                    $query->where('users.id', '=', $genel);
                } else {
                    $query->where('users.name', 'like', '%' . $genel . '%')
                        ->orWhere('users.username', 'like', '%' . $genel . '%')
                        ->orWhere('users.email', 'like', '%' . $genel . '%')
                        ->orWhere('users.phone', 'like', '%' . $genel . '%')
                        ->orWhere('users.website', 'like', '%' . $genel . '%')
                        ->orWhere('users.role', 'like', '%' . $genel . '%')
                        ->orWhere('users.status', 'like', '%' . $genel . '%');
                }
            });
        } elseif (empty($request->input('genel'))) {
            // Gelişmiş ARAMA BİTİŞ
            if (!empty($request->input('id'))) {
                $return = $return->where('users.id', '=', $request->input('id'));
            }

            if (!empty($request->input('name'))) {
                $return = $return->where('users.name', 'like', '%' . $request->input('name') . '%');
            }
            if (!empty($request->input('username'))) {
                $return = $return->where('users.username', 'like', '%' . $request->input('username') . '%');
            }
            if (!empty($request->input('email'))) {
                $return = $return->where('users.email', 'like', '%' . $request->input('email') . '%');
            }
            if (!empty($request->input('phone'))) {
                $return = $return->where('users.phone', 'like', '%' . $request->input('phone') . '%');
            }
            if (!empty($request->input('website'))) {
                $return = $return->where('users.website', 'like', '%' . $request->input('website') . '%');
            }
            if (!empty($request->input('role'))) {
                $return = $return->where('users.role', 'like', '%' . $request->input('role') . '%');
            }
            if (!empty($request->input('status'))) {
                $return = $return->where('users.status', 'like', '%' . $request->input('status') . '%');
            }

            // başlangıç tarihi - bitiş tarihi
            if (!empty($request->input('startdate')) && !empty($request->input('enddate'))) {
                $return = $return->where('users.created_at', '>=', $request->input('startdate'))
                    ->where('users.created_at', '<=', $request->input('enddate'));
            }
            // ARAMA BİTİŞ
        }


        $return = $return->paginate(10);
        return $return;
    }
}
