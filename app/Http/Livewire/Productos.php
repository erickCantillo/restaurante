<?php

namespace App\Http\Livewire;


use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Producto;

class Productos extends Component
{
    use WithPagination;
    public $active;
    public $q;
    public $sortBy = 'id';
    public $sortAsc = true;
    public $producto;

    public $confirmingProductoDeletion = false;
    public $confirmingProductoAdd = false;

    protected $queryString = [
        'active' => ['except' => false],
        'q' => ['except' => ''],
        'sortBy' => ['except' => 'id'],
        'sortAsc' => ['except' => true],
    ];

    protected $rules = [
        'producto.name' => 'required|string|min:4',
        'producto.price' => 'required|numeric|min:2000,',
        'producto.status' => 'boolean'
    ];
    
    public function render()
    {
        
        $productos = Producto::where(['user_id' => auth()->user()->id])
        ->when($this->q, function($query){
            return $query->where(function($query){
                $query->where('name', 'like', '%'.$this->q . '%')
                ->orWhere('price', 'like', '%'. $this->q.'%');
            });
        })
        ->when($this->active, function( $query) {
            return $query->active();
        })
        ->orderBy( $this->sortBy, $this->sortAsc ? 'ASC' : 'DESC');

        $productos = $productos->paginate(10);

        return view('livewire.productos', [
            "productos" => $productos,
        ]);
    }
    public function updatingActive() 
    {
        $this->resetPage();
    }

    public function updatingQ() 
    {
        $this->resetPage();
    }

    public function sortBy( $field) 
    {
        if( $field == $this->sortBy) {
            $this->sortAsc = !$this->sortAsc;
        }
        $this->sortBy = $field;
    }

    public function confirmProductoDeletion( $id) 
    {
        $this->confirmingProductoDeletion = $id;
    }

    public function deleteItem( Producto $item) 
    {
        $item->delete();
        $this->confirmingProductoDeletion = false;
        session()->flash('message', 'Producto Deleted Successfully');
    }

    
    public function confirmItemAdd() 
    {
        $this->reset(['producto']);
        $this->confirmingProductoAdd = true;
    }

    public function confirmProductoEdit(Producto $item) 
    {
        $this->resetErrorBag();
        $this->producto = $item;
        $this->confirmingProductoAdd = true;
    }

    
    public function saveProducto() 
    {
        $this->validate();
 
        if(isset( $this->producto->id)) {
            $this->producto->save();
            session()->flash('message', 'Producto Saved Successfully');
        } else {
            auth()->user()->productos()->create([
                'name' => $this->producto['name'],
                'price' => $this->producto['price'],
                'status' => $this->producto['status'] ?? 0
            ]);
            session()->flash('message', 'Producto Added Successfully');
        }
 
        $this->confirmingProductoAdd = false;
 
    }
}
