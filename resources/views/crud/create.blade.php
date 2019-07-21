@extends($LayoutName)
@section('head')
   @foreach($heads as $link)
    {!! $link !!}
   @endforeach

@endsection
@section('script')

{{--    <link rel="stylesheet" href="{{asset('assets/js/vendor/touchspin/jquery.bootstrap-touchspin.min.css')}}">--}}
{{--    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>--}}
    @foreach($scripts as $link)
        {!! $link !!}
    @endforeach
@endsection
@section('content')
    <!-- ====================================================
            ================= CONTENT ===============================
            ===================================================== -->
    <section id="content" style="text-align: right">

        <div class="page page-shop-single-product">

            <div class="pageheader">

                <h2>افزودن<span></span></h2>

                <div class="page-bar">

                </div>

            </div>

            <div class="container">

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

            <form id="productForm" class="form-horizontal ng-pristine ng-valid" role="form" method="post" action="{{ $ActionUrl }}"  enctype="multipart/form-data">
                {{ csrf_field() }}
                @if(isset($methodField))
                    {!! $methodField !!}
                @endif
                <div class="row">
                    @foreach($fields as $link)
                        {!! $link !!}
                    @endforeach
                </div>
                <button type="submit" class="btm btn-success">ثبت</button>

            </form>


            </div>

        </div>

    </section>
    <!--/ CONTENT -->

@endsection