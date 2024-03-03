<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ClientHomeComponent extends Component
{
    use LivewireAlert;
    public array $queryParams = [];
    public string $requestMethod = "GET";



    public string $url = "http://jsonplaceholder.typicode.com/todos?id=45";
    public $requestResponse = [];

    public string $queryStringbuilder = "";

    public function mount()
    {
        $this->loadInitialValues();
    }


    public function loadInitialValues()
    {
        $this->queryParams[0]['key'] = "";
        $this->queryParams[0]['value'] = "";
        $this->queryParams[0]['description'] = "";
    }
    public function handleAddQueryParams()
    {
        $newKey = count($this->queryParams);
        $this->queryParams[$newKey]['key'] = "";
        $this->queryParams[$newKey]['value'] = "";
        $this->queryParams[$newKey]['description'] = "";
    }

    public function handleRemoveQueryParams($index)
    {
        unset($this->queryParams[$index]);
        $this->updatedQueryParams();
    }

    protected function updatedUrl()
    {
        $tempUrl = explode("?", $this->url);

        $tempQueryUrl = explode("&", @$tempUrl[1] ?? "");


        foreach ($tempQueryUrl as $key => $value) {
            $tempVals = explode("=", $value);
            $this->queryParams[$key]['key'] = $tempVals[0] ?? "";
            $this->queryParams[$key]['value'] = $tempVals[1] ?? "";
            $this->queryParams[$key]['description'] = $tempVals[2] ?? "";
        }
    }

    protected function updatedQueryParams()
    {
        $this->queryStringbuilder = "";

        $temp = explode("?", $this->url);

        if ($this->queryParams[0]['key'] === "") {
            $this->url =  $temp[0]  . $this->queryStringbuilder;
            return;
        }

        foreach ($this->queryParams as $key => $value) {

            $build = !$key ? "?" : "&";

            $this->queryStringbuilder = $this->queryStringbuilder . $build .
                $this->queryParams[$key]['key'] . "=" .
                $this->queryParams[$key]['value'];
        }

        $this->url =  $temp[0]  . $this->queryStringbuilder;
    }

    public function handleRequest()
    {

        if ($this->requestMethod === "") {
            $this->alert('error', 'Please choose a request method');
            return;
        }

        if ($this->requestMethod === "GET") {

            $response = Http::acceptJson()
                ->get($this->url);


            if ($response->successful()) {
                $this->requestResponse = $response->json();
                $this->dispatchBrowserEvent('response-added');
            }
        }
    }
    public function render()
    {
        return view('livewire.client-home-component');
    }
}
