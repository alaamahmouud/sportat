@extends('admin.layouts.main',[
								'page_header'		=> 'المدن',
								'page_description'	=> 'عرض ',
								'link' => url('admin/cities')
								])
@section('content')

    <div class="ibox box-primary">
        <div class="ibox-title">
            <div class="pull-right">

{{--                @can('اضافة مدينة')--}}
                <a href="{{url('admin/cities/create')}}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> إضافة جديد
                </a>
{{--                @endcan--}}
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="row">
            {!! Form::open([
                'method' => 'GET'
            ]) !!}
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">&nbsp;</label>
                    {!! Form::text('name',old('name'),[
                        'class' => 'form-control',
                        'placeholder' => 'الاسم'
                    ]) !!}
                </div>
            </div>
            @inject('governorate',App\Models\Governorate)
            <div class="col-md-2">
                <div class="form-group">
                    <label for="">&nbsp;</label>
                    {!! Form::select('governorate',$governorate->pluck('name','id')->toArray(),old('governorate'),[
                        'class' => 'form-control',
                        'placeholder' => 'المحافظات'
                    ]) !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">&nbsp;</label>
                    <button class="btn btn-primary btn-block" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>

        <div class="ibox-content">
            @if(!empty($records) && count($records)>0)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>المحافظه</th>

{{--                        @can('تفعيل مدينة')--}}
{{--                        <th class="text-center">هل تم التفعيل ؟</th>--}}
{{--                        @endcan--}}
{{--                        @can('تعديل مدينة')--}}
                        <th class="text-center">تعديل</th>
{{--                        @endcan--}}
{{--                        @can('حذف مدينة')--}}
                        <th class="text-center">حذف</th>
{{--                        @endcan--}}
                        </thead>
                        <tbody>
                        @php $count = 1; @endphp
                        @foreach($records as $record)
                            <tr id="removable{{$record->id}}">
                                <td>{{($records->perPage() * ($records->currentPage() - 1)) + $loop->iteration}}</td>
                                <td>{{optional($record)->name}}</td>
                                <td>{{optional($record->governorate)->name}}</td>
{{--                                @can('تفعيل مدينة')--}}
{{--                                <td class="text-center">--}}
{{--                                    {!! \App\MyHelper\Helper::toggleBooleanView($record , url('admin/city/toggle-boolean/'.$record->id.'/is_active'),'is_active') !!}--}}
{{--                                </td>--}}
{{--                                @endcan--}}
{{--                                @can('تعديل مدينة')--}}
                                <td class="text-center"><a href="{{url('admin/cities/' . $record->id .'/edit')}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a></td>
{{--                                @endcan--}}
{{--                                @can('حذف مدينة')--}}
                                <td class="text-center">
                                    <button
                                            id="{{$record->id}}"
                                            data-token="{{ csrf_token() }}"
                                            data-route="{{url('admin/cities/'.$record->id)}}"
                                            type="button"
                                            class="destroy btn btn-danger btn-xs">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </td>
{{--                                @endcan--}}
                            </tr>
                            @php $count ++; @endphp
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {!! $records->render() !!}
            @else
                <div>
                    <h3 class="text-info" style="text-align: center"> لا توجد بيانات للعرض </h3>
                </div>
            @endif


        </div>
    </div>
@stop

@section('script')
    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'showImageNumberLabel':false,

        })
    </script>
@stop
