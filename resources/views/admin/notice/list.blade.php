<x-admin-layout title="Circular/Notice Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Circular/Notice List">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('notice.index') }}" value="Circular/Notice List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					<a href="{{route('notice.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						Add New Circular/Notice
					</a>
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:admin.notice.notice-list/>
</x-admin-layout>