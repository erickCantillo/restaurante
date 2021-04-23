<div>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Equipos') }} 
        </h2>
       
    </x-slot> --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col">
                  @if(session()->has('message'))
                  <div class="flex items-center bg-green-400 text-white text-sm font-bold px-4 py-3 relative" role="alert" x-data="{show: true}" x-show="show">
                      <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                      <p>{{ session('message') }}</p>
                      <span class="absolute top-0 bottom-0 right-0 px-4 py-3" @click="show = false">
                          <svg class="fill-current h-6 w-6 text-white" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                      </span>
                  </div>
                   @endif
                    <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                          <div class="flex bg-white px-4 py-0  sm:px-6 justify-between">
                           
                            <input type="search" 
                            placeholder="Buscar..." 
                            class="form-input leading-tight focus:outline-none focus:shadow-outline rounded-md shadow-ms m-2 block content-center ">
                            <div class="form-input rounded-md shadow-ms m-2 block">
                              <select class="outline-none rounded-md shadow text-gray-500 text-sm ml-6">
                              <option value="5"> 5 Por Pagina</option>
                              <option value="10"> 10 Por Pagina</option>
                              <option value="15"> 15 Por Pagina</option>
                              <option value="20"> 20 Por Pagina</option>
                              </select>
                            </div>
                            <div class="mr-2 mt-3">
                                <a href="agregarEqupo" class="bg-indigo-200 hover:bg-blue-700">
                                    Nuevo Equipo
                                </a>
                            </div>
                          </div>
                         @if($equipos->count()) 
                          <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                              <tr>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Equipo
                                </th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Serial
                                </th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Marca
                                </th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Ubicación
                                </th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Tipo
                                </th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Estado
                                </th>
                               
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Acciones
                                  </th>
                              </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                              @foreach($equipos as $equipo)
                              <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="flex items-center">
                                     <div class="flex-shrink-0 h-10 w-10">
                                      <img class="h-10 w-10 rounded-full" src="{{ 
                                        Storage::url($equipo->imagen) }}">
                                    </div> 
                                    <div class="ml-4">
                                      <div class="text-sm font-medium text-gray-900">
                                      {{ $equipo->categoria->name }}
                                      </div>
                                      <div class="text-sm text-gray-500">
                                        {{ $equipo->codigo_interno }} 
                                        </div>
                                    </div>
                                  </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="flex items-center">
                                    <div class="ml-4">
                                      <div class="text-sm font-medium text-gray-900">
                                     {{ $equipo->serial}}
                                      </div>
                                    </div>
                                  </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="flex items-center">
                                    <div class="ml-4">
                                      <div class="text-sm font-medium text-gray-900">
                                        {{ $equipo->marca}}
                                      </div>
                                    </div>
                                  </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                      <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                          {{ $equipo->ubicacion}}
                                        </div>
                                      </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                      <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                          {{ $equipo->tipo}}
                                        </div>
                                      </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="text-sm text-gray-500">{{ $equipo->estado ? 'Activo' : 'No-Activo'}}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                  <a href="agregarEqupo?id={{ $equipo->id }}" class="bg-orange-500 hover:bg-orange-700 text-sm text-indigo-500 uppercase mr-2">
                                    Editar
                                  </a>

                                  <x-jet-danger-button wire:click="confirmEquipoDeletion( {{ $equipo->id}})" wire:loading.attr="disabled">
                                    Eliminar
                                </x-jet-danger-button>
                                </td>
                              </tr>
                               @endforeach
                              
                  
                              <!-- More people... -->
                            </tbody>
                          </table>
                          <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                         {{ $equipos->links() }} 
                          </div>
                        @endif 
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
            </div>
        </div>

        <x-jet-confirmation-modal wire:model="confirmingEquipoDeletion">
          <x-slot name="title">
              {{ __('Eliminar Categoria') }}
          </x-slot>
   
          <x-slot name="content">
              {{ __('Estas Seguro de Eliminar esta Categoria? ') }}
          </x-slot>
   
          <x-slot name="footer">
              <x-jet-secondary-button wire:click="$set('confirmingEquipoDeletion', false)" wire:loading.attr="disabled">
                  {{ __('Cancelar') }}
              </x-jet-secondary-button>
   
              <x-jet-danger-button class="ml-2" wire:click="deleteItem({{ $confirmingEquipoDeletion }})" wire:loading.attr="disabled">
                  {{ __('Si, Eliminar') }}
              </x-jet-danger-button>
          </x-slot>
      </x-jet-confirmation-modal>


   
    </div> 



   <!-- This example requires Tailwind CSS v2.0+ -->

