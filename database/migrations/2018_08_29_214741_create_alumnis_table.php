<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnisTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'alumnis';

    /**
     * Run the migrations.
     * @table alumnis
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 191);
            $table->string('department_id', 191)->default('NULL');
            $table->string('mat_number', 10)->nullable()->default('NULL');
            $table->string('phone', 13)->default('NULL');
            $table->string('email', 191);
            $table->string('password', 191);

            $table->unique(["mat_number"], 'alumnis_mat_number_unique');

            $table->unique(["phone"], 'alumnis_phone_unique');

            $table->unique(["email"], 'alumnis_email_unique');
            $table->nullableTimestamps();
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
