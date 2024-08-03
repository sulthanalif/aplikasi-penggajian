<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;

class FormCreateUser extends Component
{
    #[Validate('string|required')]
    public $name = '';
    #[Validate('email|required|unique:users,email')]
    public $email = '';
    #[Validate('string|required')]
    public $role = '';

    public function store()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt('password'),
        ]);

        $user->profile()->create([
            'user_id' => $user->id
        ]);

        $user->assignRole($this->role);

        session()->flash('status', 'User created successfully.');
        $this->redirectRoute('user');
    }

    public function render()
    {
        return view('livewire.form-create-user');
    }
}
