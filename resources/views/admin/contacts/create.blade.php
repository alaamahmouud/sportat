@extends('admin.layouts.main',[
                                'page_header'       => 'تواسل معنا',
                                'page_description'  => 'تواسل معنا ',
                                'link' => url('admin/contacts')
                                ])
@section('content')

    <!-- general form elements -->
    <div class="box box-primary">
        <!-- form start -->
        {!! Form::model($model,[
                                'action'=>'Admin\ContactController@store',
                                'id'=>'myForm',
                                'role'=>'form',
                                'method'=>'POST',
                                'files' => true
                                ])!!}

        <div class="box-body">

            @include('admin.contacts.form')

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>

        </div>
        {!! Form::close()!!}

    </div><!-- /.box -->

@endsection
