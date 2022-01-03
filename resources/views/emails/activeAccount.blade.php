@component('mail::message')
# Introduction

Dear {{$record->full_name}}  Welcome to {{config('app.name')}}

        Activation Code {{$code}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
