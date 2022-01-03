@extends('front.main')

@push('style')

    <link rel="stylesheet" href="{{asset('front/css/pay.css')}}">

@endpush

@section('content')


    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif

    <div class="container">
        <form method="post" action="complete">
            @csrf
        <div class="row">
            <div class="col-md-6">
                <p class="h4">الدفع</p>
                <div class="name">
                    <input type="text" readonly value="{{auth()->user()->first_name}}" placeholder="الاسم الاول" name="first_name">
                    <input type="text"  readonly value="{{auth()->user()->last_name}}" placeholder="الاسم الثانى" name="last_name">
                </div>
                <div class="mail">
                    <input type="email"  readonly value="{{auth()->user()->email}}" placeholder="البريد الالكتروني" name="email">
                    <input type="text"  readonly value="{{auth()->user()->phone}}" placeholder="رقم الهاتف" name="phone">
                </div>
                <div class="address">
                    <input type="text" placeholder="المدينة" name="city">
                    <input type="text" placeholder="العنوان" name="address">
                </div>
                <div class="note">
                    <input type="text" placeholder="ملحوظه" name="note">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
{{--                <div class="visa">--}}
{{--                    <img src="{{asset('front/img/visa-2.png')}}" alt="visa mark">--}}
{{--                    <p class="h6">دفع عن طريق الفيزا</p>--}}
{{--                </div>--}}
{{--                <div class="vodafonCash">--}}
{{--                    <img src="{{asset('front/img/Vodafone-Cash-Logo-1024x536.png')}}" alt="visa mark">--}}
{{--                    <p class="h6">دفع عن طريق فودافون كاش</p>--}}
{{--                </div>--}}
                <div class="pay">
                    <img src="{{asset('front/img/pay.png')}}" alt="visa mark">
                    <p class="h6">دفع عند الاستلام</p>
                </div>
                <div class="finish">
                    <button class="btn">إتمام الدفع</button>
                </div>
            </div>
        </div>
        </form>
    </div>

@endsection
