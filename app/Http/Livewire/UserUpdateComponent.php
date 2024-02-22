<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class UserUpdateComponent extends Component
{
    use LivewireAlert;
    public User $user;

    public $isResetPassword = false;

    public $newPassword = null;

    public function rules()
    {
        return [
            'user.first_name' => ['required', 'max:15'],
            'user.last_name' => ['required', 'max:20'],
            'user.email' => ['email', 'unique:users,email,'.$this->user->id.',id'],
            'user.is_admin' => ['required'],
            'user.gender' => ['required', Rule::in(['Male', 'Female', 'Other'])],

        ];
    }

    public function mount($id)
    {
        $this->user =  User::findorFail($id);
    }

    public function toogleResetPassword()
    {

        $this->isResetPassword = !$this->isResetPassword;
    }

    public function saveNewPassword()
    {
        $this->validate();

        $this->user->password = Hash::make($this->newPassword);

        $this->user->save();

        $this->alert('success', 'User password updated Successfully');

        return redirect()->route('users');
    }

    public function save()
    {

        $this->validate();

        $this->user->save();

        $this->alert('success', 'User updated Successfully');

        return redirect()->route('users');
    }

    public function delete()
    {

        $this->user->delete();

        $this->alert('success', 'User deleted Successfully');

        return redirect()->route('users');
    }

    public function render()
    {
        return view('livewire.user-update-component');
    }
}
