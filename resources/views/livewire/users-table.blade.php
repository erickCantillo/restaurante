<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                          <div class="flex bg-white px-4 py-0  sm:px-6 justify-between">
                           
                            <input 
                            wire:model.debounce.500ms="search"
                            type="search" 
                            placeholder="Buscar..." 
                            class="form-input leading-tight focus:outline-none focus:shadow-outline rounded-md shadow-ms m-2 block content-center ">
                           
                     

                            <div wire:model="perPage" class="form-input rounded-md shadow-ms m-2 block">
                              <select class="outline-none rounded-md shadow text-gray-500 text-sm ml-6">
                              <option value="5"> 5 Por Pagina</option>
                              <option value="10"> 10 Por Pagina</option>
                              <option value="15"> 15 Por Pagina</option>
                              <option value="20"> 20 Por Pagina</option>
                              </select>
                            </div>
                          </div>
                        @if($users->count())
                          <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                              <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Nombre
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Identificación
                                </th>
                                {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Teams
                                </th> --}}
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Empresa
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Gerencia
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Lugar trabajo
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Cargo
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Celular
                                </th>
                               
                                <th scope="col" class="relative px-6 py-3">
                                  <span class="sr-only">Edit</span>
                                </th>
                              </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                              @foreach($users as $user)
                              <tr>

                                <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                      <img class="h-10 w-10 rounded-full" src="{{ $user->profile_photo_url }}">
                                    </div>
                                    <div class="ml-4">
                                      <div class="text-sm font-medium text-gray-900">
                                     {{ $user->name }} 
                                      </div>
                                      <div class="text-sm text-gray-500">
                                      {{ $user->email }} 
                                      </div>
                                    </div>
                                  </div>
                                </td>

                                {{-- <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="text-sm text-gray-500">{{ $user->allTeams()->pluck('name')->join(', ') }}</div>
                                </td> --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="text-sm text-gray-500">{{ $user->identificacion }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="text-sm text-gray-500">{{ $user->empresa }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="text-sm text-gray-500">{{ $user->gerencia }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="text-sm text-gray-500">{{ $user->lugar_trabajo }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="text-sm text-gray-500">{{ $user->cargo }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="text-sm text-gray-500">{{ $user->celular }}</div>
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
                          {{ $users->links() }}
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
    </div>



   <!-- This example requires Tailwind CSS v2.0+ -->

