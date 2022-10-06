
<x-admin-layout title="Monthly Collcetion Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Monthly Collcetion Details">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('monthly-charge.index') }}" value="Monthly Collcetion List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:admin.monthly-charge.monthly-charge-details :monthlycharge="$monthlycharge"/>
</x-admin-layout>