<?php

namespace App\Livewire;

use App\Models\Payroll;
use Livewire\Component;
use Monolog\Handler\RedisHandler;

class EditPayroll extends Component
{
    public $payroll;

    public $name;
    // public $user_id;
    public $date;
    public $total_salary = 0;
    public $receipt_or_donation = 0;
    public $cooperative = 0;
    // public $bank = 0;
    public $total_payroll = 0;
    public $savings = 0;


    public function mount(Payroll $payroll)
    {
        $this->name = $payroll->user->name;
        // $this->user_id = $payroll->user_id;
        $this->date = $payroll->date;
        // $this->total_payroll = $payroll->total_payroll;
        $this->receipt_or_donation = $payroll->receipt_or_donation;
        $this->cooperative = $payroll->cooperative;
        // $this->bank = $payroll->bank;
        $this->savings = $payroll->savings;
        $this->total_salary = $payroll->total_salary;
        // $this->payroll = $payroll;
        $this->calculateTotalPayroll();

    }

    public function calculateTotalPayroll()
    {
        $this->total_payroll = (float)$this->total_salary -
            ((float)$this->receipt_or_donation + (float)$this->savings + (float)$this->cooperative);
    }

    public function updatedReceiptOrDonation()
    {
        $this->calculateTotalPayroll();
    }

    public function updatedSavings()
    {
        $this->calculateTotalPayroll();
    }

    public function updatedCooperative()
    {
        $this->calculateTotalPayroll();
    }

    // public function updatedBank()
    // {
    //     $this->calculateTotalPayroll();
    // }

    public function update(Payroll $payroll)
    {
        $payroll->update([
            // 'user_id' => $this->user_id,
            'date' => $this->date,
            'total_salary' => $this->total_salary,
            'receipt_or_donation' => $this->receipt_or_donation,
            'savings' => $this->savings,
            'cooperative' => $this->cooperative,
            // 'bank' => $this->bank,
            'total_payroll' => $this->total_payroll
        ]);

        return redirect()->route('payroll.report')->with('status', 'Payroll updated successfully.');
    }

    public function render()
    {
        return view('livewire.edit-payroll');
    }
}
