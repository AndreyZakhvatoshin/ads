@component('mail::message')
# Подтверждение электронной почты

Пройдите по адресу для подтверждения

@component('mail::button', ['url' => $url])
Подтвердить email
@endcomponent

Cпасибо,<br>
{{ config('app.name') }}
@endcomponent
