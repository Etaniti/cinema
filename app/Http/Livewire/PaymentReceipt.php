<?php

namespace App\Http\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class PaymentReceipt extends Component
{
    public $reservation, $paymentReceipt;

    /**
     * Show the view for livewire component.
     *
     * @return \Illuminate\View\View
     */
    public function render(): View
    {
        return view('livewire.payment-receipt');
    }
}
