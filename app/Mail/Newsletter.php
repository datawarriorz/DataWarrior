<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Article;
use Illuminate\Support\Facades\URL;

class Newsletter extends Mailable
{
    use Queueable, SerializesModels;


    public $article;
    public $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
   
    public function __construct(Article $article)
    {
        $this->article=$article;
        $this->url=URL::to('').'/newsletterarticle/'.$article->article_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.newsletter');
    }
}
