@extends('front.main')

@push('style')
    <link rel="stylesheet" href="{{asset('front/css/homePage.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/animate.css')}}">

@endpush
@section('content')

    @inject('categories',App\Models\Category)
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="sidebar">

                    @php
                    $count = 3 ;
                    @endphp
                    @foreach($categories->where('is_active',1)->get() as $category)
                    <a class="active wow bounceInRight" data-wow-duration="2s" data-wow-delay="{{$count}}s" href="{{url(route('product.category',$category->id))}}">{{$category->name}}</a>
                        @php
                            $count ++

                        @endphp
                        @endforeach
                </div>
            </div>
            <div class="col-md-10 ">
                <form method="get" action="{{url(route('front.home'))}}">

                <div class="search">
                                     <input class="form-control me-2" id="search"
                                            name="search" type="text" placeholder="ابحث"
                                            autocomplete="off"
                                            aria-label="Search">
                    <button class="btn" type="submit">بحث</button>

                </div>
                </form>

                <div class="content">
                    <p class="h1">
                        عروض
                    </p>
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">

                            @php
                            $toCount = 0 ;
                            @endphp
                            @foreach($slidGomla as $key=>$slide)
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$toCount}}" class="{{$key == 0 ? 'active' : ''}}" aria-current="{{$key == 0 ? 'true' : ''}}" aria-label="Slide 1"></button>
                               @php
                                   $toCount ++
                               @endphp
                            @endforeach
                        </div>

                        <div class="carousel-inner">
                            @foreach($slidGomla as $key=>$slide)
                                @foreach($slide->attachmentRelation as $img)
                            <div class="carousel-item {{$key == 0 ?'active' : ''}}" style="background-image:url('{{asset($img->path)}}') ;">
                            </div>
                            @endforeach
                            @endforeach

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <p class="h2"> المنتجات الاكثر مبيعا</p>

                </div>
                <section id="hideElement">
                    <div class="col-md-10 firstContainer">
                    <div class="row">
                        @forelse($bestSeller->where('is_active',1)->take(4) as $seller)
                        <div class="card wow bounceInDown" data-wow-duration="2s" data-wow-delay="3s"
                             style="width: 13rem; margin-left: 0 ">

                            <div class="card-header" style="background-image: url('{{asset($seller->attachmentRelation[0]->path ?? null)}}')"></div>
                            <!--<img src="img/Scroll Group 1.png" class="card-img-top" alt="...">-->
                            <div class="card-body">
                            <a  style="text-decoration: none ; color: #F8D62E "
                                href="{{url(route('product.details',$seller->id))}}" target="_blank">
                                <h5 class="card-title">{{$seller->name}}</h5>
                            </a>
                                <p class="card-text"> {{$seller->price_after_discount}}جنيه <br> <span> {{$seller->price_before_discount}} جنيه</span>
                                </p>

                                @php
                                    $product= \App\Models\Product::findorfail($seller->id);
                                @endphp

                                @if(auth()->user())
                                @if ($product->isFavorited())
                                    <div class="frame">
                                        <button style="background-color: #fff ; border: none"  onClick="favourites({{$seller->id}}, {{ Auth::user()->id }})">
                                            <i type="button" id="icon_7" class="HeartAnimation animate"></i>
                                        </button>
                                    </div>
                                @else
                                    <div class="frame">
                                        <button style="background-color: #fff ; border: none"   onClick="favourites({{$seller->id}}, {{ Auth::user()->id }})">
                                            <i type="button" id="icon_7" class="HeartAnimation"></i>
                                        </button>
                                    </div>
                                @endif
                                @endif

                                <button  onclick="window.location.href='cart/additems/{{$seller->id}}'"  class="btn ">اضف الى السلة</button>
                            </div>
                        </div>
                            &ensp;
                        @empty
                            <h4>لا يوجد منتجات في الوقت الحالي</h4>
                            <hr>
                        @endforelse
                    </div>
                    </div>




                    <a class="showMore" href="{{url(route('best-seller'))}}"> عرض المزيد</a>




                    <p class="h2 khasm">جميع المنتجات</p>

                    <div class="col-md-10 firstContainer">

                        <div class="row">

                        @forelse($bestSeller->take(4) as $seller)
                            <div class="card wow bounceInDown" data-wow-duration="2s" data-wow-delay="3s" style="width: 13rem; margin-left: 0">

                                <div class="card-header" style="background-image: url('{{asset($seller->attachmentRelation[0]->path ?? null)}}')"></div>
                                <!--<img src="img/Scroll Group 1.png" class="card-img-top" alt="...">-->
                                <div class="card-body">
                                   <h5  class="card-title">{{$seller->name}}</h5>
                                    <p class="card-text"> {{$seller->price_after_discount}}جنيه <br> <span> {{$seller->price_before_discount}} جنيه</span>
                                    </p>

                                    @php
                                        $product= \App\Models\Product::findorfail($seller->id);
                                    @endphp

                                    @if(auth()->user())
                                        @if ($product->isFavorited())
                                            <div class="frame">
                                                <button style="background-color: #fff ; border: none"  onClick="favourites({{$seller->id}}, {{ Auth::user()->id }})">
                                                    <i type="button" id="icon_7" class="HeartAnimation animate"></i>
                                                </button>
                                            </div>
                                        @else
                                            <div class="frame">
                                                <button style="background-color: #fff ; border: none"   onClick="favourites({{$seller->id}}, {{ Auth::user()->id }})">
                                                    <i type="button" id="icon_7" class="HeartAnimation"></i>
                                                </button>
                                            </div>
                                        @endif
                                    @endif

                                    <button  onclick="window.location.href='cart/additems/{{$seller->id}}'"  class="btn ">اضف الى السلة</button>
                                </div>
                            </div>

                        @empty
                            <h4>لا يوجد منتجات في الوقت الحالي</h4>
                            <hr>

                                &ensp;

                            @endforelse

                    </div>
                    </div>
                    <a class="showMore" href="{{url(route('all.product'))}}"> عرض المزيد</a>
{{--                    <a class="showMore" href="{{url(route('best-seller'))}}"> عرض المزيد</a>--}}

                </section>

            </div>
        </div>
    </div>
{{--    <div class="loading-overlay">--}}
{{--        <img src="{{asset('front/img/cf4716cf-b0d1-4238-9ff7-e22a24d3d27e.png')}}" alt="">--}}
{{--        <p class="h1">جرب معنا متعه التسويق </p>--}}

{{--    </div>--}}
@endsection


@push('script')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
    </script>

    <script type="text/javascript">
        var route = "{{ url('autocomplete-search') }}";

        $('#search').typeahead({
            source: function (query, process) {
                return $.get(route, {
                    query: query
                }, function (data) {
                    return process(data);
                });
            }
        });
    </script>



    <script>

        $(function myFunction() {
            $(".HeartAnimation").click(function() {
                $(this).toggleClass("animate");

            });
        });
    </script>



        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script> function favourites(itemid, userid) {
                var user_id = userid;
                var item_id = itemid;
                $.ajax({
                    type: 'post',
                    url: "/api/v1/favourite",
                    data: {
                        'user_id': user_id,
                        'item_id': item_id,
                    },
                    success: function () {

                    },
                    error: function (XMLHttpRequest) {
                        // handle error
                    }
                });
            }
        </script>


@endpush
