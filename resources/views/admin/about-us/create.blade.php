@extends('admin.layouts.main',[
                                'page_header'       => 'about',
                                'page_description'  => '  اضافة  ',
                                'link' => url('admin/about')
                                ])
@section('content')


    <!-- general form elements -->
    <div class="box box-primary">
        <!-- form start -->
        {!! Form::model($model,[
                                'action'=>'Admin\AboutUsController@store',
                                'id'=>'myForm',
                                'role'=>'form',
                                'method'=>'POST',
                                'files' => true
                                ])!!}

        <div class="box-body">

            @include('admin.about-us.form')

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>

        </div>
        {!! Form::close()!!}

    </div><!-- /.box -->

@endsection
