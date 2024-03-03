<div>
    <title>Zeroman | Environment Variables</title>

    <div class="card border-0 shadow mb-4 mt-4">
        <div class="card-header">

            <div class="d-flex justify-content-between">
                <div class="mt-2">
                    Environment variables - {{ $environment->name }}
                </div>
                <div>
                    <button wire:click="handleAddRow" type="button" class="btn btn-primary mx-2" type="button">Add New Row</button>
                    <button wire:click="save" type="button" class="btn btn-primary mx-2" type="button">Save</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">#</th>
                            <th class="border-0">key</th>
                            <th class="border-0">value</th>
                            <th class="border-0">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($variables as $key => $variable)
                            <tr>
                                <td><a href="#" class="text-primary fw-bold">{{ $loop->iteration }}</a> </td>
                                <td>
                                    <input wire:model="variables.{{ $key }}.key"
                                        name="variables[{{ $key }}][key]" type="text" class="form-control"
                                        id="{{ $key }}_key">
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="{{ $key + 1 }}_value"
                                        wire:model="variables.{{ $key }}.value"
                                        name="variables[{{ $key }}][value]">
                                </td>
                                <td>
                                    <button  {{ $loop->first ? 'disabled' : '' }} wire:click="handleRemoveRow({{$key}})" type="button" class="btn btn-primary" type="button">Remove</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
