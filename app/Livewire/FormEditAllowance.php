<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Allowance;
use Livewire\Attributes\Validate;

class FormEditAllowance extends Component
{
    public $allowance;

    #[Validate('required')]
    public $user_id = '';
    #[Validate('required|string')]
    public $classroom = '';
    #[Validate('required|numeric')]
    public $total = '';

    public function mount(Allowance $allowance)
    {
        $this->allowance = $allowance;
        $this->user_id = $allowance->user_id;
        $this->classroom = $allowance->classroom;
        $this->total = number_format($allowance->total, 0, '', '');
    }

    public function update(Allowance $allowance)
    {
        $this->validate();

        $allowance->update([
           'user_id' => $this->user_id,
           'classroom' => $this->classroom,
           'total' => $this->total
        ]);

        return redirect()->route('allowance');
    }

    public function render()
    {
        $teachers = User::role('teacher')->get();
        return view('livewire.form-edit-allowance', compact('teachers'));
    }
}
