<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class UserPage extends Component
{
    use WithPagination;
    public function delete(User $user)
    {
        $user->profile()->delete();
        $user->delete();

        session()->flash('status', 'User deleted successfully.');
    }


    public function render()
    {
        $users = User::paginate(5);
        return view('livewire.user-page', compact('users'));
    }
}
