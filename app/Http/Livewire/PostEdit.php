<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostEdit extends Component
{
    use WithFileUploads;

    public $post;
    public $title;
    public $content;
    public $photo;
    public $successMessage;
    public $tempUrl;

    protected $rules = [
        'title' => 'required',
        'content' => 'required',
        'photo' => 'nullable|sometimes|image|max:5000'
    ];

    public function mount()
    {
        $this->title = $this->post->title;
        $this->content  = $this->post->content;
    }

    public function updatedPhoto()
    {
        $this->tempUrl = $this->photo->temporaryUrl();
    }

    public function submitForm()
    {
        $this->validate();

        $imageToUpdate = $this->photo ?? null;

        $this->post->update([
            'title' => $this->title,
            'content' => $this->content,
            'photo' => $this->photo ? $this->photo->store('photos', 'public') : $imageToUpdate,
        ]);

        $this->successMessage = "Post Update Success.";
    }

    public function render()
    {
        return view('livewire.post-edit');
    }
}
