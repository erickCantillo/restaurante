<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorias') }} 
        </h2>
       
    </x-slot>
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
                           
                            <input 
                            type="search" 
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
                                <x-jet-button wire:click="confirmItemAdd" class="bg-green-400 hover:bg-blue-700">
                                    Nueva Categoria
                                 </x-jet-button>
                            </div>
                          </div>
                        @if($categorias->count())
                          <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                              <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Nombre
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Nivel
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Categoria Padre
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Estado
                                </th>
                               
                                <th scope="col" class="relative px-6 py-3">
                                  <span class="sr-only">Edit</span>
                                </th>
                              </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                              @foreach($categorias as $categoria)
                              <tr>

                                <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                      <img class="h-10 w-10 rounded-full" src="{{ 
                                        Storage::url($categoria->imagen) }}">
                                    </div>
                                    <div class="ml-4">
                                      <div class="text-sm font-medium text-gray-900">
                                     {{ $categoria->name }} 
                                      </div>
                                    </div>
                                  </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="flex items-center">
                                
                                    <div class="ml-4">
                                      <div class="text-sm font-medium text-gray-900">
                                     {{ $categoria->nivel }} 
                                      </div>
                                    </div>
                                  </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="flex items-center">
                                
                                    <div class="ml-4">
                                      <div class="text-sm font-medium text-gray-900">
                                     {{ $categoria->categoria_id == 0 ? 'Sin Padre' : $categoria->padre->name}} 
                                      </div>
                                    </div>
                                  </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="text-sm text-gray-500">{{ $categoria->status ? 'Activo' : 'No-Activo'}}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                  <x-jet-button wire:click="confirmCategoriaEdit( {{ $categoria->id}})" class="bg-orange-500 hover:bg-orange-700">
                                    Editar
                                </x-jet-button>

                                  <x-jet-danger-button wire:click="confirmProductoDeletion( {{ $categoria->id}})" wire:loading.attr="disabled">
                                    Eliminar
                                </x-jet-danger-button>
                                </td>
                              </tr>
                              @endforeach
                              
                  
                              <!-- More people... -->
                            </tbody>
                          </table>
                          <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                          {{ $categorias->links() }}
                          </div>
                        @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
            </div>
        </div>

        <x-jet-confirmation-modal wire:model="confirmingCategoriaDeletion">
          <x-slot name="title">
              {{ __('Eliminar Categoria') }}
          </x-slot>
   
          <x-slot name="content">
              {{ __('Estas Seguro de Eliminar esta Categoria? ') }}
          </x-slot>
   
          <x-slot name="footer">
              <x-jet-secondary-button wire:click="$set('confirmingCategoriaDeletion', false)" wire:loading.attr="disabled">
                  {{ __('Cancelar') }}
              </x-jet-secondary-button>
   
              <x-jet-danger-button class="ml-2" wire:click="deleteItem({{ $confirmingCategoriaDeletion }})" wire:loading.attr="disabled">
                  {{ __('Si, Eliminar') }}
              </x-jet-danger-button>
          </x-slot>
      </x-jet-confirmation-modal>


        <x-jet-dialog-modal wire:model="confirmingCategoriaAdd">
            <x-slot name="title">
                {{ isset( $this->categoria->id) ? 'Editar Categoria' : 'Agregar '}}
                {{ $nivel }}
              </x-slot>
     
            <x-slot name="content">
              <div class="col-span-6 sm:col-span-4 my-4">
                <x-jet-label for="name" value="{{ __('Nivel') }}" />
                <select wire:model="nivel"  class="outline-none border-gray-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                <option value="Grupo" selected>Grupo</option>
                <option value="Sub Grupo">Sub Grupo</option>
                <option value="Categoria">Categoria</option>
                </select>
              </div>
             
              @if($nivel == 'Sub Grupo' || $nivel == 'Categoria')
                <div class="col-span-6 sm:col-span-4 my-4">
                  <x-jet-label for="name" value="{{ __('Grupo') }}" />
       
                  <select  wire:model="grupo" class="outline-none border-gray-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                    <option value="" selected>Seleccionar un Grupo</option>
                  @foreach($cat as $categoria)   
                  @if($categoria->categoria_id == 0)
                     <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                  @endif
                     
                  @endforeach
                  </select>
                </div>
              @endif
              @if($nivel == 'Categoria')
                <div class="col-span-6 sm:col-span-4 my-4">
                  <x-jet-label for="name" value="{{ __('Sub Grupo') }}" />
            

                  <select wire:model="subGrupo" class="outline-none border-gray-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                  @foreach($cat as $c)
                    @if($c->nivel == "Sub Grupo" && $c->categoria_id == $this->grupo)
                      <option value="">Seleccione un Sub Grupo</option>
                      <option value="{{ $c->id }}"> {{ $c->name }} </option>
                    @endif
                  @endforeach
                  </select>
                </div>
              @endif
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="name" value="{{ __('Nombre') }}" />
                    <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="categoria.name" />
                    <x-jet-input-error for="categoria.name" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="name" value="{{ __('Foto') }}" />
                    <x-jet-input id="photo" name="photo" wire:model="photo" type="file" class="mt-1 block" /> 
                    @error('photo') <span class="error">{{ $message }}</span> @enderror

                    @if ($photo)
                    Tu Foto:
                      <img src="{{ $photo->temporaryUrl() }}" class="h-12 w-12 rounded-full">
                     @endif
                     @if($photo_editar)
                     <img class="h-12 w-12 rounded-full" src="{{ 
                      Storage::url($photo_editar) }}">
                     @endif
                </div>
    
                <div class="col-span-6 sm:col-span-4 mt-4">
                    <label class="flex items-center">
                        <input type="checkbox" wire:model.defer="categoria.status" class="form-checkbox" />
                        <span class="ml-2 text-sm text-gray-600">Activo</span>
                    </label>
                </div>
            </x-slot>
     
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('confirmingCategoriaAdd', false)" wire:loading.attr="disabled">
                    {{ __('Cancelar') }}
                </x-jet-secondary-button>
     
                <x-jet-danger-button  class="ml-2 text-indigo-600" wire:click="saveCategoria()" wire:loading.attr="disabled">
                    {{ __('Guardar') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>

    </div> 



   <!-- This example requires Tailwind CSS v2.0+ -->

