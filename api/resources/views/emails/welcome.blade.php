@component('mail::message')
# Potwierdzenie rejestracji konta.

Kliknij w poniższy link, aby aktywować swoje konto.

@component('mail::button', ['url' => ''])
Potwierdź
@endcomponent

Dziękujemy zespół,<br>
{{ config('app.name') }}
@endcomponent
