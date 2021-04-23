<div>
   
    <style>
       
        .top-100 {
            top: 100%
        }
        
        .bottom-100 {
            bottom: 100%
        }
        
        .max-h-select {
            max-height: 300px;
        }

        [x-cloak] {
            display: none;
        }
        
        [type="checkbox"] {
            box-sizing: border-box;
            padding: 0;
        }
        
        .form-checkbox,
        .form-radio {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            -webkit-print-color-adjust: exact;
            color-adjust: exact;
            display: inline-block;
            vertical-align: middle;
            background-origin: border-box;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            flex-shrink: 0;
            color: currentColor;
            background-color: #fff;
            border-color: #e2e8f0;
            border-width: 1px;
            height: 1.4em;
            width: 1.4em;
        }
        
        .form-checkbox {
            border-radius: 0.25rem;
        }
        
        .form-radio {
            border-radius: 50%;
        }
        
        .form-checkbox:checked {
            background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M5.707 7.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4a1 1 0 0 0-1.414-1.414L7 8.586 5.707 7.293z'/%3e%3c/svg%3e");
            border-color: transparent;
            background-color: currentColor;
            background-size: 100% 100%;
            background-position: center;
            background-repeat: no-repeat;
        }
        
        .form-radio:checked {
            background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
            border-color: transparent;
            background-color: currentColor;
            background-size: 100% 100%;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>

    
        <div class="max-w-3xl mx-auto px-4 py-1">
            @if($paso == "complete")
            <div >
                <div class="bg-white rounded-lg p-10 flex items-center shadow justify-between">
                    <div>
                        <svg class="mb-4 h-20 w-20 text-green-500 mx-auto" viewBox="0 0 20 20" fill="currentColor">  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>

                        <h2 class="text-2xl mb-4 text-gray-800 text-center font-bold">Registro Completo</h2>

                        <div class="text-gray-600 mb-8">
                            Todo listo!
                        </div>

                        <a href="/equipos" class="w-40 block mx-auto focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border"> Regresar</a>
                    </div>
                </div>
            </div>
            @endif
           
            @if($paso != 'complete')
            <div > 
              
                <!-- Top Navigation -->
                <div class="border-b-2 py-4">
                    <div class="uppercase tracking-wide text-xs font-bold text-gray-500 mb-1 leading-tight" >{{ 'paso '.$paso . ' de 3' }}</div>
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                        <div class="flex-1">
                            @if($paso == 1)
                                <div class="text-lg font-bold text-gray-700 leading-tight">Buscar el Equipo</div>
                            @endif
                            @if($paso == 2)
                                <div class="text-lg font-bold text-gray-700 leading-tight">Busar la Persona {{ $equipo->codigo_interno }}</div>
                            @endif
                           
                            @if($paso == 3)
                                <div class="text-lg font-bold text-gray-700 leading-tight">Datos de Almacenamiento</div>
                            @endif
                        </div>

                        <div class="flex items-center md:w-64">
                            <div class="w-full bg-white rounded-full mr-2">
                           
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Top Navigation -->

                <!-- Step Content -->
                <div class="py-1">
                    @if($paso == 1)
                    <div x-show.transition.in="step === 1">
                        @if(!$codigo_interno)
                            @if(!$serial)
                                <div class="mb-5">
                                    <label for="firstname" class="font-bold mb-1 text-gray-700 block">Buscar por Categoria</label>
                                    <div class="w-full md:w-full flex flex-col items-center h-10">
                                        <div class="w-full">
                                            <div class="flex flex-col items-center relative">
                                                <div class="w-full">
                                                    <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                                                        <div class="flex flex-auto flex-wrap"></div>
                                                        <input wire:keydown="BuscarCategorias()" wire:model="categoria" placeholder="Escriba el nombre de la Categoria" class="p-1 px-2 appearance-none outline-none w-full text-gray-800">
                                                        <div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200">
                                                            <button class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                                        
                                                        </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($auto && strlen($categoria) > 1)
                                                <div class="absolute shadow bg-white top-100 z-40 w-full lef-0 rounded max-h-select overflow-y-auto svelte-5uyqqj">
                                                @foreach($categorias as $categoria)
                                                <div class="flex flex-col w-full">
                                                    <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-teal-100">
                                                        <div wire:click="BuscarPorCategoria({{ $categoria }})" class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
                                                            <div class="w-6 flex flex-col items-center">
                                                                <div class="flex relative bg-orange-500 justify-center items-center m-1 mr-2 w-5 h-5 mt-1 rounded-full "><img class="rounded-full" alt="A" src="{{ 
                                                                    Storage::url($categoria->imagen) }}"> </div>
                                                            </div>
                                                            <div class="w-full items-center flex">
                                                                <div class="mx-2 -mt-1  ">{{ $categoria->name }}
                                                                
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                        @if(!$categoria)
                            @if(!$serial)
                                <div class="mb-5">
                                    <label for="firstname" class="font-bold mb-1 text-gray-700 block">Buscar por Codigo Interno</label>
                                    <input   wire:model.defer="codigo_interno" wire:keydown.debounce.300ms="BuscarPorCodigo()" name="codigo_interno" class="w-full px-4 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium" placeholder="Ingrese el Codigo del Equipo" name="codigo_interno"> 
                                    <x-jet-input-error for="codigo_interno" class="mt-0" />
                                </div>
                            @endif
                        @endif
                        @if(!$categoria)
                            @if(!$codigo_interno)
                                <div class="mb-5">
                                    <label for="firstname" class="font-bold mb-1 text-gray-700 block">Buscar por Serial</label>
                                    <input  wire:model="serial" class="w-full px-4 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium" placeholder="Ingrese el Serial del Equipo"> 
                                    <x-jet-input-error for="codigo_interno" class="mt-0" />
                                </div>
                            @endif
                        @endif
                        @if($equipo)
                        <div class="flex   justify-center bg-white">
                            <div class="flex flex-col w-full max-w-xs p-2 bg-white rounded-3xl md:flex-row">
                                <div class="mt-28 md:my-1 md:-ml-32" style="clip-path: url(#roundedPolygon)">
                                    <img
                                        class="w-auto h-48"
                                        src="{{  Storage::url($equipo->imagen) }}"
                                        alt="Imagen de Herramienta"
                                    />
                                </div>
                                <div class="flex flex-col">
                                <div class="flex flex-col items-center md:items-start mt-30 md:my-10 md:ml-2">
                               
                                    <h2 class="text-xl font-medium">{{ $equipo->categoria->name }}</h2>
                                    <p class="text-base font-medium text-gray-400">{{ $equipo->codigo_interno }}</p>
                                    <p class="text-base font-medium text-gray-400">{{ $equipo->ubicacion }}</p>
                                    <p class="text-base font-medium text-gray-400">{{ $equipo->estado }}</p>
                                </div>
                              
                                </div>
                            </div>
                            <svg width="0" height="0" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                <!-- rounded polygon generator => https://weareoutman.github.io/rounded-polygon/ -->
                                <!-- polygon size 190 * 190 almost the same size as the image -->
                                <clipPath id="roundedPolygon">
                                    <path
                                    d="M79 6.237604307034a32 32 0 0 1 32 0l52.870489570875 30.524791385932a32 32 0 0 1 16 27.712812921102l0 61.049582771864a32 32 0 0 1 -16 27.712812921102l-52.870489570875 30.524791385932a32 32 0 0 1 -32 0l-52.870489570875 -30.524791385932a32 32 0 0 1 -16 -27.712812921102l0 -61.049582771864a32 32 0 0 1 16 -27.712812921102"
                                    />
                                </clipPath>
                                </defs>
                            </svg>
                        </div>
                        @endif
                        @if($error)
                        <div class="bg-teal-lightest bg-red-200 border-t-4 border-teal rounded-b text-teal-darkest px-4 py-3 shadow-md my-2" role="alert">
                            <div class="flex">
                              <svg class="h-6 w-6 text-teal mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg>
                              <div>
                                <p class="font-bold">Ha Ocurrido un Error</p>
                                <p class="text-sm">{{ $error }}.</p>
                              </div>
                            </div>
                          </div>
                        @endif
                       
                    </div>
                    @endif
                    
                    @if($paso == 2)
                    <div>
                        {{-- Campo para identificar la identificacion del usuario --}}
                        @if(!$identificacion)
                                <div class="mb-5">
                                    <label for="firstname" class="font-bold mb-1 text-gray-700 block">Buscar por Nombre</label>
                                    <div class="w-full md:w-full flex flex-col items-center h-10">
                                        <div class="w-full">
                                            <div class="flex flex-col items-center relative">
                                                <div class="w-full">
                                                    <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                                                        <div class="flex flex-auto flex-wrap"></div>
                                                        <input wire:keydown="buscarNombres()" wire:model="nombre" placeholder="Escriba el nombre de la Categoria" class="p-1 px-2 appearance-none outline-none w-full text-gray-800">
                                                        <div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200">
                                                            <button class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                                        
                                                        </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($auto && strlen($nombre) > 2)
                                                <div class="absolute shadow bg-white top-100 z-40 w-full lef-0 rounded max-h-select overflow-y-auto svelte-5uyqqj">
                                                @foreach($users as $user)
                                                <div class="flex flex-col w-full">
                                                    <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-teal-100">
                                                        <div wire:click="BuscarUsuario({{ $user }})" class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
                                                            <div class="w-6 flex flex-col items-center">
                                                                <div class="flex relative bg-orange-500 justify-center items-center m-2 mr-2 w-10 h-10 mt-1 rounded-full ">
                                                                      <img class="rounded-full" src="{{ $user->profile_photo_url }}"> </div>
                                                            </div>
                                                            <div class="w-full items-center flex">
                                                                <div class="mx-2 -mt-1  ">
                                                                    <p>{{ $user->name }}</p>
                                                                    <p class="text-3xs text-gray-400">{{ $user->cargo }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endif 
                        @if(!$nombre)
                                <div class="mb-5">
                                    <label for="firstname" class="font-bold mb-1 text-gray-700 block">Buscar Por Identificación</label>
                                    <input   wire:model.defer="identificacion" wire:keydown.debounce.300ms="BuscarPorCedula()" name="codigo_interno" class="w-full px-4 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium" placeholder="Ingrese la Identificación" name="codigo_interno"> 
                                   
                                </div>
                           
                        @endif
                        @if($user)
                            <div class="flex   justify-center bg-white">
                                <div class="flex flex-col w-full max-w-xs p-2 bg-white rounded-3xl md:flex-row">
                                    <div class="mt-28 md:my-1 md:-ml-32" style="clip-path: url(#roundedPolygon)">
                                        <img class="w-auto h-48" src="{{ $user->profile_photo_url }}">
                                    </div>
                                    <div class="flex flex-col">
                                    <div class="flex flex-col items-center md:items-start mt-30 md:my-10 md:ml-2">
                                
                                        <h2 class="text-xl font-medium">{{ $user->name }}</h2>
                                    
                                        <p class="text-base font-medium text-gray-400">{{ $user->email }}</p>
                                        <p class="text-base font-medium text-gray-400">{{ $user->celular }}</p>
                                        <p class="text-base font-medium text-gray-400">{{ $user->cargo }}</p>
                                    </div>
                                
                                    </div>
                                </div>
                                <svg width="0" height="0" xmlns="http://www.w3.org/2000/svg">
                                    <defs>
                                    <!-- rounded polygon generator => https://weareoutman.github.io/rounded-polygon/ -->
                                    <!-- polygon size 190 * 190 almost the same size as the image -->
                                    <clipPath id="roundedPolygon">
                                        <path
                                        d="M79 6.237604307034a32 32 0 0 1 32 0l52.870489570875 30.524791385932a32 32 0 0 1 16 27.712812921102l0 61.049582771864a32 32 0 0 1 -16 27.712812921102l-52.870489570875 30.524791385932a32 32 0 0 1 -32 0l-52.870489570875 -30.524791385932a32 32 0 0 1 -16 -27.712812921102l0 -61.049582771864a32 32 0 0 1 16 -27.712812921102"
                                        />
                                    </clipPath>
                                    </defs>
                                </svg>
                            </div>
                        @endif
                        @if($error)
                            <div class="bg-teal-lightest bg-red-200 border-t-4 border-teal rounded-b text-teal-darkest px-4 py-3 shadow-md my-2" role="alert">
                                <div class="flex">
                                    <svg class="h-6 w-6 text-teal mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg>
                                    <div>
                                    <p class="font-bold">Ha Ocurrido un Error</p>
                                    <p class="text-sm">{{ $error }}.</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                      
                    </div>
                    @endif
    
                    @if($paso == 3)
                    <div >
                        <div class="mb-1">
                            <label for="text" class="uppercase font-bold mb-1 text-gray-700 block">Codigo de SAP</label>
                            <input wire:model="codigo" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium" placeholder="Ej. 0012201">
                        </div>
                        <div class="mb-1">
                            <label for="text"  class="uppercase font-bold mb-1 text-gray-700 block">Ubicación En Almacen</label>
                            <input wire:model="ubicacion" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium" placeholder="Ej. Estanteria 1, Nivel 2">
                        </div>
                        <div class="mb-1">
                            <label for="text" class="uppercase font-bold mb-1 text-gray-700 block">Marca</label>
                            <input wire:model="marca" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium" placeholder="Ej. DAEWOOD">
                        </div>
                        <div class="mb-1">
                            <label for="firstname" class="font-bold mb-1 text-gray-700 block">Tipo</label>
                            <select wire:model="tipo"  name="categoria" id="" class="w-full px-4 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium border-transparent">
                                <option value="" selected >Seleccinar un Tipo</option>
                                <option value="TIPO C">TIPO C</option>
                                <option value="TIPO B">TIPO B</option>
                                <option value="TIPO A">TIPO A</option>
                            </select>
                            <x-jet-input-error for="categoria" class="mt-0" />
                            {{-- <input type="text" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium" placeholder="Enter your firstname..."> --}}
                        </div>
                        <div class="mb-1">
                            <label for="text" class="uppercase font-bold mb-1 text-gray-700 block">Observaciones</label>
                            <input wire:model="obs" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium" placeholder="Ej. DAEWOOD">
                        </div>
                    </div>
                    @endif
                    
                </div>
                <!-- / Step Content -->
            </div>
            @endif
            
        </div>

        <!-- Bottom Navigation -->
        @if($paso != 'complete')
        <div class="fixed bottom-0 left-0 right-0 py-2 bg-white shadow-md" >
            <div class="max-w-3xl mx-auto px-4">
                <div class="flex justify-between">
                    <div class="w-1/2">
                        @if($paso == 1)
                        <a  href="/equipos" class="w-32 focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-indigo-400 bg-white hover:bg-gray-100 font-medium border">Volver</a>
                        @endif
                        
                        @if($paso > 1)
                        <button  wire:click="anterior()" class="w-32 focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-red-400 bg-white hover:bg-gray-100 font-medium border">Anterior</button>
                        @endif
                    </div>
                    

                    <div class="w-1/2 text-right">
                        @if($paso < 3)
                        <button  wire:click="guardar()" class="w-36 md:w-24 focus:outline-none border border-transparent p-2 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium">Continuar</button>
                        @endif
                       
                        @if($paso == 3)
                            <button  wire:click="guardar()"  class="w-50 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium">Terminar</button>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
        @endif
        
        <!-- / Bottom Navigation https://placehold.co/300x300/e2e8f0/cccccc -->
 
</div>