<div>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Prestamos') }}
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
                           
                            <input type="search" placeholder="Buscar..." class="form-input leading-tight focus:outline-none focus:shadow-outline rounded-md shadow-ms m-2 block content-center ">
                           
                            <div class="form-input rounded-md shadow-ms m-2 block">
                              <select class="outline-none rounded-md shadow text-gray-500 text-sm ml-6">
                                <option value="5"> 5 Por Pagina</option>
                                <option value="10"> 10 Por Pagina</option>
                                <option value="15"> 15 Por Pagina</option>
                                <option value="20"> 20 Por Pagina</option>
                              </select>
                            </div>
                            <div class="mr-2 mt-3">
<<<<<<< HEAD
                              <a href="agregarPrestamo" class="bg-green-400 hover:bg-blue-700">
=======
                              <x-jet-button wire:click="confirmItemAdd" class="bg-indigo-200 hover:bg-blue-700">
>>>>>>> 6ccdb011023f8189df194b604927c97665304327
                                  Nuevo Prestamo
                              </a>
                          </div>
                          </div>
                        @if($prestamos->count())
                          <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                              <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Equipo
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Serial
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Fecha prestamo
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Persona
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Cedula
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Celular
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Supervisor
                                </th>
                                
                                <th scope="col" class="relative px-6 py-3">
                                  <span class="sr-only">Edit</span>
                                </th>
                              </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                              @foreach($prestamos as $prestamo)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="{{ 
                                                Storage::url($prestamo->equipo->imagen) }}">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $prestamo->equipo->categoria->name }}
                                                </div>
                                                <div class="text-sm text-gray-500">{{ $prestamo->equipo->codigo_interno }} 
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $prestamo->equipo->serial }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $prestamo->fecha_prestamo }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $prestamo->user->name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $prestamo->user->cedula }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $prestamo->user->celular }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $prestamo->supervisor->supervisor_id }}</div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Delete</a>
                                    </td>
                                </tr>
                              @endforeach
                              
                              <!-- More people... -->
                            </tbody>
                          </table>
                          <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                          {{ $prestamos->links() }}
                          </div>
                        @else
                        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                          No hay resultados para la busqueda "{{ $search }}" en la pagina {{ $page }} al mostrar {{ $perPage }} por pagina 
                          </div>
                        @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
            </div>
        </div>
        <x-jet-confirmation-modal wire:model="confirmingPrestamoDeletion">
          <x-slot name="title">
              {{ __('Eliminar Producto') }}
          </x-slot>
    
          <x-slot name="content">
              {{ __('Estas Seguro de Eliminar este Producto? ') }}
          </x-slot>
    
          <x-slot name="footer">
              <x-jet-secondary-button wire:click="$set('confirmingPrestamoDeletion', false)" wire:loading.attr="disabled">
                  {{ __('Cancelar') }}
              </x-jet-secondary-button>
              <x-jet-danger-button class="ml-2" wire:click="deleteItem({{ $confirmingPrestamoDeletion }})" wire:loading.attr="disabled">
                  {{ __('Si, Eliminar') }}
              </x-jet-danger-button>
          </x-slot>
      </x-jet-confirmation-modal>
    
      <x-jet-dialog-modal wire:model="confirmingPrestamoAdd">
          <x-slot name="title">
              {{ isset( $this->prestamo->id) ? 'Editar Producto' : 'Agregar Producto Nuevo'}}
          </x-slot>
    
          <x-slot name="content">
              <div class="col-span-6 sm:col-span-4">
                  <x-jet-label for="name" value="{{ __('Codigo Interno del Equipo') }}" />
                  <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="prestamo" />
                  <x-jet-input-error for="producto.name" class="mt-2" />
              </div>
    
              <div class="col-span-6 sm:col-span-4 mt-4">
                  <x-jet-label for="codigo" value="{{ __('Codigo del Equipo') }}" />
                  <x-jet-input id="codigo" type="text" class="mt-1 block w-full" wire:model.defer="prestamo.codigo_interno" />
                  <x-jet-input-error for="prestamo.codigo_interno" class="mt-2" />
              </div>
              <div class="col-span-6 sm:col-span-4 mt-4">
                  <x-jet-label for="cedula" value="{{ __('Identificación del Operario') }}" />
                  <x-jet-input id="cedula" type="number" class="mt-1 block w-full" wire:model.defer="prestamo.cedula" />
                  <x-jet-input-error for="prestamo.cedula" class="mt-2" />
              </div>
              <div class="col-span-6 sm:col-span-4 mt-4">
                  <x-jet-label for="cedula" value="{{ __('Identificación del Supervisor') }}" />
                  <x-jet-input id="cedula" type="number" class="mt-1 block w-full" wire:model.defer="prestamo.supervisor" />
                  <x-jet-input-error for="prestamo.supervisor" class="mt-2" />
              </div>
              <div class="col-span-6 sm:col-span-4 mt-4">
                  <x-jet-label for="cedula" value="{{ __('Proyecto') }}" />
                  <x-jet-input id="cedula" type="number" class="mt-1 block w-full" wire:model.defer="prestamo.proyecto" />
                  <x-jet-input-error for="prestamo.proyecto" class="mt-2" />
              </div>
              <div class="col-span-6 sm:col-span-4 mt-4">
                  <x-jet-label for="cedula" value="{{ __('Bloque') }}" />
                  <x-jet-input id="cedula" type="number" class="mt-1 block w-full" wire:model.defer="prestamo.bloque" />
                  <x-jet-input-error for="prestamo.bloque" class="mt-2" />
              </div>
    
             
          </x-slot>
    
          <x-slot name="footer">
              <x-jet-secondary-button wire:click="$set('confirmingPrestamoAdd', false)" wire:loading.attr="disabled">
                  {{ __('Cancelar') }}
              </x-jet-secondary-button>
    
              <x-jet-danger-button  class="ml-2 text-indigo-600" wire:click="savePrestamo()" wire:loading.attr="disabled">
                  {{ __('Guardar') }}
              </x-jet-danger-button>
          </x-slot>
      </x-jet-dialog-modal>
    
    </div>

  
