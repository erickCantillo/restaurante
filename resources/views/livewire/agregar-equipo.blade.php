<div>
   
    <style>
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

                        <a href="/prestamos" class="w-40 block mx-auto focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border">Regresar</a>
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
                                <div class="text-lg font-bold text-gray-700 leading-tight">Escoger El Equipo</div>
                            @endif
                            @if($paso == 2)
                                <div class="text-lg font-bold text-gray-700 leading-tight">Escoger el Usuario para prestarle {{ $equipo->categoria->name }}</div>
                            @endif
                           
                            @if($paso == 3)
                                <div class="text-lg font-bold text-gray-700 leading-tight">Condiciones del Prestamo</div>
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
                        <div class="mb-1">
                            <label for="firstname" class="font-bold mb-1 text-gray-700 block">Grupo</label>
                            <select wire:model="grupo" name="grupo" id="" class="w-full px-4 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium border-transparent">
                                <option value="">Seleccinar un grupo</option>
                                @foreach($categorias as $c)
                                    @if($c->nivel == "Grupo")   
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <x-jet-input-error for="grupo" class="mt-0" />
                            {{-- <input type="text" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium" placeholder="Enter your firstname..."> --}}
                        </div>
                        <div class="mb-1">
                            <label for="firstname" class="font-bold mb-1 text-gray-700 block">Sub Grupo</label>
                            <select wire:model="subGrupo" name="subGrupo" id="" class="w-full px-4 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium border-transparent">
                                <option value="">Seleccinar un Sub Grupo</option>
                                @foreach($categorias as $c)
                                    @if($c->nivel == "Sub Grupo" && $c->categoria_id == $grupo)   
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <x-jet-input-error for="subGrupo" class="mt-0" />
                            {{-- <input type="text" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium" placeholder="Enter your firstname..."> --}}
                        </div>
                        <div class="mb-1">
                            <label for="firstname" class="font-bold mb-1 text-gray-700 block">Categoria</label>
                            <select wire:model="categoria"  name="categoria" id="" class="w-full px-4 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium border-transparent">
                                <option value="">Seleccinar una Categoria</option>
                                @foreach($categorias as $c)
                                    @if($c->nivel == "Categoria" && $c->categoria_id == $subGrupo)   
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <x-jet-input-error for="categoria" class="mt-0" />
                            {{-- <input type="text" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium" placeholder="Enter your firstname..."> --}}
                        </div>
                        <div class="mb-1">
                            <label for="firstname" class="font-bold mb-1 text-gray-700 block">Codigo Interno</label>
                            <input  wire:model="codigo_interno" name="codigo_interno" class="w-full px-4 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium" placeholder="Ingrese el Codigo del Equipo" name="codigo_interno"> 
                            <x-jet-input-error for="codigo_interno" class="mt-0" />
                        </div>
                        <div class="mb-1">
                            <label for="firstname" class="font-bold mb-1 text-gray-700 block">Serial</label>
                            <input  wire:model="serial" class="w-full px-4 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium" placeholder="Ingrese el Serial del Equipo"> 
                            <x-jet-input-error for="codigo_interno" class="mt-0" />
                        </div>
                        
                    </div>
                    @endif
                    
                    @if($paso == 2)
                    <div>
                        <div class="mb-5 text-center">
                            <div class="mx-auto w-36 h-36  border rounded-full relative bg-gray-100 mb-4 shadow-inset">
                                @if($photo)
                                <img id="image" class="object-cover w-36 h-36 rounded-full" src="{{ $photo->temporaryUrl() }}" />
                                @endif
                                @if($photo_editar)
                                <img id="image" class="object-cover w-36 h-36 rounded-full" src="{{ Storage::url($photo_editar)}}" />
                                @endif
                            </div>
                            <x-jet-input id="photo" name="photo" wire:model="photo" type="file" class="hidden mt-1" /> 
                            <label for="photo" type="button" class="cursor-pointer inine-flex justify-between items-center focus:outline-none border py-2 px-4 rounded-lg shadow-sm text-left text-gray-600 bg-white hover:bg-gray-100 font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-flex flex-shrink-0 w-6 h-6 -mt-1 mr-1" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                <path d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                                <circle cx="12" cy="13" r="3" />
                            </svg>	Seleccione una Imagen					
                            <input type="file" name="photo" id="photo" class="hidden" wire.models="photo"  accept="image/*" > 
                        </div>
                        <div class="mb-5">
                            <label for="firstname" class="font-bold mb-1 text-gray-700 block">Valor de Compra</label>
                            
                            <input type="number" wire:model="valor" class="w-full px-4 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium border-transparent" placeholder="Ingrese el Valor de Compra del Equipo"> 
                        </div>
                        <div class="mb-5">
                            <label for="firstname" class="font-bold mb-1 text-gray-700 block">Valor de Alquiler Diario</label>
                            <input type="number" wire:model="valor_dia" class="w-full px-4 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium border-transparent" placeholder="Ingrese el Valor del Alquiler del Equipo"> 
                        </div>
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
                        <button wire:click="guardar()" class="w-50 md:w-48 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium">Guardar y Continuar</button>
                        @endif
                       
                        @if($paso == 3)
                            <button  wire:click="guardar()"  class="w-50 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium">Guardar y Terminar</button>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
        @endif
        
        <!-- / Bottom Navigation https://placehold.co/300x300/e2e8f0/cccccc -->
 
</div>