<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;

class FormEditUser extends Component
{
    public $user;

    #[Validate('required', 'string', 'max:255')]
    public $name = '';
    #[Validate('required', 'email', 'max:255', 'unique:users,email')]
    public $email = '';
    #[Validate('required', 'string')]
    public $role = '';

    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->roles()->first()->name;
    }


    public function update(User $user)
    {
        $this->validate();

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        if (!empty($this->role)) {
            $user->removeRole($user->roles()->first()->name);
            $user->assignRole($this->role);
        }

        return redirect()->route('user');

    }

    public function render()
    {

        return view('livewire.form-edit-user', [
            'user' => $this->user
        ]);
    }
}
