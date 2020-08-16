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
@component('mail::button', ['url' => ''])
View Article
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent