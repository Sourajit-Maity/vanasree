<x-admin-layout title="Circular/Notice Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $notice ? 'Edit' : 'Add' }} Circular/Notice">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('notice.index') }}" value="Circular/Notice List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $notice ? 'Edit' : 'Add' }} Circular/Notice" />

				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:admin.notice.notice-create-edit :notice="$notice"/> 
</x-admin-layout>