<div>
    <title>Zeroman | Client</title>
    <div class="row mt-2">
        <div class="col-12 mb-2">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    <div class="row mb-1">
                        <div class="col-lg-1 col-sm-6 mt-2">
                            <div class="mb-4">
                                <select wire:model="requestMethod" class="form-select" id="country" aria-label="Method">
                                    <option selected>Method</option>
                                    <option value="GET">GET</option>
                                    <option value="POST">POST</option>
                                    <option value="PUT">PUT</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-8 col-sm-6 mt-2">
                            <div class="mb-4">
                                <input wire:model="url" type="text" class="form-control" id="url"
                                    placeholder="http://example.com/">
                            </div>
                        </div>
                        <div class="col-lg-1 col-sm-6">
                            <div class="mb-4">
                                <button wire:click="handleRequest" type="button"
                                    class="btn  btn-primary d-inline-flex align-items-center">
                                    Send
                                    <span wire:loading wire:target="handleRequest">
                                        ...
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6 mt-2">
                            <div class="mb-4">
                                <select wire:model="choosedEnvironmentId" class="form-select" id="choosed_environment" aria-label="Method">
                                    <option value="0">Environment</option>
                                    @foreach ($envrionments as $key => $environment)
                                    <option value="{{ $environment->id}}">{{$environment->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- Tab -->
                            <nav>
                                <div class="nav nav-tabs mb-2" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                        href="#nav-home" role="tab" aria-controls="nav-home"
                                        aria-selected="true">Params</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                        href="#nav-profile" role="tab" aria-controls="nav-profile"
                                        aria-selected="false">Authorization</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                        href="#nav-contact" role="tab" aria-controls="nav-contact"
                                        aria-selected="false">Body</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab">
                                    <div class="table-responsive">
                                        <table class="table table-centered table-nowrap mb-0 rounded">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th class="border-0 rounded-start">Key</th>
                                                    <th class="border-0">Value</th>
                                                    <th class="border-0">Description</th>
                                                    <th class="border-0">Action
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($queryParams as $key => $value)
                                                    <!-- Item -->
                                                    <tr>
                                                        <td class="border-0">
                                                            <input wire:model="queryParams.{{ $key }}.key"
                                                                name="queryParams[{{ $key }}][key]"
                                                                type="text" class="form-control"
                                                                id="{{ $key }}_key_queryParams">
                                                        </td>
                                                        <td class="border-0">
                                                            <input wire:model="queryParams.{{ $key }}.value"
                                                                name="queryParams[{{ $key }}][value]"
                                                                type="text" class="form-control"
                                                                id="{{ $key }}_value_queryParams">
                                                        </td>

                                                        <td class="border-0">
                                                            <input
                                                                wire:model="queryParams.{{ $key }}.description"
                                                                name="queryParams[{{ $key }}][description]"
                                                                type="text" class="form-control"
                                                                id="{{ $key }}_description_queryParams">
                                                        </td>
                                                        <td class="border-0">

                                                            @if ($loop->last)
                                                                <button {{ $loop->first ? 'disabled' : '' }}
                                                                    wire:click="handleRemoveQueryParams({{ $key }})"
                                                                    type="button"
                                                                    class="btn btn-sm btn-primary">Remove</button>
                                                                <button wire:click="handleAddQueryParams" type="button"
                                                                    class="btn btn-sm btn-primary">Add</button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <!-- End of Item -->
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                    aria-labelledby="nav-profile-tab">
                                    <p>Coming Soon.....</p>
                                </div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                    aria-labelledby="nav-contact-tab">
                                    <p>Coming Soon.....</p>
                                </div>
                            </div>
                            <!-- End of tab -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section ">
                <div class="card-header">
                    <h6>Response Body</h6>
                </div>

                <div class="card-body">
                    <div class="row mb-1">
                        <div class="col-lg-12 col-sm-6 mt-2">
                            <div class="mb-4 ">
                                <pre><code class="language-javascript" id="application-code"> {{ json_encode($requestResponse, JSON_PRETTY_PRINT) }}</code></pre>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <style>
        .nav-tabs .nav-link {
            border: 0;
            padding: 0.3rem 1rem;
            background-color: #ffffff;
        }
    </style>

    <script>
        window.addEventListener('response-added', () => {

            let precode = document.getElementById('application-code')

            Prism.highlightElement(precode);

        });
    </script>
</div>
