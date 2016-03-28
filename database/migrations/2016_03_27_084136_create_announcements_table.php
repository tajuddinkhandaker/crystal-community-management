<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Carbon\Carbon;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('announcements', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id');
            $table->string('title')->default('No announcement for today ...')->comment('The title of announcement wchi will show up');
            $table->text('source_url')->nullable()->comment('The url where the page will navigate when title clicked');
            $table->date('expired_at')->default(Carbon::now()->subWeeks(1))->comment('The data and time when the announcement will dissapear from billboard');
            $table->boolean('has_source_url')->default(false)->comment('confirms if it has a source url to navigate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('announcements');
    }
}
