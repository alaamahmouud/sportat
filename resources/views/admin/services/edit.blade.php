
@extends('admin.layouts.main',[
                                'page_header'       => 'الخدمات',
                                'page_description'  => ' edit   ',
                                'link' => url('admin/services')
                                ])
@section('content')
        <!-- general form elements -->
<div class="box box-primary">
    <!-- form start -->
    {!! Form::model($model,[
                            'url'=>url('admin/services/'.$model->id),
                            'id'=>'myForm',
                            'role'=>'form',
                            'method'=>'PUT',
                            'files' => true
                            ])!!}

    <div class="box-body">
        <div class="clearfix"></div>
        <br>
        @include('admin.services.form')

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">حفظ</button>
        </div>

    </div>
    {!! Form::close()!!}

</div><!-- /.box -->

@endsection
