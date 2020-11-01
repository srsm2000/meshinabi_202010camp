<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->integer('category_id')
                ->after('category')
                ->unsigned()                            // 正負の符号なし
                ->default(1);                           // 空で外部キーを設定できないのでデフォルトを設定
            $table->foreign('category_id')              // category_idに'外部キー'を設定する
                ->references('id')->on('categories')    // 相手のカラムを設定 onはテーブルを表す（この場合categoriesのid）
                ->onDelete('restrict');                 // 参照先の削除を禁止する
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->dropForeign('restaurants_category_id_foreign'); //外部キー制約の削除
            $table->dropColumn('category_id');                      //カラム削除
        });
    }
}
