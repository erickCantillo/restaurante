<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\user;

class UsersTable extends Component
{
    public function render()
    {
        return view('livewire.users-table', [
            'users' => User::paginate(5)
        ]);
    }
}
