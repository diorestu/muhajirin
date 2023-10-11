<?php

namespace App\Livewire;

use App\Models\Acara;
use Livewire\Component;

class HomeEvent extends Component
{
    public function render()
    {
        // dd(Acara::latest()->get());
        return view('livewire.home-event', [
            'event' => Acara::orderBy('tanggal', 'DESC')->take(10)->get(),
        ]);
    }
}
