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
                            class="form-input w-full text-gray-500 ml-6 border border-gray-300 rounded-lg w-20"
                            wire:model="search" placeholder="Ingrese el termino de busqueda..">
                            <button wire:click="clear" class="ml-6">
                                <span class="fa fa-eraser"></span>
                            </button>
                    </div>
                </div>

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>

                            <th scope="col" class="px-6 py-3">
                                ID
                                <button wire:click="sortable('id')">
                                    <span class="fa fa{{$camp === 'id' ? $icon: '-circle'}}"></span>
                                </button>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                NOMBRE
                                <button wire:click="sortable('name')">
                                    <span class="fa fa{{$camp === 'name' ? $icon: '-circle'}}"></span>
                                </button>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                EMAIL
                                <button wire:click="sortable('email')">
                                    <span class="fa fa{{$camp === 'email' ? $icon: '-circle'}}"></span>
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
                                        {{-- <div class="text-base font-semibold">Neil Sims</div>
                        <div class="font-normal text-gray-500">neil.sims@flowbite.com</div> --}}
                                    </div>
                                </th>
                                <td class="px-6 py-4">
                                    {{ $user->name }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div>
                                        {{ $user->email }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="pl-3">
                                        <div class="text-base font-semibold">Admin</div>
                                        {{-- <div class="font-normal text-gray-500">neil.sims@flowbite.com</div> --}}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
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
