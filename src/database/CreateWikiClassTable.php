<?php

namespace App\Plugins\Wiki\src\database;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWikiClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('wiki_class')) {
            Schema::create('wiki_class', function (Blueprint $table) {
                $table->id();
                $table->string("title")->comment("标题");
                $table->string("ename")->comment("英文名");
                $table->string("user_id")->comment("作者用户id")->default(1);
                $table->string("status")->comment("状态")->default("正常");
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wiki_class');
    }
}
