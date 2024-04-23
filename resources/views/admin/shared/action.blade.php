@php
	$view 					 = $view ?? false;
	$edit 					 = $edit ?? false;
	$delete 				 = $delete ?? false;
	$statusshow 			 = $statusshow ?? false;
	$emiview 				 = $emiview ?? false;
	$payment				 = $payment ?? true;
@endphp

@if($view)
	<a href="{{ route($routeName.'.view', $id) }}" title="Payment Details"><button type="button" class="btn btn-primary btn-custom waves-effect waves-light  {{ $customerSale == false ? 'd-none' : '' }}"><i class="fa fa-eye"></i></button></a>
@endif

@if($statusshow)
	<label class="switch"><input type="checkbox" {{ $status == '1' ? 'checked' : '' }} value="{{ $id }}" id="status" style="size: small"><span class="slider round"></span></label>
@endif

@if($edit)
	<a title="Edit" href="{{ isset($status) && $status == 'close' ? 'javascript:void(0)' : route($routeName.'.edit', $uuid) }}" title="Edit"><button type="button" class="btn btn-icon waves-effect waves-light btn-warning {{ isset($status) && $status == 'close' ? 'disabled d-none' : '' }}"><i class="fa fa-edit"></i></button></a>
@endif

@if($delete)
	<a title="Delete" href="{{ route($routeName.'.delete', $uuid) }}" data-title={{ $title }} class="act-delete"><button type="button" class="btn btn-icon waves-effect waves-light btn-danger"><i class="fa fa-trash"></i></button></a>
@endif	

@if($emiview)
	<a href="{{ route($routeName.'.emi.view', $uuid) }}"><button type="button" class="btn btn-info btn-custom waves-effect waves-light"><i class="fa fa-eye"> EMIs</i></button></a>
@endif
