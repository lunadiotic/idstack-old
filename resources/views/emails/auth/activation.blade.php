@component('mail::message')
# Aktifkan Akun Anda

Terima kasih telah bergabung {{ $user->name }}, agar akun dapat Anda gunakan, mohon aktivasi akun Anda dengan mengklik tombol di bawah ini.

@component('mail::button', ['url' => route('auth.activate', [
                                    'token' => $user->activation_token,
                                    'email' => $user->email
                                ])
                            ]
            )
    Activate
@endcomponent

Salam Kami,<br>
{{ config('app.name') }}
@endcomponent
