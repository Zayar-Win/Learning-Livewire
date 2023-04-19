<div class="w-1/2 border px-4 py-2" wire:ignore x-init="
    new Taggle($el,{
        tags: {{ $tags }},
        onTagAdd: function(event, tag) {
            Livewire.emit('addTag',tag)
        },
        onTagRemove: function(event, tag) {
            Livewire.emit('removeTag',tag)
        },
    }) 
    ">

</div>