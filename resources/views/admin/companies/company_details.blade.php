@extends('admin.admin_app')
@push('styles')
@endpush
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-8 col-sm-8 col-xs-8">
		<h2> Company Details </h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ url('admin/companies') }}">Companies</a>
			</li>
			<li class="breadcrumb-item active">
				<strong> Company Details </strong>
			</li>
		</ol>
	</div>
	<div class="col-lg-4 col-sm-4 col-xs-4 text-right">
		<a class="btn btn-primary t_m_25" href="{{ url('admin/companies') }}">
			<i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Companies
		</a>
	</div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="tabs-container">
				<ul class="nav nav-tabs" role="tablist">
					<li class="show_details"><a class="nav-link active show" data-toggle="tab" href="#tab-1">Company Details</a></li>
					<li class="show_users"><a class="nav-link" data-toggle="tab" href="#tab-2">Users</a></li>
					<li class="show_billing"><a class="nav-link" data-toggle="tab" href="#tab-3">Billing History</a></li>
				</ul>
				<div class="tab-content">
					<div id="tab-1" class="tab-pane active show" role="tabpanel">
						<div class="ibox">
							<div class="row ibox-content" style="border: none !important;">
								<div class="col-md-12">
									<div class="ibox">
										<div class="row">
											<div class="col-lg-8 col-sm-8 col-xs-8">
												<div class="ibox-title" style="border: none !important;">
													<h5>Company Details</h5>
												</div>
											</div>
											<div class="col-lg-4 col-sm-4 col-xs-4 text-right">
												@if($company->account_type == 0)
												<span class="label label-primary">Exchange</span>
												@else
												<span class="label label-success">Premium</span>
												@endif
											</div>
										</div>

										<div class="ibox-content">
											<div class="row mt-2">
												<div class="col-md-6">
													<div class="form-group row"><label class="col-5 col-form-label"><strong>
																Company Name
																:</strong></label>

														<div class="col-7">
															<label class="col-form-label">{{ $company->name }}</label>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row"><label class="col-5 col-form-label"><strong>
																Company Type
																:</strong></label>

														<div class="col-7">
															<label class="col-form-label">{{ map_company_type($company->company_type) }}</label>
														</div>
													</div>
												</div>
											</div>
											<div class="row mt-2">
												<div class="col-md-6">
													<div class="form-group row"><label class="col-5 col-form-label"><strong>
																Mail Address 1
																:</strong></label>

														<div class="col-7">
															<label class="col-form-label">{{ $company->mail_address_1 }}</label>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row"><label class="col-5 col-form-label"><strong>
																Mail Address 2
																:</strong></label>

														<div class="col-7">
															<label class="col-form-label">{{ $company->mail_address_2 }}</label>
														</div>
													</div>
												</div>
											</div>
											<div class="row mt-2">
												<div class="col-md-6">
													<div class="form-group row"><label class="col-5 col-form-label"><strong>
																City
																:</strong></label>

														<div class="col-7">
															<label class="col-form-label">{{ $company->city }}</label>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row"><label class="col-5 col-form-label"><strong>
																State
																:</strong></label>

														<div class="col-7">
															<label class="col-form-label">{{ $company->state }}</label>
														</div>
													</div>
												</div>
											</div>
											<div class="row mt-2">

												<div class="col-md-6">
													<div class="form-group row"><label class="col-5 col-form-label"><strong>
																Zip
																:</strong></label>

														<div class="col-7">
															<label class="col-form-label">{{ $company->zip }}</label>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row"><label class="col-5 col-form-label"><strong>
																Country
																:</strong></label>

														<div class="col-7">
															<label class="col-form-label">{{ $company->country }}</label>
														</div>
													</div>
												</div>
											</div>
											<div class="row mt-2">
												<div class="col-md-6">
													<div class="form-group row"><label class="col-5 col-form-label"><strong>
																Motor Carrier
																:</strong></label>

														<div class="col-7">
															<label class="col-form-label">{{ $company->motor_carrier_no }}</label>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row"><label class="col-5 col-form-label"><strong>
																US Dot No
																:</strong></label>

														<div class="col-7">
															<label class="col-form-label">{{ $company->dot_no }}</label>
														</div>
													</div>
												</div>
											</div>
											<div class="row mt-2">
												<div class="col-md-6">
													<div class="form-group row"><label class="col-5 col-form-label"><strong>
																Intrastate No
																:</strong></label>

														<div class="col-7">
															<label class="col-form-label">{{ $company->intrastate_no ?? 'N/A' }}</label>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row"><label class="col-5 col-form-label"><strong>
																No of Drivers
																:</strong></label>

														<div class="col-7">
															<label class="col-form-label">{{ $company->drivers }}</label>
														</div>
													</div>
												</div>
											</div>
											<div class="row mt-2">
												<div class="col-md-6">
													<div class="form-group row"><label class="col-5 col-form-label"><strong>
																Website
																:</strong></label>

														<div class="col-7">
															<label class="col-form-label"><a href="{{ $company->website ?? 'N/A' }}" target="_blank"> <i class="fa fa-external-link"></i> {{ $company->website ?? 'N/A' }}</a></label>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row"><label class="col-5 col-form-label"><strong>
																Created On
																:</strong></label>

														<div class="col-7">
															<label class="col-form-label">{{ date_formated($company->created_at) }}</label>
														</div>
													</div>
												</div>
											</div>
											<div class="row mt-2">
												<div class="col-md-6">
													<div class="form-group row"><label class="col-5 col-form-label"><strong>
																Insurance Company
																:</strong></label>

														<div class="col-7">
															<label class="col-form-label">{{ $company->insurance_company }}</label>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row"><label class="col-5 col-form-label"><strong>
																Insurance Declaration
																:</strong></label>

														<div class="col-7">
															<label class="col-form-label"><a href="{{ $company->insurance_declaration ? url('/uploads/insurance_declarations/' . $company->insurance_declaration ) : '#' }}" target="_blank">{{ $company->insurance_declaration ?? 'N/A' }}</a></label>
														</div>
													</div>
												</div>

											</div>
											<div class="row mt-2">
												<div class="col-md-6">
													<div class="form-group row"><label class="col-5 col-form-label"><strong>
																General Liability
																:</strong></label>

														<div class="col-7">
															<label class="col-form-label">{{ $company->gen_liability }} USD</label>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row"><label class="col-5 col-form-label"><strong>
																Cargo Insurance
																:</strong></label>

														<div class="col-7">
															<label class="col-form-label">{{ $company->cargo_insurance }} USD</label>
														</div>
													</div>
												</div>
											</div>
											<div class="row mt-2">
												<div class="col-md-6">
													<div class="form-group row"><label class="col-5 col-form-label"><strong>
																Other Insurance
																:</strong></label>

														<div class="col-7">
															<label class="col-form-label">{{ $company->other_insurance ?? 'N/A'}} USD</label>
														</div>
													</div>
												</div>
												<div class="col-md-6">

												</div>
											</div>
											<div class="row mt-2">
												<div class="col-md-6">
													<div class="form-group row"><label class="col-5 col-form-label"><strong>
																Alert Receipient 1
																:</strong></label>

														<div class="col-7">
															<label class="col-form-label">{{ $company->alert_email_1 ?? 'N/A'}}</label>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row"><label class="col-5 col-form-label"><strong>
																Alert Receipient 2
																:</strong></label>

														<div class="col-7">
															<label class="col-form-label">{{ $company->alert_email_2 ?? 'N/A'}}</label>
														</div>
													</div>
												</div>
											</div>
											<div class="row mt-2">
												<div class="col-md-6">
													<div class="form-group row"><label class="col-5 col-form-label"><strong>
																Freight Post Alerts
																:</strong></label>

														<div class="col-7">
															<label class="col-form-label">{{ $company->alert_freight == 1 ? 'On' : 'Off' }}</label>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row"><label class="col-5 col-form-label"><strong>
																Vehicle Post Alerts
																:</strong></label>

														<div class="col-7">
															<label class="col-form-label">{{ $company->alert_vehicle == 1 ? 'On' : 'Off' }}</label>
														</div>
													</div>
												</div>
											</div>
											<div class="row mt-2">
												<div class="col-md-6">
													<div class="form-group row"><label class="col-5 col-form-label"><strong>
																RPF Post Alerts
																:</strong></label>

														<div class="col-7">
															<label class="col-form-label">{{ $company->alert_rpf == 1 ? 'On' : 'Off' }}</label>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row"><label class="col-5 col-form-label"><strong>
																New Driver Alerts
																:</strong></label>

														<div class="col-7">
															<label class="col-form-label">{{ $company->alert_driver == 1 ? 'On' : 'Off' }}</label>
														</div>
													</div>
												</div>
											</div>
											<div class="row mt-2">
												<div class="col-md-6">
													<div class="form-group row"><label class="col-5 col-form-label"><strong>
																Company Phone
																:</strong></label>

														<div class="col-7">
															<label class="col-form-label">{{ $company->company_phone ?? 'N/A'}} </label>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row"><label class="col-5 col-form-label"><strong>
																Company Mobile
																:</strong></label>

														<div class="col-7">
															<label class="col-form-label">{{ $company->company_mobile ?? 'N/A' }}</label>
														</div>
													</div>
												</div>
											</div>
											<div class="row mt-2">
												<div class="col-md-6">
													<div class="form-group row"><label class="col-5 col-form-label"><strong>
																Account Type
																:</strong></label>

														<div class="col-7">
															<label class="col-form-label">{{ $company->account_type == 0 ? 'Exchange' : 'Premium'}} </label>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row"><label class="col-5 col-form-label"><strong>
																Billing Card
																:</strong></label>

														<div class="col-7">
															<label class="col-form-label">{{$company->card_number ?  substr($company->card_number, 0,4) . '************' : 'N/A'}}</label>
														</div>
													</div>
												</div>
											</div>
											<div class="row mt-2">
												<div class="col-md-6">
													<div class="form-group row"><label class="col-5 col-form-label"><strong>
																CVV
																:</strong></label>

														<div class="col-7">
															<label class="col-form-label">{{$company->card_number ?  '***' : 'N/A'}}</label>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row"><label class="col-5 col-form-label"><strong>
																Expiry Date
																:</strong></label>

														<div class="col-7">
															<label class="col-form-label">{{$company->card_number ? $company->expiry_month . '/' .$company->expiry_year : 'N/A'}}</label>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="tab-2" class="tab-pane" role="tabpanel">
						<div class="ibox">
							<div class="row ibox-content" style="border: none !important;">
								<div class="col-md-12">
									<div class="ibox">
										<div class="ibox-title" style="border: none !important;">
											<h5>Users</h5>
										</div>
										<div class="ibox-content">
											<div class="table-responsive">
												<table id="manage_tbl" class="table table-striped table-bordered dt-responsive" style="width:100%">
													<thead>
														<tr>
															<th>Sr #</th>
															<th>Name</th>
															<th>Title</th>
															<th>Phone</th>
															<th>Access</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
														@php($i = 1)
														@foreach($users as $item)
														<tr class="gradeX">
															<td>{{ $i++ }}</td>
															<td>{{ $item->fname . ' ' . $item->lname }}</td>
															<td>{{$item->title}}</td>
															<td>{{$item->phone}}</td>
															<td>
																@if($item->is_major_user == 0)
																<span class="label label-primary">Sub-user</span>
																@else
																<span class="label label-success">Admin</span>
																@endif
															</td>
															<td>
																<a href="{{ url('admin/users/detail') }}/{{ $item->id }}" class="btn btn-primary btn-sm" data-placement="top" title="Details"><i class="fa-solid fa-file-text-o"></i> Details </a>
															</td>
														</tr>
														@endforeach
													</tbody>
												</table>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="tab-3" class="tab-pane" role="tabpanel">
						<div class="ibox">
							<div class="row ibox-content" style="border: none !important;">
								<div class="col-md-12">
									<div class="ibox">
										<div class="ibox-title" style="border: none !important;">
											<h5>Billing History</h5>
										</div>
										<div class="ibox-content">
											<div class="table-responsive">
												<table id="manage_tbl" class="table table-striped table-bordered dt-responsive" style="width:100%">
													<thead>
														<tr>
															<th>Sr #</th>
															<th>Billing Period</th>
															<th>Amount</th>
															<th>Payment Card</th>
															<th>Status</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td colspan="6">
																No Records Yet | Under Development
															</td>
														</tr>
													</tbody>
												</table>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')
