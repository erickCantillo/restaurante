<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithPagination;

class Categorias extends Component
{
    use WithPagination;
    public $active;
    public $q;
    public $categoria;

    public $confirmingCategoriaDeletion = false;
    public $confirmingCategoriaAdd = false;

    protected $rules = [
        'categoria.name' => 'required|string|min:4',
        'categoria.status' => 'boolean',
     
    ];
    protected $messages= [
        'categoria.name.required' => 'Este campo es Obligatorio',

    ];

    public function render()
    {
        $categorias = Categoria::where('user_id',  auth()->user()->id);

        $categorias = $categorias->paginate(5);

        return view('livewire.categorias', ['categorias' => $categorias]);
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
        $this->confirmingCategoriaAdd = true;
    }

    public function confirmCategoriaEdit(Categoria $item) 
    {
        $this->resetErrorBag();
        $this->categoria = $item;
        $this->confirmingCategoriaAdd = true;
    }

    
    public function saveCategoria() 
    {
        $this->validate();
       
 
        if(isset( $this->categoria->id)) {
        
            $this->categoria->save();
            session()->flash('message', 'Categoria Guardada Exitosamente');
        } else {
            auth()->user()->categorias()->create([
                'name' => $this->categoria['name'],
                'status' => $this->categoria['status'] ?? 0
            ]);
            session()->flash('message', 'categoria Añadida Exitosamente');
        }
 
        $this->confirmingCategoriaAdd = false;
 
    }
}
