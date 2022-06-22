<x-admin-layout title="Meeting of Minutes Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $mom ? 'Edit' : 'Add' }} Meeting of Minutes">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('moms.index') }}" value="Meeting of Minutes List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $mom ? 'Edit' : 'Add' }} Meeting of Minutes" />

				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:admin.mom.mom-create-edit :mom="$mom"/> 
</x-admin-layout>