<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Equipo;
use App\Models\User;
use DateTime;
use Livewire\Component;
use Livewire\WithFileUploads;

class AgregarPrestamo extends Component
{
    use WithFileUploads;
    
    public $grupo;
    public $nombre;
    public $paso= 1;
    public $categoria;
    public $equipo;
    public $identificacion;
    public $codigo_interno;
    public $serial;
    public $user;
    public $categorias;
    public $users;
    public $error;
    public $equipo_id;
    public $auto = 0;

    public $rules = [
        'grupo' => 'required',
        'subGrupo' => 'required',
        'categoria' => 'required|exists:App\Models\Categoria,id',
        'codigo_interno' => 'required|unique:equipos,codigo_interno',
        'serial' => 'required|unique:equipos,serial',
    ];

    public function anterior(){
        if($this->paso > 1)
        $this->paso = $this->paso- 1;
        $this->error= '';
    }

    public function buscarNombres(){
        $this->users = User::where('name', 'LIKE', '%'.$this->nombre.'%')->get();
        $this->error = '';
        $this->auto = True;
    }

    public function BuscarUsuario(User $user){
        $this->user = $user;
        $this->nombre = $user->name;
        $this->auto = '';
    }

    public function BuscarPorCedula(){
        $this->user = '';
        $this->error = '';
        $this->user = User::where('identificacion', $this->identificacion)->first();
        if(!$this->user){
            $this->error = "No encontramos un Usuario identificado con  ".$this->identificacion;
        }
    }

    public function BuscarPorCategoria(Categoria $c){
        $this->categoria = $c->name;
        $this->auto = 0;
        $this->equipo = Equipo::where('categoria_id', $c->id)->where('estado', 'DISPONIBLE')->orderBy('updated_at', 'desc')->first();
       if(!$this->equipo){
        $this->error = 'NO Tenemos '. $this->categoria .' Disponibles';
       }
    }

    public function BuscarCategorias(){
        $this->categorias = Categoria::where('nivel', 'Categoria')->where('name', 'LIKE','%'.$this->categoria.'%')->get();
        $this->auto = True;
        $this->error= '';  
        $this->equipo = '';
    }

    public function BuscarPorCodigo(){
        $this->error = '';
        $this->equipo = Equipo::where('codigo_interno', $this->codigo_interno)->first();

        if(!$this->equipo ){
            if(strlen($this->codigo_interno) == 10){
                   $this->error = 'NO Encontramos un Equipo Con el Codigo Interno '. $this->codigo_interno;
            }
        }else if($this->equipo->estado != 'DISPONIBLE'){
            $this->error = 'El equipo con Codigo Interno '. $this->codigo_interno.' No está Disponible';
        }
    }
 

    public function guardar()
    {   
        if($this->paso == 1){
            if($this->equipo){
                if(!$this->error){
                    $this->paso++;
                  
                }
            }else{
                $this->error = 'Debe Buscar un Equipo Disponible Antes de Continuar';
            }
        }else if($this->paso == 2){
            if($this->user){
                    $this->paso++;
            }else{
                $this->error = 'Debe Buscar un usuario Antes de Continuar';
            }  
        }
    }
    public function render()
    {
        return view('livewire.agregar-prestamo');
    }
}
