@component('mail::message')
# Introduction

Bienvenidos a SensorApp!!!!
Te Notificamos que registraste correctamente a tu Proveedor!!! 

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
