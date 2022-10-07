<x-admin-layout title="Monthly Expenses Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $monthlyexpense? 'Edit' : 'Add' }} Monthly Expenses">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('monthly-expenses.index') }}" value="Monthly Expenses List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $monthlyexpense ? 'Edit' : 'Add' }} Monthly Expenses" />

				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:admin.monthly-expenses.monthly-expenses-creat-edit :monthlyexpense="$monthlyexpense"/>
</x-admin-layout>