@section('head')
    <link rel="stylesheet" href="/widgets/datepicker/jquery.md.bootstrap.datetimepicker.style.css"/>
@endsection
@section('field')
    <div class="col-sm-4 form-group">
        @if(isset($fiels['slug']))
            <label for="{{ $fiels['name'] }}">{{ $fiels['slug'] }}</label>
        @endif
        <input type="text" name="{{ $fiels['name'] }}" id="{{ $fiels['name'] }}" value="{{ $value }}" class="form-control">
    </div>
@endsection
@section('script')
{{--<link rel="stylesheet" href="/widgets/datepicker/css/persianDatepicker-default.css"/>--}}
<script src="/widgets/jquery.min.js"></script>
{{--<script src="/widgets/datepicker/js/persianDatepicker.min.js"></script>--}}
<script src="/widgets/datepicker/jquery.md.bootstrap.datetimepicker.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        {{--$("#{{ $fiels['name'] }}").persianDatepicker({--}}
            {{--formatDate: "YYYY/MM/DD hh:mm:ss"--}}
        {{--});--}}
        $("#{{ $fiels['name'] }}").MdPersianDateTimePicker({
            targetTextSelector: '#{{ $fiels['name'] }}'
        });
    });
</script>
@endsection