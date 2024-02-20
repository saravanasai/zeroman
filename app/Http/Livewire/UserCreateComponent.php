<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class UserCreateComponent extends Component
{
    use LivewireAlert;
    public User $user;


    public function rules()
    {
        return [
            'user.first_name' => ['required','max:15'],
            'user.last_name' => ['required','max:20'],
            'user.email' => ['email','unique:users,email'],
            'user.password' => ['required','max:15'],
            'user.gender' => ['required', Rule::in(['Male', 'Female', 'Other'])]
        ];
    }

    public function mount()
    {
        $this->user = new User();

    }

    public function save()
    {
        $this->validate();

        $this->user->password = Hash::make($this->user->password);
        $this->user->is_admin = 0;
        $this->user->save();

        $this->alert('success', 'New User Created Successfully');

        return redirect()->route('users');
    }

    public function render()
    {
        return view('livewire.user-create-component');
    }
}
