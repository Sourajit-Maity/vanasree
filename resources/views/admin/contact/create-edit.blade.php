<x-admin-layout title="Contact Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $contact ? 'View' : 'Add' }} contact">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('contact-form.index') }}" value="Contact List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $contact ? 'View' : 'Add' }} contact" />

				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:admin.contact.contact-create-edit :contact="$contact"/>
</x-admin-layout>