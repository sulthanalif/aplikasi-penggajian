<?php

namespace App\Livewire;

use App\Models\Allowance;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;

class FormCreateAllowance extends Component
{
    #[Validate('required')]
    public $user_id = '';
    #[Validate('required|string')]
    public $classroom = '';
    #[Validate('required|numeric')]
    public $total = '';

    public function store()
    {
        $this->validate();
        Allowance::create([
           'user_id' => $this->user_id,
           'classroom' => $this->classroom,
           'total' => $this->total
        ]);

        return redirect()->route('allowance');
    }

    public function render()
    {
        $teachers = User::role('teacher')->get();
        return view('livewire.form-create-allowance', compact('teachers'));
    }
}
