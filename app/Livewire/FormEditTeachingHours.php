<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TeachingHours;
use App\Models\User;
use Livewire\Attributes\Validate;

class FormEditTeachingHours extends Component
{
    public $teaching;

    #[Validate('required')]
    public $user_id = '';
    #[Validate('required|numeric')]
    public $hours = '';
    #[Validate('required|numeric')]
    public $total = '';

    public function mount(TeachingHours $teaching)
    {
        $this->teaching = $teaching;
        $this->user_id = $teaching->user->name;
        $this->hours = $teaching->hours;
        $this->total = number_format($teaching->total, 0, '', '');
    }

    public function update(TeachingHours $teaching)
    {
        $this->validate();
        $teaching->update([
            'hours' => $this->hours,
            'total' => $this->total
        ]);

        session()->flash('status', 'Data berhasil diperbarui.');
        $this->redirectRoute('teaching_hours');
    }

    public function render()
    {
        $teachers = User::role('teacher')->get();
        return view('livewire.form-edit-teaching-hours', [
            'teaching' => $this->teaching,
            'teachers' => $teachers
        ]);
    }
}
