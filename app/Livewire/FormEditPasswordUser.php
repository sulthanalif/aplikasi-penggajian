<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;

class FormEditPasswordUser extends Component
{
    public $user;

    #[Validate('required', 'string', 'max:255')]
    public $password = '';
    #[Validate('required', 'string', 'max:255')]
    public $confirmPass = '';

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function updatePassword(User $user)
    {
        if ($this->password != $this->confirmPass) {
            return session()->flash('error', 'Password not match');
        }

        $user->update([
            'password' => bcrypt($this->password),
        ]);

        return redirect()->route('user');
    }

    public function render()
    {
        $user = $this->user;
        return view('livewire.form-edit-password-user', compact('user'));
    }
}
