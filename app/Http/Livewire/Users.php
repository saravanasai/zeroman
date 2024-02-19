<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
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
    public function render()
    {

        $users = User::query()->basicInfo()
            ->when($this->isActive != '',function ($q) {
                return $q->where('is_active',(int) $this->isActive);
            })
            ->when($this->search,function ($q) {
                return $q->where('first_name', 'like', '%'.$this->search.'%')
                    ->orWhere('last_name', 'like', '%'.$this->search.'%');
            })
            ->paginate(request()->get('show') ?? 10);

        return view('livewire.users',["users"=>$users]);
    }
}
