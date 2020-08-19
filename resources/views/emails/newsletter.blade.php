@component('mail::message')

<h3>Dear Data Warrior,</h3>
<br>
<div style="text-align: center">
    <p>An article has been published by</p>
    <p>{{ $article->author }}</p>
    <p>on</p>
    <h3>{{ $article->title }}</h3>
    <p>Feel free to have a look at it!</p>
</div>

@component('mail::button', ['url' => 'localhost:8000/newsletterarticle/{{ $article->article_id }}'])
View Article
@endcomponent
<a href="localhost:8000/newsletterarticle/{{ $article->article_id }}" class="button button-{{ $color ?? 'primary' }}" target="_blank" rel="noopener">{{ $slot }}</a
Thanks,<br>
{{ config('app.name') }}
@endcomponent