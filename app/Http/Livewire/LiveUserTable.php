<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Http\Livewire\WithPagination;
use App\Models\User;

class LiveUserTable extends Component
{
    public function render()
    {
        return view('livewire.live-user-table',[
            'users' => User::paginate(5),
        ]);
    }
}
