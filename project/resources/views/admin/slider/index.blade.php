@extends('layouts.admin')

@section('content')
					<input type="hidden" id="headerdata" value="SLIDER">
					<div class="content-area">
						<div class="mr-breadcrumb">
							<div class="row">
								<div class="col-lg-12">
										<h4 class="heading">Sliders</h4>
										<ul class="links">
											<li>
												<a href="{{ route('admin.dashboard') }}">Dashboard </a>
											</li>
											<li>
												<a href="{{ route('admin-sldr-index') }}">Slider Management</a>
											</li>
										</ul>
								</div>
							</div>
						</div>
						<div class="product-area">
							<div class="row px-4 pb-4">
								<div class="col-lg-12">
									<div class="card">
											<div class="card-header" style="background-color: #2d3274;">
												<h4 class="text-uppercase text-white mb-0">Sliders</h4>
											</div>
											<div class="card-body">
												<div class="mr-table allproduct">

													<div class="table-responsiv">
														<table id="geniustable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
															<thead>
																<tr>
																	<th>Image</th>
																	<!-- <th>Name</th> -->
																	<th>Actions</th>
																</tr>
															</thead>
														</table>
													</div>
												</div>
											</div>
									</div>
								</div>
							</div>
						</div>
					</div>

{{-- ADD / EDIT MODAL --}}

<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">

	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
				<div class="submit-loader">
						<img  src="{{asset('assets/images/spinner.gif')}}" alt="">
				</div>
			<div class="modal-header">
				<h5 class="modal-title"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

{{-- ADD / EDIT MODAL ENDS --}}


{{-- DELETE MODAL --}}

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

		<div class="modal-header d-block text-center">
			<h4 class="modal-title d-inline-block">Confirm Delete</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
		</div>

		<!-- Modal body -->
		<div class="modal-body">
				<p class="text-center">You are about to delete this Testimonial.</p>
				<p class="text-center">Do you want to proceed?</p>
		</div>

		<!-- Modal footer -->
		<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<a class="btn btn-danger btn-ok">Delete</a>
		</div>

		</div>
	</div>
</div>

{{-- DELETE MODAL ENDS --}}

@endsection


@section('scripts')


<script type="text/javascript">

	var table = $('#geniustable').DataTable({
		ordering: false,
		processing: true,
		serverSide: true,
		ajax: '{{ route('admin-sldr-datatables') }}',
		columns: [
			{ data: 'image', name: 'image' },
			{ data: 'action', searchable: false, orderable: false }
		],
		language : {
			processing: '<img src="{{asset('assets/images/spinner.gif')}}">'
		},
		drawCallback : function( settings ) {
				$('.select').niceSelect();
		}
	});

	$(function() {
		$(".btn-area").append('<div class="col-sm-4 table-contents">'+
			'<a class="add-btn" data-href="{{route('admin-sldr-create')}}" id="add-data" data-toggle="modal" data-target="#modal1">'+
			'<i class="fas fa-plus"></i> Add New Slider'+
			'</a>'+
			'</div>');
	});


</script>

@endsection
