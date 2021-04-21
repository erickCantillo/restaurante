<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Prestamo;

class Prestamos extends Component
{

    public function render()
    {

        $prestamos = Prestamo::get();
        return view('livewire.prestamos',[
            'prestamos' => $prestamos,
        ]);
    }
}
