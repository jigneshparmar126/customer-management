@extends('admin.layouts.app')

@push('url_title') Customer @endpush
@section('title', 'User')

@push('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Customer</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <table id="table_DT" class="table table-striped table-bordered">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table id="user-table" class="table table-striped table-bordered">
                            </table>
                        </div>
                    </div>
                </div>
            </table>
        </div>
    </div>
</div>
@endpush

@push('js')

<script type="text/javascript">
    $('#user-table').dataTable({
        "processing": true,
        "serverSide": true,
        "searching": true,
        "ordering": false,
        "columns": [
            { "title": "Id", "data": "id", "name": "id" },
            { "title": "Customer Name", "data": "name", "name": "name" },
            { "title": "Email", "data": "email", "name": "email" },
            { "title": "Phone Number", "data": "phone_number", "name": "phone_number" },
            { "title": "Address", "data": "address", "name": "address"},
            { "title": "Total Weight", "data": "weight", "name": "weight"},
            { "title": "Remaining Weight", "data": "remaining_weight", "name": "remaining_weight"},
            { "title": "Action", "data": "action", "name": "action"},
        ],
        "responsive": false,
        "ajax": {
            "url": "{{ route('customer.list') }}",    
        },
    });
</script>

@endpush