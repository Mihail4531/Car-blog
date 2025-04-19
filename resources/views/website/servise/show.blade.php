<x-app :title="$title">
    <h1>{{ $title }} Details</h1>
    <p>{{ $post->description }}</p>
    <p>{{ $post->content }}</p>
    <livewire:order-service.button :serviceId='$post->id'/>
</x-app>
