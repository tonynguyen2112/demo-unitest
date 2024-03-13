<h1>{{ $post->title }}</h1>
<p>{{ $post->body }}</p>

<form action="{{ $post->subscriptionUrl() }}" method="POST">
    @csrf
    <label>
        <input type="text" placeholder="email" name="email" />
    </label>
    <button type="submit">Submit</button>
</form>
