<div>
    <title>Zeroman - Environment</title>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <h2 class="h4">Environment List</h2>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{route('environment.create')}}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                New Environment
            </a>
        </div>
    </div>
    <div class="table-settings mb-4">
        <div class="row justify-content-between align-items-center">
            <div class="col-9 col-lg-8 d-md-flex">
                <div class="input-group me-2 me-lg-3 fmxw-300">
                <span class="input-group-text">
                    <svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                              clip-rule="evenodd"></path>
                    </svg>
                </span>
                    <input wire:model.debounce.500ms="search" type="text" class="form-control" placeholder="Search Environment">
                </div>
                <select wire:model="isActive" class="form-select fmxw-200 d-none d-md-inline" aria-label="Message select example 2">
                    <option selected value="">All</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
        </div>
    </div>
    <div class="card card-body shadow border-0 table-wrapper table-responsive">
        <table class="table user-table table-hover align-items-center">
            <thead>
            <tr>
                <th class="border-bottom">Id</th>
                <th class="border-bottom">Name</th>
                <th class="border-bottom">Created By</th>
                <th class="border-bottom">Created At</th>
                <th class="border-bottom">Status</th>
                <th class="border-bottom">Action</th>
            </tr>
            </thead>
            <tbody>

            @forelse($environments as $environment)
                <tr>
                    <td><span class="fw-normal">{{$environment->id}}</span></td>
                    <td>
                        <a href="#" class="d-flex align-items-center">
                            <div class="d-block">
                                <span class="fw-bold">{{$environment->name}}</span>

                            </div>
                        </a>
                    </td>
                    <td><span class="fw-normal">{{$environment->name ? 'Admin' : 'User'}}</span></td>
                    <td><span class="fw-normal d-flex align-items-center">{{$environment->created_at->diffForHumans()}}</span></td>
                    <td><span class="fw-normal text-{{$environment->is_active ? 'success' : 'error'}}">{{$environment->is_active ? 'Active' : 'In-Active'}}</span></td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                    </path>
                                </svg>
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>

                                <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
                                    <a class="dropdown-item d-flex align-items-center" href="{{route('environment.show',[$environment->id])}}">
                                        <span class="fas fa-user-shield me-2"></span>
                                        View Details
                                    </a>
                                    @if(auth()->user()->is_admin)
                                    <a class="dropdown-item text-danger d-flex align-items-center" href="#">
                                        <span class="fas fa-user-times me-2"></span>
                                        Delete
                                    </a>
                                    @endif
                                </div>

                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No Data Found</td>
                </tr>
            @endforelse

            </tbody>

        </table>
        <div class="flex-end mt-5">
            {{ $environments->links('pagination::bootstrap-5') }}
        </div>

    </div>

</div>

