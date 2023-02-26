<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <div class="bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
                    <div class="flex text-gray-500">
                        <select wire:model="perPage" class="border border-gray-300 rounded-lg w-20">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                        </select>
                        <input type="text"
                            class="form-input w-full text-gray-500 ml-6 border border-gray-300 rounded-lg w-20 mr-2"
                            wire:model="search" placeholder="Ingrese el termino de busqueda..">
                            <select wire:model="user_role" class="border border-gray-300 rounded-lg w-40">
                                <option value="">Seleccione</option>
                                <option value="admin">Administrador</option>
                                <option value="seller">Vendedor</option>
                                <option value="client">Cliente</option>

                            </select>
                            <button wire:click="clear" class="ml-6">
                                <span class="fa fa-eraser"></span>
                            </button>
                    </div>
                </div>
                <button type="button" wire:click="showModal"
                            class="p-8 mt-2 flex items-center  rounded-md
                border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                <svg class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
            </svg></button>

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>

                            <th scope="col" class="px-6 py-3">
                                ID
                                <button wire:click="sortable('id')">
                                    <span class="fa fa{{$camp === 'id' ? $icon: '-sort'}}"></span>
                                </button>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                NOMBRE
                                <button wire:click="sortable('name')">
                                    <span class="fa fa{{$camp === 'name' ? $icon: '-sort'}}"></span>
                                </button>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                APELLIDO
                                <button wire:click="sortable('lastname')">
                                    <span class="fa fa{{$camp === 'lastname' ? $icon: '-sort'}}"></span>
                                </button>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                EMAIL
                                <button wire:click="sortable('email')">
                                    <span class="fa fa{{$camp === 'email' ? $icon: '-sort'}}"></span>
                                </button>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ROL
                            </th>
                            <th scope="col" class="px-6 py-3">

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                <th scope="row"
                                    class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="pl-3">
                                        {{ $user->id }}
                                    </div>
                                </th>
                                <td class="px-6 py-4">
                                    {{ $user->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->r_lastname->lastname }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->email }}
                                </td>
                                <td class="flex content-center">
                                        <span class=" pl-2 h-2.5 w-2.5 rounded-full mr-2 
                                        {{$user->rol === 'Administrador' ? 'bg-gray-400' : 
                                        ($user->rol === 'Vendedor' ? 'bg-blue-400' : 'bg-green-500')}}"></span>
                                        <div class="text-base font-semibold">{{$user->rol}}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="javascript:void(0)"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                        wire:click="showModal({{$user->id}})"
                                        ><svg class="flex-row h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d=" M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>



