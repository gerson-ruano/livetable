<?php

namespace App\Http\Livewire;

use App\Models\Apellido;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class LiveUserTable extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 5;
    public $camp = null;
    public $order = null;
    public $icon = '-sort';
    public $user_role = '';
    public $showModal = '';

    protected $queryString =[
        'search' => ['except' => ''],
        'camp' => ['except' => null],
        'order' => ['except' => null],
    ];

    protected $listeners = [
        'userListUpdate' => 'render'
    ];

    public function render()
    {
        $users = User::termino($this->search)
        ->role($this->user_role);

        if($this->camp && $this->order){
            if($this->camp === 'lastname'){
                $users = $users->orderBy(Apellido::select('lastname')
                ->whereColumn('apellidos.user_id', 'users.id'), $this->order);
            }else{
                $users = $users->orderBy($this->camp, $this->order);
            }

        }else {
            $this->camp = null;
            $this->order = null;
        }
        $users = $users->paginate($this->perPage);


        return view('livewire.live-user-table',[
            'users' => $users
        ]);
    }

    public function mount()
    {
        $this->icon = $this->iconDirection($this->order);
    }

    public function clear()
    {
        $this->reset();
       // $this->page = 1;
       // $this->order = null;
       // $this->camp = null;
       // $this->icon = '-circle';
       // $this->search = '';
       // $this->perPage = 5;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortable($camp)
    {
        if($camp != $this->camp)
            $this->order = null;
        switch ($this->order){
            case null:
                $this->order = 'asc';
                $this->icon = '-arrow-circle-up';
                break;
            case 'asc':
                $this->order = 'desc';
                $this->icon = '-arrow-circle-down';
                break;
            case 'desc':
                $this->order = null;
                $this->icon = '-sort';
                break;
        }
        $this->icon = $this->iconDirection($this->order);
        $this->camp = $camp;
    }

    public function iconDirection($sort) //: string
    {
        if(!$sort){
            return '-sort';
        }

        return $sort === 'asc' ? '-arrow-circle-up' : '-arrow-circle-down';
    }

    public function showModal(User $user)
    {
        if($user->name)
        {
            $this->emit('showModal', $user);
        }else{
            $this->emit('showModalNewUser');
        }      
    }
}
