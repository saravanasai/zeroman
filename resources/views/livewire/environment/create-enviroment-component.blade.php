<div>
    <title>Zeroman - Environment Create</title>
    <div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">

        </div>
        <div class="row">
            <div class="col-12 col-xl-8">
                <div class="card card-body border-0 shadow mb-4">
                    <h2 class="h5 mb-4">Create New Environment</h2>
                    <form wire:submit.prevent="save">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div>
                                    <label for="first_name">Environment Name</label>
                                    <input wire:model="environment.name" class="form-control" id="first_name"
                                        type="text" placeholder="Enter enviroment name" >
                                </div>
                            </div>

                        </div>

                        <div class="mt-3 d-flex justify-content-end">
                            <a href="{{ route('environment') }}" class="btn btn-danger mt-2 animate-up-2 mx-2">back</a>
                            <button type="submit" class="btn btn-gray-800 mt-2 animate-up-2 mx-2">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
