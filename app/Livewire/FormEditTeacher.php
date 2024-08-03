<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;

class FormEditTeacher extends Component
{
    public $teacher;

    #[Validate('string|required|max:255')]
    public $name = '';
    #[Validate('string|required|max:255')]
    public $status = '';

    public function mount(User $teacher)
    {
        $this->teacher = $teacher;
        $this->name = $teacher->name;
        $this->status = $teacher->profile->status;
    }

    public function update(User $teacher)
    {
        $this->validate();

        $teacher->update([
           'name' => $this->name,
        ]);

        $teacher->profile()->update([
            'status' => $this->status
        ]);

        session()->flash('message', 'Teacher updated successfully.');

        return redirect()->route('teacher');
    }
    public function render()
    {
        // dd($this->teacher);
        return view('livewire.form-edit-teacher', [
            'teacher' => $this->teacher,
            // 'status' => $this->status
        ]);
    }
}
