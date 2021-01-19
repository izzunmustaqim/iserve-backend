@extends('master')

@section('content')
    <table class="table table-bordered" id="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Website</th>
                <th>Company</th>
                <th>Completed Todos</th>
            </tr>
        </thead>
    </table>
@stop

@push('scripts')
<script>
$(function() {
    $('#table').DataTable({
        processing: false,
        serverSide: false,
        ajax: '{!! route('todos.get') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'username', name: 'username' },
            { data: 'email', name: 'email' },
            { data: 'address', name: 'address', render:function(data, type, row)
                {
                return "<p>"+data.street+"</p><p>"+data.suite+"</p><p>"+data.city
                    +"</p><p>"+data.zipcode+"</p><p>Lat: "+data.geo.lat+"</p><p>Longitude: "+data.geo.lng+"</p>";
                }
            },
            { data: 'phone', name: 'phone' },
            { data: 'website', name: 'website' },
            { data: 'company', name: 'company', render:function(data, type, row)
                {
                return "<p>Name: "+data.name+"</p><p>Catchphrase: "+data.catchPhrase+"</p><p>Bs: "+data.bs+"</p>";
                }
            },
            { data: 'completedTodos', name: 'completedTodos' },

        ],
        "bPaginate": false,
        "bInfo" : false,
    });
});
</script>
@endpush