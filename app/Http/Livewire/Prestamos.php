<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Prestamo;

class Prestamos extends Component
{
    public $search;
    public $page;
    public $perPage;

    public function render()
    {

        $prestamos = Prestamo::get();
        return view('livewire.prestamos',[
            'prestamos' => $prestamos,
        ]);
    }
}
