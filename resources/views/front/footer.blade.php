<footer>
    <div class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <p class="h3">Mobile accessories</p>
                    <img src="{{asset('img/cf4716cf-b0d1-4238-9ff7-e22a24d3d27e.png')}}" alt="">
                </div>
                <div class="col-md-3">
                    <p class="h3">اتصل بنا</p>
                    <div class="text">
                        <p class="h5">
                            <i class="fas fa-phone"></i>
                            <a href="tel:01235411545">01235411545</a>
                        </p>
                        <p class="h5">
                            <i class="fas fa-envelope-open"></i>
                            <a href="">
                                whatever@gmail.com
                            </a>
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <p class="h3">
                        عنواننا
                    </p>
                    <div class="text">
                        <p class="h5"> <i class="fas fa-map-marked-alt"></i>
                            <a class="address" href="">المنصورة شارع الترعه  <br>  فوق مطعم اهل الشام</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <p class="h3">
                        وسائل التواصل الاجتماعي
                    </p>
                    <div class="text">
                        <a href=""> <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                        <a href="">
                            <i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="row lastRow">
                <p class="h6"><a href="terms&condition.html">الآحكام  والشوط</a>
                    <a href="terms&condition.html">سياسه االخصوصيه</a>
                </p>

            </div>
        </div>
    </div>
</footer>
<!--End Footer-->

<!-- Main Js Templet From BootStrap5-->
<script src="{{asset('inspina/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
<script>



    @if( session()->get('success'))

    swal({
        title: "نجحت العملية!",
        text: '{{session('success')}}',
        type: "success",
        showConfirmButton: false,
        timer: 1500
    });

    @elseif(session()->get('error'))

    swal({
        title: "فشلت العملية!",
        text: '{{session('error')}}',
        type: "error",
        confirmButtonText: "حسناً"
    });

    @endif

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

@stack('script')
</body>

</html>
