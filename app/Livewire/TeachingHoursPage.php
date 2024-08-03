<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TeachingHours;
use App\Exports\TeachingHoursExport;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class TeachingHoursPage extends Component
{
    use WithPagination;
    public $search = '';

    public function delete(TeachingHours $teaching)
    {
        $teaching->delete();
        session()->flash('message', 'Teaching Hours has been deleted successfully!');
    }

    public function print()
    {
        return Excel::download(new TeachingHoursExport, 'Data_Jam_Mengajar_Guru'.date('Y-m-d').'.xlsx');
    }
    public function render()
    {
        $teachings = TeachingHours::whereHas('user', function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })->latest()->paginate(5);
        return view('livewire.teaching-hours-page', compact('teachings'));
    }
}
