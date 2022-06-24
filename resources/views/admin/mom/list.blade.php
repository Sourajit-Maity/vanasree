<x-admin-layout title="Minutes of the Meeting Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Minutes of the Meeting List">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('moms.index') }}" value="Minutes of the Meeting List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					<a href="{{route('moms.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						Add New Minutes of the Meeting
					</a>
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:admin.mom.mom-list/>
</x-admin-layout>