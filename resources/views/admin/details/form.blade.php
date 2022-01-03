@inject('detail',App\Models\Service)
@php
    $details = $detail->pluck('name','id')->toArray();
@endphp
{!! \App\MyHelper\Field::select('service_id','الخدمه',$details) !!}
{!! \App\MyHelper\Field::text('name' , 'الاسم ' ) !!}


{!! \App\MyHelper\Field::fileWithPreview('attachments',__('مرفقات')) !!}




