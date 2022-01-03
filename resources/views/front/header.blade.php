

    <!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;400&display=swap" rel="stylesheet">
    <!--Main Temblet Css File-->
{{--    <link rel="stylesheet" href="css/logIn.css">--}}
    <!--Main Fram Work BootStrap 5  -->

    <link rel="stylesheet" href="{{asset('front/css/logIn.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('inspina/js/plugins/sweetalert/sweetalert.css')}}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome Libary -->
    <link rel="stylesheet" href="{{asset('front/css/all.min.css')}}">
    @if($errors->any())
        <style>
            #myForm {
                border: 2px solid #e9a1a8;
            }
        </style>
    @endif
    @stack('style')
</head>

<body>
<!--Start Navbar-->
<header>
    <nav class="navbar  navbar-expand-lg  navbar-light bg ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="{{asset('front/img/cf4716cf-b0d1-4238-9ff7-e22a24d3d27e.png')}}" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            @inject('categories',App\Models\Category)
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link  " aria-current="page" href="/">الصفحه الرئيسيه</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            المنتجات
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach($categories->where('is_active',1)->get() as $cat)
{{--                                <form method="get" action="product/{{$cat->id}}">--}}
                            <li>
                                <a class="dropdown-item" href="{{url(route('product.category',$cat->id))}}">{{$cat->name}}</a>
                            </li>
{{--                                </form>--}}
                            @endforeach
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url(route('favourite'))}}">المفضلة</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactus.html">انصل بنا</a>
                    </li>
                </ul>
            </div>
            @if(auth()->guest())
            <a href="{{url(route('front.login'))}}" type="button" class="login"> تسجيل الدخول</a>
            @endif
            @if(auth()->user())
                <a href="{{url(route('logout'))}}" type="button" class="login"> تسجيل الخروج</a>
            @endif

            <a href="{{route('cart')}}" class="shop-car">
                <i class="fas fa-shopping-cart"></i>
            </a>
        </div>
    </nav>
</header>
