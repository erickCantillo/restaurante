<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Prestamo;
use App\Models\Equipo;
use App\Models\Categoria;

class Prestamos extends Component
{
    public $search;
    public $page;
    public $perPage;
    public $prestamo;
    public $isOpen = false;
    public $confirmingPrestamoAdd = false;
    public $confirmingPrestamoDeletion = false;

    public function render()
    {
        $searchResults = [];
        if(strlen($this->search) >= 2){
            $searchResults = Categoria::where('nivel', 'Categoria')->where('name', 'like', '%'.$this->search . '%')->get();
        }

        $prestamos = Prestamo::get();
        return view('livewire.prestamos',[
            'prestamos' => $prestamos,
            'searchResults' => $searchResults,
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
