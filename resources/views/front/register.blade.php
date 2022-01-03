@extends('front.main')

@push('style')
    <link rel="stylesheet" href="{{asset('front/css/creatAcount.css')}}">

@endpush
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-6 creatAcount">
                <p class="h2"> انشاء حساب</p>

                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                @endif

                <form action="register-send" method="post">
                    @csrf
                    <div class="name">
                        <input type="text" placeholder="الاسم الاول" name="first_name">
                        <input type="text" placeholder="الاسم الثانى" name="last_name">
                    </div>
                    <div class="email">
                        <input type="email" name="email" placeholder="البريد الالكتروني">
                    </div>
                    <div class="phoneNumber">
                        <input type="number" name="phone" placeholder="رقم الهاتف">
                    </div>
                    <div class="password">
                        <input type="password" name="password" placeholder="الرقم السرى">
                    </div>

                        <label for="type_id">اختيار النوع</label>
                        <br>
                        @inject('type',App\Models\Type)
                        <select name="type_id" id="type_id">
                            @foreach($type->get() as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    <div class="submit">
                        <button type="submit" class="btn ">انشاء حساب</button>
                        <p class="h6">ليس لديك حساب؟ <span><a href="{{url(route('front.login'))}}">تسجيل الدخول</a></span></p>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <img src="{{asset('front/img/undraw_Wall_post_re_y78d.png')}}" alt="">
            </div>
        </div>
    </div>



@endsection
