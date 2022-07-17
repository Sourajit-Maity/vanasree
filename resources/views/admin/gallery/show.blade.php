<x-admin-layout title="Gallery Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Image List">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('gallery.index') }}" value="Image List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					<a href="{{route('gallery.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						Add New Gallery 
					</a>
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:admin.master.service.design-list :design="$design"/>
</x-admin-layout>