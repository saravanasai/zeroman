<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;


class Profile extends Component
{
    use LivewireAlert;
    public User $user;


    public function rules()
    {

        return [
            'user.first_name' => 'max:15',
            'user.last_name' => 'max:20',
            'user.email' => 'email',
            'user.gender' => ['required', Rule::in(['Male', 'Female', 'Other'])]
        ];
    }

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function save()
    {
        $this->validate();

        $this->user->save();

        $this->alert('success', 'Profile Saved Successfully');
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
