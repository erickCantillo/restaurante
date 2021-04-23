<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Prestamo;
use App\Models\Equipo;
use App\Models\Categoria;
use App\Models\Proyecto;
use App\Models\User;
use DateTime;

class Prestamos extends Component
{
    public $search;
    public $page;
    public $perPage;
    public $prestamo;
    public $users;
    public $equipos;
    public $isOpen = false;
    public $confirmingPrestamoAdd = false;
    public $confirmingPrestamoDeletion = false;

    protected $rules = [
        'prestamo.codigo_interno' => 'required|exists:App\Models\Equipo,codigo_interno',
        'prestamo.cedula' => 'required|exists:App\Models\User,identificacion',
        'prestamo.supervisor' => 'required|exists:App\Models\User,identificacion',
        'prestamo.proyecto' => 'required|exists:App\Models\Proyecto,id',
        'prestamo.bloque' => 'required|numeric',  
    ];
    
    public function render()
    {
        $this->users = User::get();
        
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

    public function confirmEquipoEdit(Prestamo $item) 
    {
        $this->photo = '';
        $this->resetErrorBag();
        $this->prestamo = $item;
        $this->photo_editar = $item->imagen;
        $this->confirmingEquipoAdd = true;
    }
    
    public function savePrestamo() 
    {
        $this->validate();
        $equipo = Equipo::where('codigo_interno',$this->prestamo['codigo_interno'])->first();
        $persona = User::where('identificacion', $this->prestamo['cedula'])->first();
        $supervisor = User::where('identificacion', $this->prestamo['supervisor'])->first();
        
       if($this->photo){
             $photoPath = $this->photo->store('public/Equipos');
        }else{
            $photoPath = $this->photo_editar;
        }
        if(isset( $this->prestamo->id)) {
            $this->prestamo->imagen = $photoPath;
            $this->prestamo->save();
            session()->flash('message', 'Equipo Guardado Exitosamente');
        } else {
                auth()->user()->prestar()->create([
                    'equipo_id' => $equipo->id,
                    'user_id' => $persona->id,
                    'proyecto_id' => $this->prestamos['proyecto'],
                    'supervisor_id' => $supervisor,
                    'lugar_trabajo' => $persona->lugar_trabajo,
                    'bloque' => $this->prestamo['bloque'],
                    'fecha_prestamo' =>new DateTime(),
                ]);
                session()->flash('message', 'categoria Añadida Exitosamente');
        }
 
        $this->confirmingCategoriaAdd = false;
 
    }
}
