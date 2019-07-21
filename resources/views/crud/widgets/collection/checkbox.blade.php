@section('field')
        <input type="checkbox" name="{{ $fiels['name'] }}" id="{{ $fiels['name'] }}" @if($value && $value==1) checked @endif value="1">
@endsection