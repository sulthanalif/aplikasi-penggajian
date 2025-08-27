<?php

namespace App\Livewire;

use App\Exports\TeacherExport;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class TeacherPage extends Component
{
    use WithPagination;
    public $search = '';

    public function delete(User $user)
    {
        $user->profile()->delete();
        $user->delete();
        session()->flash('status', 'Data guru berhasil dihapus');
    }

    public function print()
    {
        return Excel::download(new TeacherExport, 'Data_Guru_'.date('Y-m-d').'.xlsx');
    }


    public function render()
    {
        $teachers = User::role('teacher')->whereHas('profile', function($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('status', 'like', '%' . $this->search . '%');
        })->latest()->paginate(5);
        return view('livewire.teacher-page', compact('teachers'));
    }
}
