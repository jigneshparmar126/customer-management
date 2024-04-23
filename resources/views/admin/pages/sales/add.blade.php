@extends('admin.layouts.app')

@push('url_title') Fixed Deposit @if(isset($uuid)) Edit @else Add @endif @endpush

@if(isset($uuid))
    @section('title', 'Edit Fixed Deposit')
@else
    @section('title', 'Add Fixed Deposit')
@endif

@push('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">@if(isset($uuid)) Edit @else Add @endif Sale</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form class="form-horizontal parsley-examples" id="sale-form" role="form" method="POST"
                            action="{{ route('sale.save') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="row col-sm-12">

                                    <div class="form-group col-md-4">
                                        <label>Customer Name :- </label><br />
                                        <select name="customer_id" id="customer" class="form-control select2" placeholder="Select a Customer">
                                            <option></option>
                                            @if(isset($customers) && !empty($customers))
                                                @foreach($customers as $key => $customer)
                                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <span class="text-danger" style="font-size: 12px;">
                                            @error('customer_id') {{ $message }} @enderror
                                        </span>
                                    </div>

                                    <div class="form-group col-md-4 mb-">
                                        <label>Rate :- </label><br />
                                        <input name="rate" type="number" id="rate" class="form-control" autocomplete="off" value="{{ old('rate') }}" placeholder="Enter rate" />
                                        <span class="text-danger" style="font-size: 15px;">
                                            @error('rate') {{ $message }} @enderror
                                        </span>
                                    </div>

                                    <div class="form-group col-md-4 mb-">
                                        <label>Weight :- </label><br />
                                        <input type="number" name="weight" id="weight" min="1" class="form-control" autocomplete="off" value="{{ old('weight') }}" placeholder="Enter weight" />
                                        <span class="text-danger" style="font-size: 15px;">
                                            @error('weight') {{ $message }} @enderror
                                        </span>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                                <a href="{{ route('sale') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
</script>
@endpush