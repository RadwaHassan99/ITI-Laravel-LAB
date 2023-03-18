<?php
namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public $type;
    public $url;
    public $routeParam;

    public function __construct($type = null, $url = null, $routeParam = null)
    {
        $this->type = $type;
        $this->url = $url ?? $this->getUrl();
        $this->routeParam = $routeParam;
    }

    public function getUrl()
    {
        switch ($this->type) {
            case 'primary':
                if (!empty($this->routeParam)) {
                    return route('posts.show', ['post' => $this->routeParam]);
                }

            case 'secondary':
                return route('posts.edit');

            case 'danger':
                return route('posts.index');

            default:
                return '#';
        }
    }




    public function render(): View|Closure|string
    {
        return view('components.button', [
            'url' => $this->url,
            'type' => $this->type,
        ]);
    }
}

