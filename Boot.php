<?php

namespace App\Plugins\Wiki;

use Dcat\Admin\Admin;
use Illuminate\Support\Facades\Route;
use App\Plugins\Wiki\src\lib\menu\web;

class Boot
{

    public function handle()
    {
        // 路由
        $this->route();
        // 菜单
        $this->menu();
        // 配置
        $this->config();
    }

    public function route()
    {
        Route::middleware(config('admin.route.middleware'))
            ->prefix(config('admin.route.prefix') . "/wiki")
            ->name('admin.wiki.')
            ->group(plugin_path("Wiki/src/routes/admin.php"));
        Route::middleware('web')
            ->prefix("wiki")
            ->name('wiki.')
            ->group(plugin_path("Wiki/src/routes/web.php"));
        if (get_options_setting("wikiishome") == "开启") {
            Route::get('/', function () {
                return redirect()->route("wiki.index");
            })->name("index");
        }
    }

    public function menu()
    {
        Admin::menu()->add(include __DIR__ . '/src/lib/menu/admin.php', 0);
        web::add();
    }

    public function config()
    {
        $yuan = config('codefec.setting.admin.kaiguan');
        $yuan['wiki设为首页'] = 'wikiishome';
        config(['codefec.setting.admin.kaiguan' => $yuan]);
    }
}
