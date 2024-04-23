@extends('admin.layouts.app')

@push('url_title') Payment @endpush

@push('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Payment</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card-box table-responsive">
            <div class="m-t-0 m-b-10 row">
                <div class="col-sm-12 text-right">
                    <button class="btn btn-primary" id="add-more" role="button"> <span><i class="fa fa-plus"></i></span> Add More</button>
                </div><br><br>
            </div>

            <form class="form-horizontal parsley-examples" id="sale-form" role="form" method="POST" action="{{ route('customer.payment.save') }}" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                <div class="form-group append-part row">
                    <div class="col-md-4">
                        <label>Rate</label>
                        <input name="rate[0]" class="form-control rate" type="number" required>
                    </div>
                    <div class="col-md-4">
                        <label>Weight</label>
                        <input name="weight[0]" data-count="0" class="form-control weight" type="number" required>
                    </div>
                </div>
                <div class="append-area"></div>
                <div class="form-group clearfix">
                    <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

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

    $(document).ready(function () {
        $('#customer').select2({
            placeholder: "Select A Customer",
            theme: "select"
        });

        // Form validation
        $("#sale-form").validate({
            rules: {
                customer_id: {
                    required: true,
                },
                rate: {
                    required: true,
                },
                weight: {
                    required: true,
                },
            },
            messages: {
                customer_id: {
                    required: "customer is required.",
                },
                rate: {
                    required: "This Rate is required.",
                },
                weight: {
                    required: "This Weight is required.",
                },
            },
            errorClass: 'invalid-feedback',
            errorElement: 'span',
            highlight: function (element) {
                $(element).addClass('is-invalid');
                $(element).siblings('label').addClass('text-danger'); // For Label
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
                $(element).siblings('label').removeClass('text-danger'); // For Label
            },
            errorPlacement: function (error, element) {
                if (element.attr("data-error-container")) {
                    error.appendTo(element.attr("data-error-container"));
                } else {
                    error.insertAfter(element);
                }
            }
        });
        $('#sale-form').submit(function () {
            if ($(this).valid()) {
                addOverlay();
                $("input[type=submit], input[type=button], button[type=submit]").prop("disabled", "disabled");
                return true;
            } else {
                return false;
            }
        });
    });    

    $('#user-table').dataTable({
        "processing": true,
        "serverSide": true,
        "searching": true,
        "ordering": false,
        "columns": [
            { "title": "Id", "data": "id", "name": "id" },
            { "title": "Customer Name", "data": "customer_name", "name": "customer_name" },
            { "title": "Rate", "data": "rate", "name": "rate"},
            { "title": "Weight", "data": "weight", "name": "weight" },
            { "title": "Remaining Weight", "data": "remaining_weight", "name": "remaining_weight" },
        ],
        "responsive": false,
        "ajax": {
            "url": "{{ route('customer.sale.list', $customer->id) }}",    
        },
    });

    var i = 0;
    $('#add-more').on('click', function(){
        ++i;
        var html = '<div class="form-group append-part row"><div class="col-md-4"><label>Rate</label><input name="rate['+ i +']" class="form-control rate" type="number" required></div><div class="col-md-4"><label>Weight</label><input name="weight['+ i +']" data-count="'+ i +'" class="form-control weight" type="number" required></div></div>';
        $('.append-area').append(html);

        $('#sale-form').parsley().reset();
    });


    $(document).on('keyup', '.weight', function() {

        var correntQty   = $(this);
        var count   = $(this).data('count');
        var rate = $('input[name="rate[' + count + ']"]').val();
        var weight   = $(this).val();
        var customerId = {{ $customer->id }};

        $.ajax({
            url : "{{ route('check.remaining.weight') }}",
            type : 'POST',
            data : {"_token": "{{ csrf_token() }}", rate: rate, weight:weight, customer_id:customerId },
            success: function(response){
                if(response['status'] == false){
                    Swal.fire({ 
                        type: "error", 
                        title: response['title'], 
                        text: response['message'],
                        showConfirmButton: false,
                        timer: 2000
                    });
                    correntQty.val(response.weight);
                }
            }
        });
    });

</script>
@endpush