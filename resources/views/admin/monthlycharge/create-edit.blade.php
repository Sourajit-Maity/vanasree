<x-admin-layout title="Monthly Collcetion Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $monthlycharge ? 'Edit' : 'Add' }} Monthly Collcetion">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('monthly-charge.index') }}" value="Monthly Collcetion List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $monthlycharge ? 'Edit' : 'Add' }} Monthly Collcetion" />

				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:admin.monthly-charge.monthly-charge-create-edit :monthlycharge="$monthlycharge"/>
</x-admin-layout>