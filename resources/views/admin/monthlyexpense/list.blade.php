<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />


<x-admin-layout title="Monthly Expenses Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Monthly Expenses List">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('monthly-expenses.index') }}" value="Monthly Expenses List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					<a href="{{asset('test_data/bill_test_data.xlsx')}}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-download"></i>
						Download Dummy Excel File
					</a>
					<a href="" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="modal" data-target="#uploadModal">
						<i class="la la-upload"></i>
						Upload Excel File
					</a>
					<a href="{{route('monthly-expenses.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						Add New Details
					</a>
				</x-slot>
			</x-admin.sub-header>

			<!-- The Modal -->
			<div class="modal" id="uploadModal">
				<div class="modal-dialog">
					<div class="modal-content">

						<!-- Modal Header -->
						<div class="modal-header">
							<h4 class="modal-title">Upload Processing</h4>
							<button type="button" class="close" data-dismiss="modal"></button>
						</div>

						<!-- Modal body -->
						<div class="modal-body">
							<form method="POST" id="modalform" action="{{ route('monthly-expenses.store') }}"  enctype="multipart/form-data">
								@csrf
							
								<div class="form-group">
									<strong>Choose File:</strong>
									<input type="file" name="file" class="form-control">
								</div>
							
							</form>
						</div>

						<!-- Modal footer -->
						<div class="modal-footer">
							<button type="submit" form="modalform"  class="btn btn-primary">Upload</button>
						</div>

					</div>
				</div>
			</div>
    </x-slot>
    <livewire:admin.monthly-expenses.monthly-expenses-list/>
</x-admin-layout>




