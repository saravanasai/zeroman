<title>Volt Laravel Dashboard - User management</title>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <h2 class="h4">Users List</h2>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="#" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                </path>
            </svg>
            New User
        </a>
        {{-- <div class="btn-group ms-2 ms-lg-3">
            <button type="button" class="btn btn-sm btn-outline-gray-600">Share</button>
            <button type="button" class="btn btn-sm btn-outline-gray-600">Export</button>
        </div> --}}
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
                <input type="text" class="form-control" placeholder="Search users">
            </div>
            <select class="form-select fmxw-200 d-none d-md-inline" aria-label="Message select example 2">
                <option selected>All</option>
                <option value="1">Active</option>
                <option value="2">Inactive</option>
                <option value="3">Pending</option>
                <option value="3">Cancelled</option>
            </select>
        </div>
        <div class="col-3 col-lg-4 d-flex justify-content-end">
            <div class="btn-group">
                <div class="dropdown me-1">
                    <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-1"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z">
                            </path>
                        </svg>
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end pb-0">
                        <span class="small ps-3 fw-bold text-dark">Show</span>
                        <a class="dropdown-item d-flex align-items-center fw-bold" href="#">10 <svg
                                class="icon icon-xxs ms-auto" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg></a>
                        <a class="dropdown-item fw-bold" href="#">20</a>
                        <a class="dropdown-item fw-bold rounded-bottom" href="#">30</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card card-body shadow border-0 table-wrapper table-responsive">
    <table class="table user-table table-hover align-items-center">
        <thead>
            <tr>
                <th class="border-bottom">
                    <div class="form-check dashboard-check">
                        <input class="form-check-input" type="checkbox" value="" id="userCheck55">
                        <label class="form-check-label" for="userCheck55">
                        </label>
                    </div>
                </th>
                <th class="border-bottom">Name</th>
                <th class="border-bottom">Role</th>
                <th class="border-bottom">Date Created</th>
                <th class="border-bottom">Status</th>
                <th class="border-bottom">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="form-check dashboard-check">
                        <input class="form-check-input" type="checkbox" value="" id="userCheck1">
                        <label class="form-check-label" for="userCheck1">
                        </label>
                    </div>
                </td>
                <td>
                    <a href="#" class="d-flex align-items-center">
                        <img src="../assets/img/team/profile-picture-1.jpg" class="avatar rounded-circle me-3"
                            alt="Avatar">
                        <div class="d-block">
                            <span class="fw-bold">Admin</span>
                            <div class="small text-gray">admin@volt.com</div>
                        </div>
                    </a>
                </td>
                <td><span class="fw-normal">Admin</span></td>
                <td><span class="fw-normal d-flex align-items-center">15 Jun 2021</span></td>
                <td><span class="fw-normal text-success">Active</span></td>
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
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <span class="fas fa-user-shield me-2"></span>
                                View Details
                            </a>
                            <a class="dropdown-item text-danger d-flex align-items-center" href="#">
                                <span class="fas fa-user-times me-2"></span>
                                Delete user
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
