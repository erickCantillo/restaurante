<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Categorias extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $active;
    public $q;
    public $photo;
    public $categoria;
    public $nivel = "Grupo";
    public $grupo;
    public $subGrupo;
    public $photo_editar;

    public $confirmingCategoriaDeletion = false;
    public $confirmingCategoriaAdd = false;

    protected $rules = [
        'categoria.name' => 'required|string|min:4',
        'categoria.status' => 'boolean',
        'photo' => 'image|file',
         
    ];
    protected $messages= [
        'categoria.name.required' => 'Este campo es Obligatorio',

    ];

    public function render()
    {
        $cat = Categoria::where('user_id',  auth()->user()->id)->get(); //obteniedo el Registro sin paginar
        $categorias = Categoria::where('user_id',  auth()->user()->id)->paginate(5); //Paginando el registro de 5 en 5
        return view('livewire.categorias', ['categorias' => $categorias, 'cat' =>$cat]);
    }

    public function confirmProductoDeletion( $id) 
    {
        $this->confirmingCategoriaDeletion = $id;
    }

    public function deleteItem(Categoria $item) 
    {
        $item->delete();
        $this->confirmingCategoriaDeletion = false;
        session()->flash('message', 'Categoria Eliminada Exitosamente');
    }

    
    public function confirmItemAdd() 
    {
        $this->reset(['categoria']);
        $this->nivel = 'Grupo';
        $this->grupo = '';
        $this->subGrupo = '';
        $this->photo_editar = '';
        $this->confirmingCategoriaAdd = true;
    }

    public function confirmCategoriaEdit(Categoria $item) 
    {
        $this->photo = '';
        $this->resetErrorBag();
        $this->categoria = $item;
        $this->nivel = $item->nivel;
        $this->photo_editar = $item->imagen;
        if($item->nivel == 'Sub Grupo'){
            $this->grupo = $item->categoria_id;
        }else if($item->nivel == 'Categoria'){
            $this->grupo = $item->padre->categoria_id;
            $this->subGrupo = $item->categoria_id;
        }
        $this->confirmingCategoriaAdd = true;
    }

    
    public function saveCategoria() 
    {
        $this->validate();
       
        $photoPath = $this->photo->storeAS('public/categorizacion/',$this->nivel);

        if(isset( $this->categoria->id)) {
        
            $this->categoria->save();
            session()->flash('message', 'Categoria Guardada Exitosamente');
        } else {
            if($this->nivel == 'Grupo'){
                auth()->user()->categorias()->create([
                    'name' => $this->categoria['name'],
                    'nivel' => "Grupo",
                    'categoria_id' => 0,
                    'imagen' => $photoPath,
                    'status' => $this->categoria['status'] ?? 0
                ]);
                session()->flash('message', 'categoria Añadida Exitosamente');
            }else if($this->nivel == 'Sub Grupo'){
                auth()->user()->categorias()->create([
                    'name' => $this->categoria['name'],
                    'nivel' => 'Sub Grupo',
                    'categoria_id' => $this->grupo,
                    'imagen' => $photoPath,
                    'status' => $this->categoria['status'] ?? 0
                ]);
                session()->flash('message', 'categoria Añadida Exitosamente');
            }else if($this->nivel == 'Categoria'){
                auth()->user()->categorias()->create([
                    'name' => $this->categoria['name'],
                    'nivel' => 'Categoria',
                    'categoria_id' => $this->subGrupo,
                    'imagen' => $photoPath,
                    'status' => $this->categoria['status'] ?? 0
                ]);
                session()->flash('message', 'categoria Añadida Exitosamente');
            }
        }
 
        $this->confirmingCategoriaAdd = false;
 
    }
}
