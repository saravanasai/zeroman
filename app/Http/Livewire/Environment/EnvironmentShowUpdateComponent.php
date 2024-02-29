<?php

namespace App\Http\Livewire\Environment;

use App\Models\Environment;
use App\Models\EnvironmentVariables;
use Illuminate\Support\Collection;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class EnvironmentShowUpdateComponent extends Component
{
    use LivewireAlert;
    public $environment;

    public array $variables = [[]];

    public function mount($id)
    {
        $this->environment = Environment::query()->where('id', $id)->first();

        $vars = EnvironmentVariables::query()->select(['id', 'key', 'value'])->where('environment_id', $id)->get();

        foreach ($vars as $key => $value) {
            $this->variables[$key]['key'] = $value->key;
            $this->variables[$key]['value'] = $value->value;
            $this->variables[$key]['id'] = $value->id;
        }
    }

    public function handleRemoveRow($index)
    {
        $isExistingId = @$this->variables[$index]['id'];
        if ($isExistingId) {
            EnvironmentVariables::destroy($isExistingId);
        }

        unset($this->variables[$index]);
    }
    public function handleAddRow()
    {
        $newKey = count($this->variables);
        $this->variables[$newKey]['key'] = "";
        $this->variables[$newKey]['value'] = "";
        $this->variables[$newKey]['id'] = null;
    }
    public function save()
    {

        foreach ($this->variables as $key => $value) {

            EnvironmentVariables::updateOrCreate(['id' => @$this->variables[$key]['id']], [
                'key' => $this->variables[$key]['key'],
                'value' => $this->variables[$key]['value'],
                'environment_id' => $this->environment->id,

            ]);
        }

        $this->alert('success', 'Environment saved Successfully');

        return redirect()->route('environment');
    }
    public function render()
    {
        return view(
            'livewire.environment.environment-show-update-component',
            [
                "environment" => $this->environment,
                "variables" => $this->variables
            ]
        );
    }
}
