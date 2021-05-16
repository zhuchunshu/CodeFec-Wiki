<?php
namespace App\Plugins\Wiki\src\lib\menu;

class web {

    public static function add(){
        $yuan = config('codefec.navbar');
        $yuan['站内wiki'] = [
            'type' => 'singer',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
            <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
            <line x1="3" y1="6" x2="3" y2="19"></line>
            <line x1="12" y1="6" x2="12" y2="19"></line>
            <line x1="21" y1="6" x2="21" y2="19"></line>
         </svg>',
            'route' => 'wiki.index',
        ];
        config(['codefec.navbar' => $yuan]);
    }

}