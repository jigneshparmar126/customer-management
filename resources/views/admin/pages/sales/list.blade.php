@extends('admin.layouts.app')

@push('url_title') Sale @endpush
@section('title', 'User')

@push('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Sale</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <div class="m-t-0 m-b-10 row">
                <div class="col-sm-12 text-right">
                    <a class="btn btn-primary" href="{{ route('sale.create') }}" role="button"> <span><i
                                class="fa fa-plus"></i></span> Add New Sale</a>
                </div><br><br>
            </div>

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
            { "title": "Customer Name", "data": "customer_name", "name": "customer_name" },
            { "title": "Weight", "data": "weight", "name": "weight" },
            { "title": "Rate", "data": "rate", "name": "rate"},
        ],
        "responsive": false,
        "ajax": {
            "url": "{{ route('sale.list') }}",    
        },
    });
</script>

@endpush