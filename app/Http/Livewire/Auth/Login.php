<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Login extends Component
{
    use LivewireAlert;
    public $email = '';
    public $password = '';
    public $remember_me = false;

    protected $rules = [
        'email' => 'required|email:rfc,dns',
        'password' => 'required|min:6',
    ];

    //This mounts the default credentials for the admin. Remove this section if you want to make it public.
    public function mount()
    {
        if (auth()->user()) {
            return redirect()->intended('/dashboard');
        }

        if (config('app.env') == "production") {
            return;
        }


        $this->fill([
            'email' => 'admin@zerocode.com',
            'password' => 'secret',
        ]);
    }

    public function login()
    {
        $credentials = $this->validate();
        if (auth()->attempt(['email' => $this->email, 'password' => $this->password], $this->remember_me)) {
            $user = User::where(['email' => $this->email])->first();
            auth()->login($user, $this->remember_me);

            if (!auth()->user()->is_active) {
                $this->alert('info', 'Account has been In active contact admin');
                return;
            }

            return redirect()->intended('/dashboard');
        } else {
            return $this->addError('email', trans('auth.failed'));
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
