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
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 10%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">User Name <i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('first_name')"></i>
            </th>
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 12%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Total Amount<i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('total_amount')"></i>
            </th>
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 12%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Paid Amount<i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('discount_amount')"></i>
            </th>

            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 8%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Year<i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('year')"></i>
            </th>
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 8%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Month<i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('month')"></i>
            </th>
            
            
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 12%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Bill No <i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('bill_no')"></i>
            </th>
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 12%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Paid Date <i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('updated_at')"></i>
            </th>

           
            
            <th class="align-center" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 10%;"
                aria-label="Status: activate to sort column ascending">Status</th>

            <th class="align-center" rowspan="1" colspan="1" style="width: 15%;" aria-label="Actions">Actions</th>
        </tr>

        <tr class="filter">
            <th>
                <x-admin.input type="search" wire:model.defer="searchUser" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>
                <x-admin.input type="search" wire:model.defer="searchAmount" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>
                <x-admin.input type="search" wire:model.defer="searchPaidAmount" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>
                <x-admin.input type="search" wire:model.defer="searchYear" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>
                <x-admin.input type="search" wire:model.defer="searchMonth" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
           
           
            <th>
                <x-admin.input type="search" wire:model.defer="searchBill" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>
                <x-admin.input type="search" wire:model.defer="searchPaidDate" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>
                <select class="form-control form-control-sm form-filter kt-input" wire:model.defer="searchStatus"
                    title="Select" data-col-index="2">
                    <option value="-1">Select</option>
                    <option value="1">Paid</option>
                    <option value="0">Due</option>
                </select>
            </th>
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
        @forelse($details as $item)
            <tr role="row" class="odd">
                @if (isset($item->user->first_name))
                    <td>{{ $item->user->first_name }} {{ $item->user->last_name }}</td>
                @else 
                    <td></td>
                @endif
                    <td>{{ $item->total_amount }}</td>
                    <td>{{ $item->discount_amount }}</td>
                    <td>{{ $item->year }}</td>
                    <td>{{ $item->month }}</td>
                    <td>{{ $item->bill_no }}</td>
                    <td>{!! \Carbon\Carbon::parse($item->updated_at)->format('d M Y') !!}</td>
                <td class="align-center"><span
                        class="kt-badge  kt-badge--{{ $item->active  == 1 ? 'success' : 'warning' }} kt-badge--inline cursor-pointer"
                        wire:click="changeStatusConfirm({{ $item->id }})">{{ $item->active  == 1 ? 'Active' : 'Deactive' }}</span>
                </td>
                <x-admin.td-action>
                <a class="dropdown-item" href="{{route('puja-collection.show', ['puja_collection' => $item->id])}}" ><i class="la la-eye"></i> Show</a>
                <a class="dropdown-item" href="{{route('puja-collection.edit', ['puja_collection' => $item->id])}}" ><i class="la la-edit"></i> Edit</a>
                </x-admin.td-action>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="align-center">No records available</td>
            </tr>
        @endforelse

    </x-slot>
    <x-slot name="pagination">
        {{ $details->links() }}
    </x-slot>
    <x-slot name="showingEntries">
        Showing {{ $details->firstitem() ?? 0 }} to {{ $details->lastitem() ?? 0 }} of {{ $details->total() }} entries
    </x-slot>
</x-admin.table>
