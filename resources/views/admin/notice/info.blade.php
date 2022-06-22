<x-admin-layout title="Notice Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Notice Details">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('admin.notice.info', ['nurse' => $nurse_id]) }}" value="Notice Details" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
				</x-slot>
			</x-admin.sub-header> 
    </x-slot>

	@livewire('admin.nurse.nurse-details', ['nurse_id' => $nurse_id])

</x-admin-layout>