<?php

namespace App\Http\Livewire\Environment;

use App\Models\Environment;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class EnvironmentListComponent extends Component
{
    use LivewireAlert;
    use WithPagination;
    public string $search = '';
    public string $isActive = '';

    public function updatingIsActive()
    {
        $this->resetPage();
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteEnvironment(int $id)
    {
        $environment = Environment::find($id);

        $environment->variables()->delete();
        $environment->delete();
        $this->resetPage();
        $this->alert('success', 'Environment Successfully');
    }
    public function render()
    {
        $environments = Environment::query()->with(['user'])
            ->when($this->isActive != '', function ($q) {
                return $q->where('is_active', (int) $this->isActive);
            })
            ->when($this->search, function ($q) {
                return $q->where('name', 'like', '%' . $this->search . '%');
            })
            ->orderBy('id', 'DESC')
            ->paginate(request()->get('show') ?? 10);


        return view('livewire.environment.environment-list-component', ["environments" => $environments]);
    }
}
