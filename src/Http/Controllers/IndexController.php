<?php
namespace App\Plugins\Wiki\src\Http\Controllers;

use Dcat\Admin\Admin;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Layout\Column;
use App\Plugins\Wiki\src\database\CreateWikiTable;
use App\Plugins\Wiki\src\database\UpdateWikiTable;
use App\Plugins\Wiki\src\database\CreateWikiClassTable;
use App\Plugins\Wiki\Src\Models\WikiClass;

class IndexController{

    public function show(WikiClass $wikiClass){
        $page = $wikiClass
        ->where('status','正常')
        ->orderBy('created_at','desc')
        ->paginate(15);
        return view("Wiki::web.index",compact('page'));
    }

    // 数据库迁移
    public function SqlMigrate(){
        (new CreateWikiTable())->up();
        (new CreateWikiClassTable())->up();
        return Api_Json(200,'success','数据库迁移成功');
    }

}