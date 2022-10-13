<?php

namespace App\Http\Livewire\Dashboard\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()

    {
        $categories = Category::paginate(10);  // get all categories
        return view('livewire.dashboard.category.index',compact('categories'));
    }

    public function delete(Category $category)
    {
        $this->emit("delete");
        //$category->delete();
    }
}
