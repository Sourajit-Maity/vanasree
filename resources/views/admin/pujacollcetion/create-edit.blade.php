<x-admin-layout title="Puja Collcetion Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $pujacollcetion ? 'Edit' : 'Add' }} Puja Collcetion">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('puja-collection.index') }}" value="Puja Collcetion List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $pujacollcetion ? 'Edit' : 'Add' }} Puja Collcetion" />

				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:admin.puja-collection.puja-collcetion-create-edit :pujacollcetion="$pujacollcetion"/>
</x-admin-layout>