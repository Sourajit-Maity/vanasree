<x-admin-layout title="Meeting of Minutes Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Meeting of Minutes List">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('moms.index') }}" value="Meeting of Minutes List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					<a href="{{route('moms.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						Add New Meeting of Minutes
					</a>
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:admin.mom.mom-list/>
</x-admin-layout>