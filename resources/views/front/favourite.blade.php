@extends('front.main')

@push('style')
    <link rel="stylesheet" href="{{asset('front/css/favPage.css')}}">

@endpush
@section('content')

    <div class="container" style="margin-top: 5%">
            <div class="row">
                @forelse($favProducts as $seller)
                    <div class="col-md-3">

                    <div class="card" data-wow-duration="2s" data-wow-delay="3s" style="width: 13rem;overflow: hidden; margin-top: 5%; margin-bottom: 2%">

                        <div class="card-header" style="background-image: url('{{asset($seller->attachmentRelation[0]->path ?? null)}}')"></div>
                        <!--<img src="img/Scroll Group 1.png" class="card-img-top" alt="...">-->
                        <div class="card-body">
                            <h5 class="card-title">{{$seller->name}}</h5>
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

                            <button  onclick="window.location.href='/cart/additems/{{$seller->id}}'"  class="btn ">اضف الى السلة</button>
                        </div>
                    </div>
                    </div>

                @empty
                    <h4>لا يوجد منتجات في الوقت الحالي</h4>
                    <hr>
                @endforelse

            </div>

    </div>

@endsection


        @push('script')





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
                            location.reload()
                        },
                        error: function (XMLHttpRequest) {
                            // handle error
                        }
                    });
                }
            </script>

            <br><br>
    @endpush
