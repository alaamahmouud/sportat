@extends('front.main')

@push('style')
    <link rel="stylesheet" href="{{asset('front/css/confirmEmail.css')}}">

@endpush
@section('content')



    <div class="container">

        <div class="row">
            <div class="col-md-6 confirm">
                <p class="h2">تأكيد البريد الالكتروني</p>
                <p class="h5">يرجي ادخال الرقم الذي تم ارساله اليك علي البريد الالكتروني</p>
                <form action="check-code" method="post">
                    @csrf
                    <input name="pin_code" style="width: 19rem" type="text" maxlength="6">

                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    @endif

                <div class="countDown">
                    <span id="countdown"> 60</span><span id="disapper">ثانيه</span>
                </div>
                <button class="btn">ارسال</button>


                </form>



            </div>
            <div class="col-md-6">
                <img src="{{asset('front/img/undraw_Wall_post_re_y78d.png')}}" alt="">
            </div>
        </div>
    </div>


@endsection


@push('script')
    <script>
        let myCount = document.getElementById("countdown");
        let mydisaper = document.getElementById("disapper")

        function countDown() {
            myCount.innerHTML -= 1
            if (myCount.innerHTML === "0") {
                myCount.innerHTML = `
<form method="post" action="resend">

<button style="background-color: #F8D62E; border: none" type="submit"> محاوله مره  اخرى </button>

</form>
`;
                mydisaper.innerHTML = ''
                clearInterval(count)
            }
        }
        let count = setInterval(countDown, 1000);
    </script>

@endpush
