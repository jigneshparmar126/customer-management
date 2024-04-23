@extends('admin.layouts.app')

@push('url_title') Home @endpush
@section('title', 'Dashboard')

@push('css')
    <style type="text/css">
        .info-table th {
            background-color: #f7f8f9;
            width: 40%;
        }
        .big-font{
            font-size:18px;
        }
    </style>
@endpush

@push('content')  
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
</div>     

<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card-box">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-lg rounded-circle bg-primary border-primary border shadow">
                        <i class="fe-user font-22 avatar-title text-white"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="mt-1"><span data-plugin="counterup">10</span></h3>
                        <p class="text-muted mb-1 text-truncate">Total Customer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endpush

@push('js')

@endpush