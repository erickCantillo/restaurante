<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Equipo;
use DateTime;
use Livewire\Component;
use Livewire\WithFileUploads;
use PhpParser\Node\Expr\FuncCall;

class AgregarEquipo extends Component
{
    use WithFileUploads;
    
    public $grupo;
    public $paso= 1;
    public $photo;
    public $subGrupo;
    public $categoria;
    public $photo_editar;
    public $equipo;
    public $codigo_interno;
    public $serial;
    public $valor;
    public $valor_dia;
    public $codigo;
    public $ubicacion;
    public $marca;
    public $tipo;
    public $obs;
    public $equipo_id;

    public $rules = [
        'grupo' => 'required',
        'subGrupo' => 'required',
        'categoria' => 'required|exists:App\Models\Categoria,id',
        'codigo_interno' => 'required|unique:equipos,codigo_interno',
        'serial' => 'required|unique:equipos,serial',
    ];

    public function render()
    {
        if(isset($_GET['id'])){
        $this->equipo_id = $_GET['id'];
        if($this->paso == 1){
            $this->equipo = Equipo::where('id', $this->equipo_id)->first();
            if(isset($this->equipo->id)){
                $this->categoria = $this->equipo->categoria_id;
                $this->subGrupo = $this->equipo->categoria->padre->id;
                $this->grupo = $this->equipo->categoria->padre->padre->id;
                $this->codigo_interno = $this->equipo->codigo_interno;
                $this->serial = $this->equipo->serial;
                $this->photo_editar = $this->equipo->imagen;
                $this->valor = $this->equipo->valor_compra;
                $this->valor_dia =  $this->equipo->valor_dia;
                $this->codigo   = $this->equipo->codigo_SAP;
                $this->marca = $this->equipo->marca;
                $this->obs = $this->equipo->observaciones;
                $this->ubicacion = $this->equipo->ubicacion;
                $this->tipo = $this->equipo->tipo;
            }
        }
    }
        $cat = Categoria::get();
        return view('livewire.agregar-equipo',[
            'categorias' => $cat,
        ]);
    }

    public function anterior(){
        if($this->paso > 1)
        $this->paso = $this->paso- 1;
    }

    public function guardar()
    {
      
        if($this->paso == 1){
       
            if(isset($this->equipo->id)){
                if($this->equipo->serial != $this->serial){
                    $this->rules = [
                        'grupo' => 'required',
                        'subGrupo' => 'required',
                        'categoria' => 'required|exists:App\Models\Categoria,id',
                        'codigo_interno' => 'required',
                        'serial' => 'required|unique:equipos,serial',
                    ];
                    $this->validate();
                }
                if($this->equipo->codigo_interno != $this->codigo_interno){
                    $this->rules = [
                        'grupo' => 'required',
                        'subGrupo' => 'required',
                        'categoria' => 'required|exists:App\Models\Categoria,id',
                        'codigo_interno' => 'required|unique:equipos,codigo_interno',
                    ];
                    $this->validate();
                }

                $this->equipo->categoria_id=  $this->categoria;
                $this->equipo->codigo_interno = $this->codigo_interno;
                $this->equipo->serial=$this->serial;
                $this->equipo->save();
                $this->paso = 2;
            }
            else{
                $this->validate();
           $this->equipo = auth()->user()->equipos()->create([
                'categoria_id' => $this->categoria,
                'serial' => $this->serial,
                'codigo_interno' => $this->codigo_interno,
                'fecha_ingreso' => new DateTime(),
                ]);
          $this->paso = 2;
            }
        }else if($this->paso == 2){
            if($this->photo){
                $photoPath = $this->photo->store('public/categorizacion/');
           }else{
               $photoPath = $this->photo_editar;
           }
            if(isset( $this->equipo->id)) {
                $this->equipo->imagen = $photoPath;
                $this->equipo->valor_compra = $this->valor;
                $this->equipo->valor_dia = $this->valor_dia;
                $this->equipo->save();
                $this->paso = 3;
            }
        }else if($this->paso == 3){
            if(isset( $this->equipo->id)) {
             
                $this->equipo->codigo_SAP = $this->codigo;
                $this->equipo->marca = $this->marca;
                $this->equipo->observaciones = $this->obs;
                $this->equipo->ubicacion = $this->ubicacion;
                $this->equipo->tipo = $this->tipo;
                $this->equipo->save();
                $this->paso = 'complete';
            }
        }
    }

}
