@section('field')

    <select name="{{ $fiels['name'] }}" id="{{ $fiels['name'] }}" class="form-control">
        @if(!isset($fiels['condition']))
        <option value="">--انتخاب--</option>
        @endif
        @if(is_array($fiels['values']))
            @foreach($fiels['values'] as $key => $val)
                    <option value="{{$key}}" @if($key == $value) selected @endif>{{ $val }}</option>
            @endforeach
        @endif

    </select>
@endsection
@section('head')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
@endsection
@section('add_script')
    $('{{ $newfield }}').select2();
@endsection