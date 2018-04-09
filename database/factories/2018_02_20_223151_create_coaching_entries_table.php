<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoachingEntriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('coaching_entries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jira_number');
            $table->string('jira_status');
            $table->string('agent');
            $table->integer('agent_id')->references('id')->on('agents');
            $table->string('region');
            $table->string('jrt_feedback');
            $table->boolean('completed')->nullable();
            $table->string('manager_notes')->nullable();
            $table->string('coached_by')->nullable();
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('coaching_entries');
    }

}
