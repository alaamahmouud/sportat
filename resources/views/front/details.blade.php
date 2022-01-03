@extends('front.main')

@push('style')
    <link rel="stylesheet" href="{{asset('front/css/showTalap.css')}}">

@endpush
@section('content')
    @inject('categories',App\Models\Category)
    <div class="container-fluid">
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
            <div class="col-md-10">

                <div class="img">

                    <img src="{{asset($product->attachmentRelation[0]->path)}}" alt="">
                    <div class="description">
                        <p class="h2">{{$product->name}}</p>
                        <p class="h6">{{$product->company_name}}</p>
                        <p class="h2">{{$product->price_after_discount}}</p>
                        <p class="h6 oldPrice">{{$product->price_before_discount}}</p>
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
                    </div>
                </div>
                <div class="littelImg" style="display: flex">
                    @foreach($product->attachmentRelation as $img)
                    <div class="titlecard" style="width: 100px;
                        height: 100px;
                        background-repeat: no-repeat;
                        background-size: cover;
                        background-image: url('{{asset($img->path)}}')">

                    </div>
                    @endforeach
                </div>
                <button style="background-color: #F8D62E;
                    width: 30%;
                    padding: 1%;
                    font-weight: bold;
                     border-radius: 21px;
                   -webkit-border-radius: 21px
;
    -moz-border-radius: 21px;
    -ms-border-radius: 21px;
    -o-border-radius: 21px;" onclick="window.location.href='{{url(route('cart.add',$product->id))}}'" class="btn">
                    اضف الى السله
                </button>

                <div class="alldescribtion">
                    <p class="h2">المواصفات</p>
                    <p class="h5">
                       {{$product->description}}
                    </p>
                </div>
                <p class="h2">اراء العملاء</p>
            </div>
            <div class="col-md-2 rightRate">
                <div class="rate">
                    <p class="h4">4.5/5</p>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <p class="h4">200 تقييم</p>
                </div>
            </div>
            @inject('retes',App\Models\Rate)
            <div class="col-md-10 leftRate">

                @forelse($retes->where('product_id',$product->id)->get() as $rate)
                <div class="rateContainer">
                    <div class="peopleWord">
                        <p class="h4">{{\Carbon\Carbon::parse($rate->created_at)->format('h-m-d') ?? null}}</p>
                        {!! \App\MyHelper\Helper::frontRate($rate->rating) !!}
                        <p class="h6">
                            {{$rate->message ?? null}}
                        </p>
                        <p class="h4">{{optional($rate->client)->name}}</p>
                    </div>
                </div>
                @empty
                    <h3>لا يوجد تقيمات حتي الان </h3>
                @endforelse


                <form method="post" action="rate">
                    @csrf
                    <input type="hidden" name="client_id" value="{{auth()->user()->id}}">
                    <input type="hidden" name="product_id" value="{{$product_id}}">
                <div class="text">
                    <div class="STAR">
                        <p class='h2'>تقييمك</p>
                        <p class="icon">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </p>
                    </div>
                    <textarea name="rating" id="yourMsg" cols="30" rows="1">رسالتك</textarea>
                    <br>
                    <button class="btn">ارسال</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
