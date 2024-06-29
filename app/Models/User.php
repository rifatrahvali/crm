<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

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
    static public function getRecord()
    {

        
        $return = self::select('users.*')->orderBy('id', 'asc');
        $return = $return->paginate(10);
        return $return;
    }
}
