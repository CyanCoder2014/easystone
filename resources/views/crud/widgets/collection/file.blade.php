@section('field')
        <input type="file" name="{{ $fiels['name'] }}" >
        @if(isset($value))
            <div>
                <input id="{{ $fiels['name'] }}" class="form-control" type="hidden" name="{{ $fiels['name'] }}_old" value="{{ $value }}">
                <a href="{{ $value }}">فایل قبلی</a>
                <a href="#" onclick="this.parent().remove();">حذف</a>
            </div>
        @endif
@endsection
