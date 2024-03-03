<?php

namespace App\Http\Livewire\Environment;

use App\Models\Environment;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CreateEnviromentComponent extends Component
{
    use LivewireAlert;
    public Environment $environment;


    public function rules()
    {
        return [
            'environment.name' => ['required', 'max:15'],
        ];
    }

    public function mount()
    {
        $this->environment = new Environment();
    }

    public function save()
    {
        $this->validate();

        $this->environment->user_id = auth()->user()->id;

        $newEnvironment = Environment::create($this->environment->toArray());

        $this->alert('success', 'New Enviromment Created Successfully');

        return redirect()->route('environment.show',["id"=>$newEnvironment->id]);
    }
    public function render()
    {
        return view('livewire.environment.create-enviroment-component');
    }
}
