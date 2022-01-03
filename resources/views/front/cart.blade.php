@extends('front.main')

@push('style')
    <link rel="stylesheet" href="{{asset('front/css/basket.css')}}">

@endpush
@section('content')

    @if(count($cartitems))
    <br>


        <div class="container">
        <div class="row">
        @foreach ($cartitems as $item)

            @if($item->options->client_id == auth()->user()->id)
            <p class="h2"> سلة المنتجات({{Cart::count()}})
            </p>

            <div class="col-md-10">
                <div class="img">
                    <p class="h6"> المنتج</p>
                    <div class="card-header"
                         style="background-image:url('{{asset($item->options->attachments)}}')">

                    </div>
                </div>
                <div class="details">
                    <p class="h4">{{$item->name}}</p>
                    <p class="h6">{{$item->options->company_name}}</p>
                </div>

                <form class="piece-number" method="post" action="cart/quty/{{$item->rowId}}" >
                    @csrf
                    @method('put')



                                        <button style="border: none; color: #fff; background-color: #F8D62E" class="increase" name="action" value="inc" >
                                            <i  class="fas fa-plus"></i>
                                        </button>
                    <input type="text" name="piece-number" id="" value="{{$item->qty}}" readonly >

                    <button
                        style="border: none; color: #fff; background-color: #F8D62E"
                        class="decrease" name="action" value="dec">
                        <i class="fa fa-minus" aria-hidden="true"></i>

                    </button>
                </form>

{{--                <div class="number">--}}
{{--                    <p class="h6" style="text-align:right">الكمية</p>--}}
{{--                    <input type="number" value="2" id="Number">--}}
{{--                </div>--}}
                <div class="price">
                    <p style="text-align:right" class="h6">سعر الوحده</p>
                    <p class="h3 " id="price ">{{$item->price}}</p>
                </div>
                <div class="allPrice ">
                    <p style="text-align:right" class="h6">السعرالكلي</p>
                    <p class="h3 " id="allPrice ">{{$item->price * $item->qty}}
                    </p>
                    <button onclick="location.href='cart/destroy/{{$item->rowId}}'" class="btn ">حذف</button>
                </div>
            </div>



@endif

            @endforeach
            <div style="margin-right: 70rem">
                <p style="text-align:right" class="h6">السعرالكلي</p>
                <p class="h3 " id="allPrice ">{{Cart::subtotal()}}
            </div>

            <a type="button " class="btn " href="{{url(route('front.pay'))}}">
                متابعه عمليه الشراء
            </a>
        </div>
    </div>

        <br><br><br><br>
    @else

       @include('front.cart-empty')
    @endif

@endsection
