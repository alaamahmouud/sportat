@extends('admin.layouts.main',[
                                    'page_header'       => 'الصفحة الرئيسية',
                                    'page_description'  => 'إحصائيات عامة',
                                    'link' => url('admin')
                                ])
@section('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
{{--    @push('scripts')--}}
{{--        {!! $line1->script() !!}--}}
{{--    @endpush--}}
{{--    @inject('category','App\Models\Category')--}}
{{--    @inject('client','App\Models\Client')--}}
{{--    @inject('tender','App\Models\Tender')--}}
{{--    @inject('advertiser','App\Models\Advertiser')--}}
{{--    <div class="row">--}}
{{--        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-2">--}}
{{--            <div class="ibox ">--}}
{{--                <div class="ibox-title">--}}
{{--                    <h5>عدد العملاء</h5>--}}
{{--                </div>--}}
{{--                <div class="ibox-content">--}}
{{--                    <h1 class="no-margins">{{$client->count()}}</h1>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-2">--}}
{{--            <div class="ibox ">--}}
{{--                <div class="ibox-title">--}}
{{--                    <h5>الاشتراكات </h5>--}}
{{--                </div>--}}
{{--                <div class="ibox-content">--}}
{{--                    <h1 class="no-margins">{{$client->count()}}</h1>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-2">--}}
{{--            <div class="ibox ">--}}
{{--                <div class="ibox-title">--}}
{{--                    <h5>عدد المناقصات</h5>--}}
{{--                </div>--}}
{{--                <div class="ibox-content">--}}
{{--                    <h1 class="no-margins">{{$tender->count()}}</h1>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-2">--}}
{{--            <div class="ibox ">--}}
{{--                <div class="ibox-title">--}}
{{--                    <h5>الجهات المعلنة</h5>--}}
{{--                </div>--}}
{{--                <div class="ibox-content">--}}
{{--                    <h1 class="no-margins">{{$advertiser->count()}}</h1>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-2">--}}
{{--            <div class="ibox ">--}}
{{--                <div class="ibox-title">--}}
{{--                    <h5>الأنشطة الرئيسية</h5>--}}
{{--                </div>--}}
{{--                <div class="ibox-content">--}}
{{--                    <h1 class="no-margins">{{$category->main()->count()}}</h1>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-2">--}}
{{--            <div class="ibox ">--}}
{{--                <div class="ibox-title">--}}
{{--                    <h5>الأنشطة الفرعية</h5>--}}
{{--                </div>--}}
{{--                <div class="ibox-content">--}}
{{--                    <h1 class="no-margins">{{$category->sub()->count()}}</h1>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="ibox ">--}}
{{--        <div class="ibox-title">--}}
{{--            <h5>المناقصات شهريا</h5>--}}
{{--        </div>--}}
{{--        <div class="ibox-content">--}}
{{--             {!! $line1->container() !!}--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection

