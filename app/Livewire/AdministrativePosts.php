<?php

namespace App\Livewire;

use App\Models\AdministrativePost;
use Livewire\Component;
use Livewire\WithPagination;

class AdministrativePosts extends Component
{
    use WithPagination;
    
    public function render()
    {
        $administrative_posts = AdministrativePost::orderBy("label", "asc")->paginate(5);
        return view('livewire.administrative-posts')->with(["administrative_posts" => $administrative_posts]);
    }


    public function atualizar()
    {
    }
}
