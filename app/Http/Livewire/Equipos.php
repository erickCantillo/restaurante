<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;
use App\Models\Equipo;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Equipos extends Component
{

    use WithPagination;
    use WithFileUploads;
     

    public $active;
    public $q;
    public $equipo;
    public $photo_editar;
    public $photo;
    public $grupo;
    public $subGrupo;
    public $categoria;
    public $confirmingEquipoAdd = false;
    public $confirmingEquipoDeletion = false;

    protected $rules = [
        'equipo.categoria' => 'required|numeric',
        'equipo.codigo_interno' => 'required|unique:equipos',
        'equipo.serial' => 'required|unique:equipos',
        'equipo.codigo_SAP' => 'required',
        'equipo.marca' => 'required',
        'equipo.valor_compra' => 'required|numeric',
        'equipo.ubicacion' => 'required',
        'equipo.fecha_ingreso' => 'required|date',
        'equipo.valor_dia' => 'required|numeric',
        'equipo.valor_dia' => 'required|numeric',
        'equipo.responsable' => 'required|numeric',
        'equipo.observaciones' => 'required',
        'equipo.tipo' => 'required',
        'photo' => 'image|file',
        'grupo' => 'required'
         
    ];
    protected $messages= [
        'categoria.name.required' => 'Este campo es Obligatorio',

    ];

    public function render()
    {
       //obteniedo el Registro sin paginar
        $equipos = Equipo::orderBy('categoria_id')
        ->paginate(5); //Paginando el registro de 5 en 5
        $cat = Categoria::get();
        
        return view('livewire.equipos',[
            'equipos' => $equipos,
            'categorias' => $cat,
        ]
        );
    }
    public function confirmProductoDeletion( $id) 
    {
        $this->confirmingEquipoDeletion = $id;
    }

    public function deleteItem(Equipo $item) 
    {
        $item->delete();
        $this->confirmingEquipoDeletion = false;
        session()->flash('message', 'Equipo Eliminado Exitosamente');
    }

    
    public function confirmItemAdd() 
    {
        $this->reset(['equipo']);
        $this->photo_editar = '';
        $this->photo = '';
        $this->confirmingEquipoAdd = true;
    }

    public function confirmEquipoEdit(Equipo $item) 
    {
        $this->photo = '';
        $this->resetErrorBag();
        $this->equipo = $item;
        $this->photo_editar = $item->imagen;
        $this->confirmingEquipoAdd = true;
    }

    public function saveCategoria() 
    {
        $this->validate();
       if($this->photo){
             $photoPath = $this->photo->store('public/Equipos/');
        }else{
            $photoPath = $this->photo_editar;
        }
        
        if(isset( $this->equipo->id)) {
            $this->equipo->imagen = $photoPath;
            $this->equipo->save();
            session()->flash('message', 'Equipo Guardado Exitosamente');
        } else {
                auth()->user()->equipos()->create([
                    'categoria_id' => $this->equipo['categoria'],
                    'codigo_interno' => $this->equipo['codigo_interno'],
                    'serial' => $this->equipo['serial'],
                    'imagen' => $photoPath,
                    
                ]);
                session()->flash('message', 'categoria Añadida Exitosamente');
        }
 
        $this->confirmingCategoriaAdd = false;
 
    }

}
