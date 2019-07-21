@section('field')
    <textarea  name="{{ $fiels['name'] }}" id="{{ $fiels['name'] }}" class="form-control">{{ $value }}</textarea>
@endsection
@section('script')
<script src="<?= Url('assets/plugins/ckeditor/ckeditor.js'); ?>"></script>
@endsection
@section('add_script')
<script>
    CKEDITOR.replace( '{{ $newfield }}',{
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    });

</script>
@endsection