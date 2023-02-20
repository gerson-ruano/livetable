<?php

namespace App\Http\Livewire;


use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class LiveUserTable extends Component
{
    use WithPagination;

    public $search = 'es';
    public $perPage = 5;

    public function render()
    {
        return view('livewire.live-user-table',[
            'users' => User::where('name', 'like', "%{$this->search}%")
            ->orWhere('email', 'like', "%{$this->search}%")
            ->paginate($this->perPage),
        ]);
    }
}
