@extends('admin.layouts.main',[
                                'page_header'       => 'الإشعارات',
                                'page_description'  => "  إرسال إشعار ",
                                 'link' => url('admin/notifications/')
                                ])

@section('content')

    <div class="box">
        <!-- form start -->
        {!! Form::open([
                                'action'=>'Admin\NotificationController@store',
                                'id'=>'myForm',
                                'role'=>'form',
                                'files'=>true,
                                'method'=>'POST'
                                ])!!}
        <div class="box-body">

            @include('flash::message')




            {!! \App\MyHelper\Field::text('title','عنوان الإشعار') !!}
            {!! \App\MyHelper\Field::textarea('body','تفاصيل الإشعار') !!}
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">إرسال</button>
        </div>
        {!! Form::close()!!}
    </div>
@stop






