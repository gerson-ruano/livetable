<?php

namespace App\Http\Livewire;

use App\Http\Requests\RequestUpdateUser;
use Illuminate\Queue\Listener;
use Livewire\Component;
use App\Models\User;

class LiveModal extends Component
{
    public $showModal = 'hidden';
    public $name = '';
    public $lastname = '';
    public $email = '';
    public $role = '';

    protected $listeners  = [
        'showModal' => 'sacarModal'
    ];

    public function render()
    {
        return view('livewire.live-modal');
    }

    public function sacarModal(User $user)
    {
        $this->name = $user->name;
        $this->lastname = $user->r_lastname->lastname;
        $this->email = $user->email;
        $this->role = $user->role;

        $this->showModal = '';
    }

    public function cerrarModal()
    {
        $this->reset();
    }

    public function actualizarUsuario()
    {
        $requestUser = new RequestUpdateUser();
        $this->validate($requestUser->rules(), $requestUser->messages());

        //dd('donde se hace ');
    }
}
