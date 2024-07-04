

@component('mail::message')
Merhaba, {{ $save->name }}.

Üyeliğiniz için yeni bir parola oluşturabilmeniz için aşağıdaki bağlantıya tıklayınız:

@component('mail::button', ['url' => url('SetNewPassword/'.$save->remember_token)])
Parola Oluştur
@endcomponent

Teşekkürler,<br>
{{ config('app.name') }}
@endcomponent