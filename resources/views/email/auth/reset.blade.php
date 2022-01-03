@component('mail::message')
# Introduction

{{ config('app.name') }}   Reset Password .

Rest password code . {{$code}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
