@push('style')

    <style>
        @import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);

        body {
            background-color: #eee;
            font-family: 'Calibri', sans-serif !important
        }

        .mt-100 {
            margin-top: 100px
        }

        .card {
            background-color: #F8D62E;
            margin-bottom: 30px;
            border: 0;
            -webkit-transition: all .3s ease;
            transition: all .3s ease;
            letter-spacing: .5px;
            border-radius: 8px;
            -webkit-box-shadow: 1px 5px 24px 0 rgba(68, 102, 242, .05);
            box-shadow: 1px 5px 24px 0 rgba(68, 102, 242, .05)
        }

        /*.card .card-header {*/
        /*    background-color: #F8D62E;*/
        /*    border-bottom: none;*/
        /*    padding: 24px;*/
        /*    border-bottom: 1px solid #f6f7fb;*/
        /*    border-top-left-radius: 8px;*/
        /*    border-top-right-radius: 8px*/
        /*}*/

        .card-header:first-child {
            border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0
        }

        .card .card-body {
            padding: 30px;
            background-color: transparent
        }

        .btn-primary,
        .btn-primary.disabled,
        .btn-primary:disabled {
            background-color: #4466f2 !important;
            border-color: #4466f2 !important
        }
    </style>
@endpush
<div class="container-fluid mt-100">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
{{--                <div class="card-header">--}}
{{--                    <h5>Cart</h5>--}}
                </div>
                <div class="card-body cart">
                    <div class="col-sm-12 empty-cart-cls text-center"> <img src="{{asset('front/img/empty-cart.png')}}" width="130" height="130" class="img-fluid mb-4 mr-3">
                        <h3><strong>العربه فارغه الان </strong></h3>
                        <h4>أضف شيئا لتجعلني سعيدا :)</h4> <a href="/" class="btn btn-primary cart-btn-transform m-3" data-abc="true">تابع التسوق</a>
                    </div>
                </div>
            </div>
{{--        </div>--}}
    </div>
</div>