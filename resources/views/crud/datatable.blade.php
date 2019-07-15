<link rel="stylesheet" type="text/css" href="/widgets/DataTables/datatables.css"/>


<table class="table table-striped table-hover table-custom" id="{{ $id }}">
    <thead>
        <tr>
            @foreach($class::getdatatable() as $row)
                <th>{{ $row['slug'] }}</th>
            @endforeach
        </tr>
    </thead>

</table>
@section('script')
{{--    <script type="text/javascript" src="/js/hello.js"></script>--}}
    <script type="text/javascript" src="/widgets/DataTables/datatables.js"></script>

<script>
    $(document).ready(function () {
        $('#{{ $id }}').DataTable({
            serverSide: true,
            ajax: "{{ $class::route('data') }}",
            columns: [
                    @foreach($class::getdatatable() as $row)
                { name: '{{ $row['name'] }}'
                    @if(! $row['orderable'])
                    , orderable: false
                    @endif
                    @if(! $row['searchable'])
                    , searchable: false
                    @endif
                },
                @endforeach
            ],
            buttons: [
                {   extend: "whatAButton", name: "myButton" }
            ]
        });
    })

</script>
@endsection