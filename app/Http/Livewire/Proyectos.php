<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Proyecto;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Proyectos extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $nombre;
    public $proyecto;
    public $photo;
    public $photo_editar;

    public $confirmingProyectoDeletion = false;
    public $confirmingProyectoAdd = false;

    protected $rules = [
        'proyecto.nombre' => 'required|string|min:4',
        'photo' => 'image|file',
         
    ];
    protected $messages= [
        'proyecto.name.required' => 'Este campo es Obligatorio',

    ];

    public function render()
    {
        $proyectos = Proyecto::orderBy('nombre')
        ->paginate(5); //Paginando el registro de 5 en 5
        return view('livewire.proyectos', ['proyectos' => $proyectos,]);
    }

    public function confirmProyectoDeletion( $id) 
    {
        $this->confirmingProyectoDeletion = $id;
    }

    public function deleteProyecto(Proyecto $item) 
    {
        $item->delete();
        $this->confirmingProyectoDeletion = false;
        session()->flash('message', 'Proyecto Eliminado Exitosamente');
    }

    
    public function confirmItemAdd() 
    {
        $this->reset(['proyecto']);
        $this->nombre = '';
        $this->photo_editar = '';
        $this->photo = '';
        $this->confirmingProyectoAdd = true;
    }

    public function confirmProyectoEdit(Proyecto $item) 
    {
        $this->nombre = '';
        $this->photo = '';
        $this->resetErrorBag();
        $this->proyecto = $item;
        $this->photo_editar = $item->imagen;

        $this->confirmingProyectoAdd = true;
    }
    
    public function saveProyecto() 
    {
        $this->validate();
       if($this->photo){
             $photoPath = $this->photo->store('public/proyecto/');
        }else{
            $photoPath = $this->photo_editar;
        }
        
        if(isset( $this->proyecto->id)) {
            $this->proyecto->imagen = $photoPath;
            $this->proyecto->save();
            session()->flash('message', 'Proyecto Guardado Exitosamente');
        }else{
            Proyecto::create([
                'nombre' => $this->proyecto['nombre'],
                'imagen' => $photoPath,
            ]);

            session()->flash('message', 'Proyecto Agregado Exitosamente');
        }
 
        $this->confirmingProyectoAdd = false;
 
    }

}
