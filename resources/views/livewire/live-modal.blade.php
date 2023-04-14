<div>
    <form wire:submit.prevent="{{$method}}">
        <x-component-modal :showModal="$showModal" :action="$action">
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">
                    {{$action}}
                </h3>
                <div class="mt-2">
                    <p class="text-sm text-gray-500">

                    <div class="flex">
                        <x-component-input placeholder="Ingrese su nombre" name="name" label="Nombre">
                        </x-component-input>
                        <x-component-input placeholder="Ingrese su apellido" name="lastname" label="Apellido">
                        </x-component-input>
                    </div>
                    <div class="flex">
                        <x-component-input placeholder="Ingrese su correo" name="email" label="email">
                        </x-component-input>
                        <x-component-input-select name="role" label="Role" :options="['admin' => 'Administrador', 'seller' => 'Vendedor', 'client' => 'Cliente']">
                        </x-component-input-select>
                    </div>
                    <div class="flex">
                        @if ($profile_photo_path)
                            <img src="{{ asset('storage/' . $user->profile_photo_path) }}" width="100">
                        @else
                            <p>No tiene una foto de perfil.</p>
                        @endif
                        <x-component-input placeholder="Ingrese su imagen" name="profile_photo_path"  type="file" label="Imagen">
                        </x-component-input>
                        
                    </div>
                    @if($action == 'Registrar')
                    <div class="flex">
                        <x-component-input placeholder="Ingrese su clave " name="password" type="password" label="Clave">
                        </x-component-input>
                        <x-component-input placeholder="Confirme su clave" name="password_confirmation" type="password" label="Confirmacion de clave">
                        </x-component-input>
                    </div>
                    @endif

                    </p>
                </div>
            </div>
        </x-component-modal>
    </form>
</div>
