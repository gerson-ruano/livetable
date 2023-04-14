<?php

namespace App\Http\Livewire;

use App\Http\Requests\RequestUpdateUser;
use Illuminate\Queue\Listener;
use Livewire\Component;
use App\Models\User;
use App\Models\Apellido;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Livewire\TemporaryUploadedFile;

class LiveModal extends Component
{
    use WithFileUploads;
    //use TemporaryUploadedFile;

    public $showModal = 'hidden';
    public $name = '';
    public $lastname = '';
    public $email = '';
    public $role = '';
    public $user = null;
    public $action = '';
    public $method = '';
    public $password = '';
    public $password_confirmation = '';
    public $profile_photo_path = null;

    protected $listeners  = [
        'showModal' => 'sacarModal',
        'showModalNewUser' => 'sacarModalNuevo',
    ];

    public function render()
    {
        return view('livewire.live-modal');
    }

    public function sacarModal(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->lastname = $user->r_lastname->lastname;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->profile_photo_path = $user->profile_photo_path;

        $this->action = 'Actualizar';
        $this->method = 'actualizarUsuario';

        $this->showModal = '';
    }

    public function sacarModalNuevo()
    {
        $this->user = null;
        $this->action = 'Registrar';
        $this->method = 'registrarUsuario';

        $this->showModal = '';
    }

    public function cerrarModal()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset();
    }

    public function actualizarUsuario()
    {
        $requestUser = new RequestUpdateUser();
        
        $values = $this->validate($requestUser->rules($this->user), $requestUser->messages());
        //dd($values);
        
        $profile = ['profile_photo_path' => $this->loadImage($values['profile_photo_path'])];

        //dd($profile);
          
        $profile = ['profile_photo_path' => $this->loadImage($values['profile_photo_path'])];
           

        $values = array_merge($values, $profile);

        //dd($values);

        $this->user->update($values);

        $this->user->r_lastname()->update(['lastname' => $values['lastname']]);

        $this->emit('userListUpdate');

        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset();

        //dd($values);
    }

    public function updated($label)
    {
        $requestUser = new RequestUpdateUser();

        $this->validateOnly($label, $requestUser->rules($this->user), $requestUser->messages());

    }

    public function registrarUsuario()
    {
        $requestUser = new RequestUpdateUser();
        $values = $this->validate($requestUser->rules($this->user), $requestUser->messages());

        
        $user = new User;
        $apellido = new Apellido;
        $apellido->lastname = $values['lastname'];
        //Password

        $user->fill($values);
        $user->profile_photo_path = $this->loadImage($values['profile_photo_path']);
        $user->password = bcrypt($values['password']);
        DB::transaction(function() use ($user, $apellido){
            $user->save();
            $apellido->r_user()->associate($user)->save();
        });
     
        $this->cerrarModal();
    }

    private function loadImage(TemporaryUploadedFile $image)
    {
        $extension = $image->getClientOriginalExtension();
        //$new_name = time().'.'.$extension;

       $location = \Storage::disk('public')->put('img', $image);

       return $location;
    }
}
