@extends('admin.layouts.main',[
								'page_header'		=> 'العملاء',
								'page_description'	=> 'عرض ',
								'link' => url('admin/clients')
								])
@section('content')
    <div class="ibox ibox-primary">

        <div class="ibox-title">
            <div class="pull-right">


            </div>


            <div class="clearfix"></div>
        </div>
        <div class="ibox-title">





            <div class="clearfix"></div>
        </div>
        <div class="ibox-content">
            @include('flash::message')
            @if(count($records))
                <div class="table-responsive">
                    <table class="data-table table table-bordered">
                        <thead>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>البريد الالكتروني</th>
                        <th>رقم الهاتف</th>
                        <th>الكود</th>
                        <th>الشهاده</th>
                        </thead>
                        <tbody>

                        @foreach($records as $record)
                            <tr id="removable{{$record->id}}">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$record->full_name}}</td>
                                <td>{{$record->email}}</td>
                                <td>{{$record->phone}}</td>
                                <td>{{$record->code}}</td>
                                <td>{{$record->certificate}}</td>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="text-center">
                    {!! $records->appends(request()->all())->render() !!}
                </div>
            @else
                <div>
                    <h3 class="text-info" style="text-align: center"> لا توجد بيانات للعرض </h3>
                </div>
            @endif
        </div>
    </div>


@endsection
