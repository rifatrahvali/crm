<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return User::all();
        return User::select('*')->get();
    }

    // hangi sütunların çekileceği
    public function map($user):array{
        return[
            $user->id,
            $user->name,
            $user->username,
            $user->email,
            $user->phone,
            $user->address,
            $user->role,
            $user->status,
            $user->about,
            $user->github_info,
            $user->x_info,
            $user->linkedin_info,
            $user->website,
            $user->created_at,
        ];
    }

    // sütun başlıkları
    public function headings():array {
        return[
            '#',
            'İsim Soyisim',
            'Kullanıcı Adı',
            'Email',
            'Telefon',
            'Adres',
            'Yetkisi',
            'Durumu',
            'Hakkında',
            'Github',
            'X',
            'LinkedIn',
            'Website',
            'Kayıt Tarihi',
        ];
    }
}
