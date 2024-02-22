<div>
    <title>Zeroman - User Update</title>
    <div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">

        </div>
        <div class="row">
            <div class="col-12 col-xl-8">
                <div class="card card-body border-0 shadow mb-4">
                    <h2 class="h5 mb-4">Update User</h2>
                    <form wire:submit.prevent="save">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div>
                                    <label for="first_name">First Name</label>
                                    <input wire:model="user.first_name" class="form-control" id="first_name"
                                        type="text" placeholder="Enter first name" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div>
                                    <label for="last_name">Last Name</label>
                                    <input wire:model="user.last_name" class="form-control" id="last_name"
                                        type="text" placeholder="Enter last name">
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input wire:model="user.email" class="form-control" id="email" type="email"
                                        placeholder="name@company.com">
                                </div>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input wire:model="newPassword" class="form-control" id="password"
                                        placeholder="Enter your password" type="text"
                                        {{ $isResetPassword ? '' : 'disabled' }}>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="gender">Gender</label>
                                <select wire:model="user.gender" class="form-select mb-0" id="gender"
                                    aria-label="Gender select example">
                                    <option selected>Choose...</option>
                                    <option value="Female">Female</option>
                                    <option value="Male">Male</option>
                                    <option value="Other">Other</option>
                                </select>
                                @error('user.gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="isAdmin">Is Admin</label>
                                <select wire:model="user.is_admin" class="form-select mb-0" id="isAdmin"
                                    aria-label="Gender select example">
                                    <option value="1">Admin</option>
                                    <option value="0">User</option>
                                </select>
                                @error('user.is_admin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3 d-flex justify-content-end">
                            <button wire:click="toogleResetPassword" type="button"
                                class="btn btn-{{ $isResetPassword ? 'danger' : 'gray-800' }} mt-2 animate-up-2 mx-1">
                                {{ $isResetPassword ? 'Cancel' : 'Reset Password' }}</button>
                            @if ($isResetPassword)
                                <button wire:click="saveNewPassword" type="button"
                                    class="btn btn-gray-800 mt-2 animate-up-2 mx-1">Save New
                                    Password</button>
                            @endif
                            <button type="submit"
                                class="btn btn-gray-800 mt-2 animate-up-2 mx-1">Update</button>

                                <button wire:click="delete" type="button"
                                class="btn btn-danger mt-2 animate-up-2 mx-1">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
