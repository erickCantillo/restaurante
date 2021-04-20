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
    public $confirmingEquipoAdd = false;
    public $confirmingEquipoDeletion = false;

    protected $rules = [
        'equipo.categoria' => 'required|numeric|min:4',
        'equipo.codigo_interno' => 'required|numeric|unique:equipos',
        'equipo.serial' => 'required|numeric|unique:equipos',
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
        
        $cat = Categoria::where('user_id',  auth()->user()->id)->get();
        
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

}
