<?php

namespace App\Http\Livewire;

use App\Models\Product_category;
use Livewire\Component;

class CategoryIndex extends Component
{

    protected $listeners = [
        'categoryStored' => '$refresh'
    ];

    public function render()
    {

        return view('livewire.category-index', [
            'category' => Product_category::latest()->get()
        ]);
    }

}
