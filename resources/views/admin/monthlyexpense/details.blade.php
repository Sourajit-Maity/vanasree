
<x-admin-layout title="Monthly Expenses Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Monthly Expenses Details">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('monthly-expenses.index') }}" value="Monthly Expenses List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:admin.monthly-expenses.monthly-expenses-details :monthlyexpense="$monthlyexpense"/>
</x-admin-layout>