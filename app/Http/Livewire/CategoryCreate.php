<?php

namespace App\Http\Livewire;

use App\Models\Product_category;
use Livewire\Component;

class CategoryCreate extends Component
{

    public $name;

    public function render()
    {
        return view('livewire.category-create');
    }

    public function store()
    {
        Product_category::create([
            'category_name' => $this->name
        ]);

        $this->resetInput();

        $this->emit('categoryStored');
    }

    public function resetInput()
    {
        $this->name = null;
    }
}
