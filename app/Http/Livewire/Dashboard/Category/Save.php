<?php

namespace App\Http\Livewire\Dashboard\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;

class Save extends Component
{
    use WithFileUploads;

    public $title;
    public $text;
    public $category;
    public $image;

    protected $rules =[

        'title' =>"required|min:4|max:255",
        'text' => "nullable",
        'image'=> "nullable|image|max:10000",
    ];

    public function mount($id = null)
    {
        if($id != null){
            $this->category = Category::findOrFail($id);
            $this->title = $this->category->title;
            $this->text = $this->category->text;
        }
    }

    public function render()
    {
        return view('livewire.dashboard.category.save');
    }

    public function submit()
    {
        //validations
        $this->validate();

        //save category
        if ($this->category){

            $this->category->update([
                'title' =>$this->title,
                'text' =>$this->text,
            ]);
            $this->emit("updated");
        }
        else{
            $this->category = Category::create(
                [
                'title' => $this->title,
                'slug' => str($this->title)->slug(),
                'text' => $this->text
                ]
            );

            $this->emit("created");
        }

        //upload image
        if ($this->image) {
            $imageName = $this->category->slug . '.' . $this->image->getClientOriginalExtension();

            $this->image->storeAs('images', $imageName,'public_upload_images');
            $this->category->update(['image' => $imageName]);
        }
    }
/*
    public function boot()
    {
        Log::info("boot");
    }

    public function booted()
    {
        Log::info("booted");
    }

    public function mount()
    {
        Log::info("mount");
    }

    public function hydrateTitle($value)
    {
        Log::info("hydrateTitle $value");
    }

    public function dehydrateFoo($value)
    {
        Log::info("dehydrateFoo $value");
    }

    public function hydrate()
    {
        Log::info("hydrate");
    }

    public function dehydrate()
    {
        Log::info("dehydrate");
    }

    public function updating($name, $value)
    {
        Log::info("updating $name $value");
    }

    public function updated($name, $value)
    {
        Log::info("updated $name $value");
    }

    public function updatingTitle($value)
    {
        Log::info("updatingTitle  $value");
    }

    public function updatedTitle($value)
    {
        Log::info("updatedTitle $value");
    }
    */
}
