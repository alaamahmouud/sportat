@extends('admin.layouts.main',[
                                'page_header'       => 'شهاده الضمان',
                                'page_description'  => '  عرض  ',
                                'link' => url('admin/categories')
                                ])
@section('content')


{{--            <div class="container">--}}
                <div class="wrapper wrapper-content  animated fadeInRight article">
                    <div class="row justify-content-md-center">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <div class="ibox">
                                <div class="ibox-content">

                                    <div class="text-center article-title">

                                        <span class="text-muted"><i class="fa fa-clock-o"></i> {{$record->created_at->format('d/m/Y')}}</span>
                                        <h2 class="pull-left">
                                            <a href="{{url(route('certificates.update',$record->id))}}">تعديل شهاده الضمان</a>
                                        </h2>
                                        <h1>
                                            شهاده الضمان
                                        </h1>
                                    </div>
                                    <p style="  font-weight: 900; ">
                                        <strong>  {{$record->content}}</strong>
                                    </p>
                                    <hr>


                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2"></div>

                    </div>
                </div>
{{--            </div>--}}
@endsection
