<?php

namespace App\Http\Livewire;

use Illuminate\Queue\Listener;
use Livewire\Component;

class LiveModal extends Component
{
    public $showModal = 'hidden';

    protected $listeners  = [
        'showModal' => 'sacarModal'
    ];

    public function render()
    {
        return view('livewire.live-modal');
    }

    public function sacarModal($user)
    {
        $this->showModal = '';
    }

    public function cerrarModal()
    {
        $this->showModal = 'hidden';
    }
}
