<x-admin-layout title="Gallery Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $gallery ? 'Edit' : 'Add' }} Gallery">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('gallery.index') }}" value=" Gallery List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $gallery ? 'Edit' : 'Add' }} Gallery" />

				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	@livewire('admin.master.service.design-add', ['gallery' => $gallery, 'design'=>$design])

	<!-- <livewire:admin.master.service.service-master-create-edit :gallery="$gallery"/> -->
</x-admin-layout> 