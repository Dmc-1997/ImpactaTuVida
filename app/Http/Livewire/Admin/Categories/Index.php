<?php

namespace App\Http\Livewire\Admin\Categories;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Courses\Category;
use Illuminate\Support\Str;

class Index extends Component
{
    use WithPagination;

    public $item_id = '';
    public $title = '';
    public $subtitle = '';
    public $icon = '';
    public $slug = '';
    public $featured = 0;
    public $status = 0;
    public $position = 0;
    public $enterPosition = 0;

    public $editItem = 0;

    protected $listeners = ['adminCategoryDelete'];

    public function render()
    {
        $categories = Category::paginate(100);

        return view('livewire.admin.categories.index', ['categories' => $categories]);
    }

    public function default()
    {
        $this->item_id = '';
        $this->title = '';
        $this->subtitle = '';
        $this->icon = '';
        $this->slug = '';
        $this->featured = 0;
        $this->status = 0;
    }

    public function store()
    {
        $this->validate([
            'title' => 'required'
        ]);

        $position = Category::count();

        $data = new Category();
        $data->title    = $this->title;
        $data->subtitle = $this->subtitle;
        $data->icon     = $this->icon;
        $data->slug     = Str::slug($this->title, '-');
        $data->featured = $this->featured;
        $data->status   = 1;
        $data->position  = $position++;
        $data->save();

        $this->default();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => 'Categoría creada']);

    }

    public function edit($id)
    {
        $data = Category::find($id);

        $this->item_id = $id;
        $this->title   =  $data->title;
        $this->subtitle =  $data->subtitle;
        $this->icon    = $data->icon;
        $this->slug    = $data->slug;
        $this->featured = $data->featured;
        $this->status  = $data->status;
        $this->position  = $data->position;

        $this->editItem = $id;

        
        $this->dispatchBrowserEvent('show-edit-category-modal');
    }

    public function update()
    {
        Category::whereId($this->item_id)->update([
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'icon' => $this->icon,
            'slug' => $this->slug,
            'featured' => $this->featured,
            'status' => $this->status,
            'position' => $this->position
        ]);

        $this->editItem = 0;

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => 'Categoría editada']);
    }

    public function toggleActive($item_id)
    {
        $category = Category::find($item_id);
        $category->status = !$category->status;
        $category->save();
    }

    public function toggleFeatured($item_id)
    {
        $category = Category::find($item_id);
        $category->featured = !$category->featured;
        $category->save();
    }

    public function editPosition($item_id)
    {
        $data = Category::find($item_id);
        $this->position = $data->position;
        $this->enterPosition = $data->id;
    }

    public function updatePosition($item_id)
    {
        $this->validate([
            'position' => 'numeric'
        ]);

        $data = Category::find($item_id);
        $data->position = $this->position;
        $data->save();

        $this->enterPosition = 0;
        $this->position = 0;

    }









    public function adminCategoryDelete($item_id)
    {
        $category = Category::find($item_id);
        $category->delete();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => 'Categoría eliminada']);

    }
}
