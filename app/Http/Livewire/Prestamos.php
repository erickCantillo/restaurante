<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Prestamo;
use App\Models\Equipo;

class Prestamos extends Component
{
    public $search;
    public $page;
    public $perPage;
    public $prestamo;
    public $confirmingPrestamoAdd = false;
    public $confirmingPrestamoDeletion = false;

    public function render()
    {
        $prestamos = Prestamo::get();
        return view('livewire.prestamos',[
            'prestamos' => $prestamos,
        ]);
    }

    public function confirmItemAdd() 
    {
        $this->reset(['prestamo']);
        $this->confirmingPrestamoAdd = true;
    }

    public function confirmPrestamoDeletion( $id) 
    {
        $this->confirmingPrestamoDeletion = $id;
    }

    public function deleteItem(Prestamo $item) 
    {
        $item->delete();
        $this->confirmingPrestamoDeletion = false;
        session()->flash('message', 'Prestamo Eliminado Exitosamente');
    }

    public function confirmEquipoEdit(Equipo $item) 
    {
        $this->photo = '';
        $this->resetErrorBag();
        $this->equipo = $item;
        $this->photo_editar = $item->imagen;
        $this->confirmingEquipoAdd = true;
    }

}
