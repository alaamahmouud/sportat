
@inject('governorate',App\Models\Governorate)
@php
    $governorates = $governorate->pluck('name','id')->toArray();
@endphp
{!! \App\MyHelper\Field::text('name' , 'الاسم ' ) !!}
{!! \App\MyHelper\Field::select('governorate_id','المحافظه',$governorates) !!}




