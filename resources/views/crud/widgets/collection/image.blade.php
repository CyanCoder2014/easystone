@section('field')

   <span class="input-group-btn">
     <a id="lfm{{ $fiels['name'] }}" data-input="{{ $fiels['name'] }}" data-preview="thumbnail{{ $fiels['name'] }}" class="btn btn-primary">
       <i class="fa fa-picture-o"></i> انتخاب
     </a>
   </span>
    <input id="{{ $fiels['name'] }}" class="form-control" type="text" name="{{ $fiels['name'] }}" value="{{ $value }}">
    <img id="thumbnail{{ $fiels['name'] }}" style="margin-top:15px;max-height:100px;" @if(isset($value)) src="{{ $value }}" @endif>
@endsection
@section('script')
<script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
@endsection
@section('add_script')
    $('{{ $newfield }}').filemanager('image');
@endsection