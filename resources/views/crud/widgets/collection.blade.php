@section('head')
@endsection
@section('field')
<div class="col-12">
    <table>
        <thead>
            <tr>
                @foreach($fiels['collection'] as $collect)
                    <th>{{ $collect['slug'] }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody id="Addable{{$fiels['name']}}">
            <tr>
                @if(isset($fields) && is_array($fields))
                @foreach($fields as $field)
                    {!! $field !!}
                @endforeach
                @endif
            </tr>
        </tbody>
    </table>
    <button id="add{{ $fiels['name'] }}" type="button">اضافه کردن</button>
</div>
@endsection
@section('script')

<script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
<script>
    $(document).ready(function () {
        var addable{{$fiels['name']}}= "#Addable{{$fiels['name']}}";
        var count{{$fiels['name']}}= @if (is_array($value)) {{ count($value) }} @else {{ 0 }} @endif;
        $('#add{{ $fiels['name'] }}').on('click',function () {
            count{{$fiels['name']}}++;
            $(addable{{$fiels['name']}}).append('<tr ></tr>');

        });
    });
</script>
@endsection