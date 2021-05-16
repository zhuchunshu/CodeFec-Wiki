<?php

namespace App\Plugins\Wiki\src\database;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWikiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('wiki')) {
            Schema::create('wiki', function (Blueprint $table) {
                $table->id();
                $table->string("title")->comment("标题");
                $table->longText("markdown");
                $table->longText("content")->nullable();
                $table->string("message")->nullable();
                $table->string("user_id")->default(1);
                $table->string("class_id");
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
        Schema::dropIfExists('wiki');
    }
}
