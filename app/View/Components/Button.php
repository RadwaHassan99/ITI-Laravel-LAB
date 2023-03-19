<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public $type;
    public $url;
    public $postId;

    public function __construct($type = null, $postId = null)
    {
        $this->type = $type;
        $this->postId = $postId;
        $this->url = $this->getUrl();
    }

    public function getUrl()
    {
        switch ($this->type) {
            case 'success':
                return route('posts.create');
                break;

            case 'primary':
                return route('posts.show', ['post' => $this->postId]);
                break;

            case 'secondary':
                return route('posts.edit', ['post' => $this->postId]);
                break;

            case 'danger':
                return route('posts.destroy', ['post' => $this->postId]);
                break;

            default:
                return '#';
        }
    }

    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
