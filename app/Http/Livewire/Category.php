<?php

namespace App\Http\Livewire;

use App\Models\Courses\Category as CategoryModel;
use Livewire\Component;

class Category extends Component
{
    public function render()
    {
        $categories = CategoryModel::whereStatus('1')->get();
        return view('livewire.category', [ 'categories' => $categories]);
    }
}