<script>
	$(document).on('click', '.show_users', function() {
		if (!($("table#manage_tbl").hasClass("dataTable"))) {
			$('#manage_tbl').dataTable({
				"paging": true,
				"searching": true,
				"bInfo": true,
				"responsive": true,
				"pageLength": 50,
				"columnDefs": [{
						"responsivePriority": 1,
						"targets": 0
					},
					{
						"responsivePriority": 2,
						"targets": -1
					},
				]
			});
		}
	});

	// document.addEventListener('DOMContentLoaded', function() {
	// 	var tabLinks = document.querySelectorAll('.nav-tabs a.nav-link');
	// 	tabLinks.forEach(function(tabLink) {
	// 		tabLink.addEventListener('click', function(event) {
	// 			event.preventDefault();
	// 			var targetTabId = tabLink.getAttribute('href');
	// 			var tabParamsMap = {
	// 				'#tab-1': 'details',
	// 				'#tab-2': 'users',
	// 				'#tab-3': 'billing'
	// 			};
	// 			var tabParam = tabParamsMap[targetTabId];
	// 			var currentUrl = new URL(window.location.href);
	// 			currentUrl.searchParams.set('tab', tabParam);
	// 			history.replaceState(null, null, currentUrl);
	// 			$(targetTabId).tab('show');
	// 		});
	// 	});

	// 	// Need to show the tab based on the query param from url
	// 	var urlParams = new URLSearchParams(window.location.search);
	// 	var activeTab = urlParams.get('tab');
	// 	var tabParamsMap = {
	// 		'#tab-1': 'details',
	// 		'#tab-2': 'users',
	// 		'#tab-3': 'billing'
	// 	};

	// 	if (activeTab) {
	// 		var targetTabId = null;
	// 		for (var tab in tabParamsMap) {
	// 			if (tabParamsMap[tab] === activeTab) {
	// 				targetTabId = tab;
	// 				break;
	// 			}
	// 		}
	// 		if (targetTabId) {
	// 			$(targetTabId).tab('show');
	// 		}
	// 	}
	// });
</script>
@endpush