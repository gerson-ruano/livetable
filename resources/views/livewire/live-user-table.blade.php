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
                    <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                    </svg></button>

                @if($users->count())

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-600 uppercase bg-gray-50 dark:bg-gray-600 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                                <button wire:click="sortable('id')">
                                    <span class="fa fa{{ $camp === 'id' ? $icon : '-sort' }}"></span>
                                </button>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                NOMBRE
                                <button wire:click="sortable('name')">
                                    <span class="fa fa{{ $camp === 'name' ? $icon : '-sort' }}"></span>
                                </button>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                APELLIDO
                                <button wire:click="sortable('lastname')">
                                    <span class="fa fa{{ $camp === 'lastname' ? $icon : '-sort' }}"></span>
                                </button>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                EMAIL
                                <button wire:click="sortable('email')">
                                    <span class="fa fa{{ $camp === 'email' ? $icon : '-sort' }}"></span>
                                </button>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ROL
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ACCION
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr
                                class="hover:bg-gray-50">
                                <th
                                    class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                                    <div class="relative h-10 w-10">
                                        {{ $user->id }}
                                    </div>
                                </th>
                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                    <div class="inline-flex items-center gap-1 rounded-full px-2 py-1 text-xs font-semibold text-green-600">
                                        <img class="object-cover w-8 h-8 rounded-full"
                                            src="{{ asset('storage/' . $user->profile_photo_path) }}">
                                        <h2 class="text-sm font-medium text-gray-800 dark:text-gray-400 ">
                                            {{ $user->name }}</h2>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->r_lastname->lastname }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->email }}
                                </td>
                                <td class="flex content-center">
                                    <span
                                        class=" pl-2 h-2.5 w-2.5 rounded-full mr-2 
                                        {{ $user->rol === 'Administrador'
                                            ? 'bg-gray-500'
                                            : ($user->rol === 'Vendedor'
                                                ? 'bg-blue-400'
                                                : 'bg-green-500') }}"></span>
                                    <div class="text-base font-semibold">{{ $user->rol }}</div>
            </div>
            </td>
            <td class="px-6 py-4">
                <div class="flex items-center gap-x-2">
                    <a href="javascript:void(0)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                        wire:click="showModal({{ $user->id }})"><svg class="flex-row h-6 w-6 text-blue-500"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d=" M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg></a>
                    <a href="javascript:void(0)" class="font-medium text-red-500 dark:text-gray-400 hover:underline"
                        onClick="borrarUsuario({{ $user->id }})"><svg class="flex-row h-6 w-6 text-red-500"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg></a>
                </div>
            </td>
            </tr>
            @endforeach
            </tbody>
            </table>
            @else
            <div class="px-6 py-4 flex justify-center items-center h-screen">
                <div class = "p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
                    <span class = "font-medium">Info alert!</span> No existe ningun usuario coincidente.
                </div>
            </div>
        @endif
            <div class="bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
                {{ $users->links() }}
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            function borrarUsuario(user) {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: 'Desea eliminar el Usuario?',
                    text: "Esta accion ya no podra revertirse!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: ' Eliminar! ',
                    cancelButtonText: ' Cancelar! ',
                    reverseButtons: true
                }).then((result) => {
                        if (result.isConfirmed) {
                            Livewire.emit('deleteUserList', user)
                            swalWithBootstrapButtons.fire(
                                'Eliminado!',
                                'El usuario a sido elimando.',
                                'success'
                            )
                        } else if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            swalWithBootstrapButtons.fire(
                                    'Cancelar',
                                    'No se hizo ningun cambio :)',
                                    'error'
                                )
                            }
                        })
                }
        </script>
    @endpush
</div>


