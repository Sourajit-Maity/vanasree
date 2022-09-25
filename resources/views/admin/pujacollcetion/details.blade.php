
<x-admin-layout title="Puja Collcetion Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Puja Collcetion Details">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('puja-collection.index') }}" value="Puja Collcetion List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:admin.puja-collection.puja-collcetion-details :pujacollcetion="$pujacollcetion"/>
</x-admin-layout>