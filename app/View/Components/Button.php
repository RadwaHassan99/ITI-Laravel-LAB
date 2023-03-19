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

    public function __construct($type = null, $routeParam = null)
    {
        $this->type = $type;
        $this->url = $this->getUrl() ?? "";
        $this->routeParam = $routeParam;
    }


    public function getUrl()
    {
        switch ($this->type) {
            case 'success':
                return route('posts.create',"");
                break;

            case 'primary':
                return route('posts.show', "");
                break;


            case 'secondary':
                return route('posts.edit',"");
                break;

            case 'danger':
                return route('posts.destroy',"");
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
