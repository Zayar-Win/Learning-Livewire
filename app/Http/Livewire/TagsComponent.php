<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;

class TagsComponent extends Component
{

    public $tags;

    protected $listeners = ['addTag','removeTag'];

    public function addTag($tag)
    {
        Tag::create([
            'tag' => $tag
        ]);

    }

    public function removeTag($tag)
    {
        Tag::where('tag', $tag)->first()->delete();
    }

    public function mount()
    {
        $allTags = Tag::all();
        $this->tags = json_encode($allTags->pluck('tag'));
    }

    public function render()
    {
        return view('livewire.tags-component');
    }
}
