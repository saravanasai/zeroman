<div>
    <title>Zeroman - Profile</title>
    <div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">

        </div>
        <div class="row">
            <div class="col-12 col-xl-8">
                <div class="card card-body border-0 shadow mb-4">
                    <h2 class="h5 mb-4">General information</h2>
                    <form wire:submit.prevent="save">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div>
                                    <label for="first_name">First Name</label>
                                    <input wire:model="user.first_name" class="form-control" id="first_name"
                                        type="text" placeholder="Enter your first name" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div>
                                    <label for="last_name">Last Name</label>
                                    <input wire:model="user.last_name" class="form-control" id="last_name"
                                        type="text" placeholder="Also your last name">
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input wire:model="user.email" class="form-control" id="email" type="email"
                                        placeholder="name@company.com" disabled>
                                </div>
                                @error('email')
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
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-gray-800 mt-2 animate-up-2">Save All</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
