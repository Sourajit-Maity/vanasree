<x-admin.table>
  
    <x-slot name="perPage">
        <label>Show
            <x-admin.dropdown wire:model="perPage" class="custom-select custom-select-sm form-control form-control-sm">
                @foreach ($perPageList as $page)
                    <x-admin.dropdown-item :value="$page['value']" :text="$page['text']" />
                @endforeach
            </x-admin.dropdown> entries
        </label>
    </x-slot>

    <x-slot name="thead">
        <tr role="row">
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 12%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Full Name <i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('full_name')"></i>
            </th>
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 8%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Email <i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('email')"></i>
            </th>
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 8%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Phone <i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('phone')"></i>
            </th>

            <!-- <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 10%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Subject <i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('subject')"></i>
            </th> -->
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 10%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Message <i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('message')"></i>
            </th>
            <!-- <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 8%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">State <i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('state')"></i>
            </th>
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 8%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">City <i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('city')"></i>
            </th>
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 10%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Address <i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('address')"></i>
            </th> -->
            <!-- <th class="align-center" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 8%;"
                aria-label="Status: activate to sort column ascending">Status</th> -->
                <th class="align-center" rowspan="1" colspan="1" style="width: 15%;" aria-label="Actions">Actions</th>
        </tr>

        <tr class="filter">
            <th>
                <x-admin.input type="search" wire:model.defer="searchFullname" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>
                <x-admin.input type="search" wire:model.defer="searchEmail" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>
                <x-admin.input type="search" wire:model.defer="searchPhone" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <!-- <th>
                <x-admin.input type="search" wire:model.defer="searchSubject" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th> -->
            <th>
                <x-admin.input type="search" wire:model.defer="searchMessage" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <!-- <th>
                <x-admin.input type="search" wire:model.defer="searchState" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>
                <x-admin.input type="search" wire:model.defer="searchCity" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>
                <x-admin.input type="search" wire:model.defer="searchAddress" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th> -->
            <!-- <th>
                <select class="form-control form-control-sm form-filter kt-input" wire:model.defer="searchStatus"
                    title="Select" data-col-index="2">
                    <option value="-1">Select</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </th> -->
            <th>
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-brand kt-btn btn-sm kt-btn--icon" wire:click="search">
                            <span>
                                <i class="la la-search"></i>
                                <span>Search</span>
                            </span>
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-secondary kt-btn btn-sm kt-btn--icon" wire:click="resetSearch">
                            <span>
                                <i class="la la-close"></i>
                                <span>Reset</span>
                            </span>
                        </button>
                    </div>
                </div>
            </th>
        </tr>
    </x-slot>

    <x-slot name="tbody">
        @forelse($contactusforms as $contactusform)
            <tr role="row" class="odd"> 
                <td class="sorting_1" tabindex="0">{{ $contactusform->full_name  }}</td>
                <td class="sorting_1" tabindex="0">{{ $contactusform->email  }}</td>
                <td class="sorting_1" tabindex="0">{{ $contactusform->phone  }}</td>
                <!-- <td class="sorting_1" tabindex="0">{{ $contactusform->subject  }}</td> -->
                <td class="sorting_1" tabindex="0">{{ Str::limit($contactusform->message , 25) }}</td>
                <!-- <td class="sorting_1" tabindex="0">{{ $contactusform->state  }}</td> -->
                <!-- <td class="sorting_1" tabindex="0">{{ $contactusform->city  }}</td> -->
                <!-- <td class="sorting_1" tabindex="0">{{ $contactusform->address  }}</td> -->
                <!-- <td class="align-center"><span
                        class="kt-badge  kt-badge--{{ $contactusform->active == 1 ? 'success' : 'warning' }} kt-badge--inline kt-badge--pill cursor-pointer"
                        wire:click="changeStatusConfirm({{ $contactusform->id }})">{{ $contactusform->active == 1 ? 'Active' : 'Inactive' }}</span>
                </td> -->
                <x-admin.td-action>
                    <a class="dropdown-item" href="{{ route('contact-form.edit', ['contact_form' => $contactusform->id]) }}"><i
                            class="la la-edit"></i> View</a>
                    <button href="#" class="dropdown-item" wire:click="deleteAttempt({{ $contactusform->id }})"><i
                            class="fa fa-trash"></i> Delete</button>
                </x-admin.td-action>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="align-center">No records available</td>
            </tr>
        @endforelse
    </x-slot>
    <x-slot name="pagination">
        {{ $contactusforms->links() }}
    </x-slot>
    <x-slot name="showingEntries">
        Showing {{ $contactusforms->firstitem() }} to {{ $contactusforms->lastitem() }} of {{ $contactusforms->total() }} entries
    </x-slot>
</x-admin.table>
