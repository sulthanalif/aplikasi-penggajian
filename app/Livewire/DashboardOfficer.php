<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class DashboardOfficer extends Component
{
    public $teachersCount;
    public $usersCount;
    public $absenceCount;

    public function mount()
    {
        $this->teachersCount = User::role('teacher')->count();
        $this->usersCount = User::count();
        $today = date('Y-m-d');
        $this->absenceCount = User::role('teacher')->whereHas('absence', function ($query) use ($today) {
            $query->whereDate('date', $today);
        })->count();
    }

    public function render()
    {
        return view('livewire.dashboard-officer');
    }
}
