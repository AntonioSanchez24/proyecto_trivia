<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Comunidad extends Component
{
    public $users;

    public $searchTerm = "";

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount(){
        if($this->searchTerm !== ""){
            $this->users = User::where('name', 'like', '%' . $this->searchTerm . '%')->get();
        } else{
            $this->users = User::all();
        }
    }   
    public function render()
    {
        

        return view('livewire.comunidad');
    }

    public function updatedSearchTerm()
{
    $this->users = User::where('name', 'like', '%' . $this->searchTerm . '%')->get();
}

   
}