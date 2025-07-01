@component('mail::message')
# Hello {{ $user->name }},

Your One-Time Password (OTP) is:

# {{ $otp }}

Please use this to complete your login.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
