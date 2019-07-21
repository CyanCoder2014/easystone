@section('head')
    <link rel="stylesheet" href="/widgets/datepicker/jquery.md.bootstrap.datetimepicker.style.css"/>
@endsection
@section('field')
        <input type="text" name="{{ $fiels['name'] }}" id="{{ $fiels['name'] }}" value="{{ $value }}" class="form-control">
@endsection
@section('script')
{{--<link rel="stylesheet" href="/widgets/datepicker/css/persianDatepicker-default.css"/>--}}
<script src="/widgets/jquery.min.js"></script>
{{--<script src="/widgets/datepicker/js/persianDatepicker.min.js"></script>--}}
<script src="/widgets/datepicker/jquery.md.bootstrap.datetimepicker.js"></script>
@endsection
@section('script')
        $("{{ $newfield }}").MdPersianDateTimePicker({
            targetTextSelector: '{{ $newfield }}'
        });
@endsection