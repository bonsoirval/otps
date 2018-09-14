<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYearThreeTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'year_three';

    /**
     * Run the migrations.
     * @table year_three
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('mat_number')->nullable();
            $table->enum('semester', ['first', 'second'])->nullable();
            $table->integer('alumni')->nullable();
            $table->string('course', 45)->nullable();
            $table->integer('score')->nullable();
            $table->enum('grade', ['A', 'B', 'C', 'D', 'E', 'F'])->nullable()->default('F');
            $table->enum('remark', ['FAIL', 'PASS', 'EXCELLENT'])->nullable()->default('FAIL');

            $table->unique(["id"], 'id_UNIQUE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
