<x-mail::message>
    # Introduction

    Your name is {{ $contact['name'] }}
    Your email is {{ $contact['email'] }}
    Your phone is {{ $contact['phone'] }}
    Your message is {{ $contact['message'] }}

    Welcome from our service

    <x-mail::button :url="''">
        Button Text
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>