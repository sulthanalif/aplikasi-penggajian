<?php

namespace App\Livewire;

use App\Models\TeachingHours;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;

class FormCreateTeachingHours extends Component
{
    #[Validate('required')]
    public $user_id = '';
    #[Validate('required|numeric')]
    public $hours = '';
    #[Validate('required|numeric')]
    public $total = '';

    public function store()
    {
        $this->validate();
        TeachingHours::create([
           'user_id' => $this->user_id,
           'hours' => $this->hours,
           'total' => $this->total
        ]);

        session()->flash('status', 'Data berhasil di tambahkan!');
        $this->redirectRoute('teaching_hours');
    }

    public function render()
    {
        $teachers = User::role('teacher')->get();
        return view('livewire.form-create-teaching-hours', compact('teachers'));
    }
}
