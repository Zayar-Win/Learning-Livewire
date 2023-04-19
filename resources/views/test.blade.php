@extends('layouts.app')

@section('content')
<div class="my-8">
    <h2 class="text-lg font-semibold mt-4">DataTables Example</h2>

    <div class="mt-4">
        <livewire:data-table />
    </div>
</div>
<div class="my-8">
    <h2 class="text-lg font-semibold mt-4">Search Dropdown with ITune api</h2>

    <div class="mt-4">
        <livewire:search-drop-down />
    </div>
</div>

<div class="mt-5 flex flex-col px-8">
    <h2 class="text-lg font-semibold mt-4">Post with comment and Edit Features</h2>

    <div class="mt-4 flex flex-col">
        @foreach ($posts as $post)
        <div>
            <a href="/post/{{ $post->id }}" class="underline text-blue-500">{{ $post->title }}</a>
            <a href="/post/{{ $post->id }}/edit" class="text-blue-500">(edit)</a>
        </div>
        @endforeach
    </div>

</div>
<div class="my-8">
    <h2 class="text-lg font-semibold mt-4">Events Example with Tags</h2>

    <div class="mt-4">
        <livewire:tags-component />
        <div class="h-96"></div>
    </div>
</div>
@endsection