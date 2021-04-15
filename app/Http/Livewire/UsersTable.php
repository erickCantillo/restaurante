<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\user;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use Withpagination;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['excep' => '2']
    ];

    public $search = '';
    public $perPage = '2';
    public function render()
    {
        return view('livewire.users-table', [
            'users' => User::where('name', 'LIKE', "%{$this->search}%")
            ->orWhere('email', 'LIKE', "%{$this->search}%")
            ->paginate($this->perPage)
        ]);
    }

    public function clear(){
        $this->perPage = '2';
        $this->page = 1;
        $this->search = '';
        }
    }
