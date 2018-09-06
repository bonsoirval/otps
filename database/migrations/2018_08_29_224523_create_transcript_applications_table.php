<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranscriptApplicationsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'transcript_applications';

    /**
     * Run the migrations.
     * @table transcript_applications
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('alumni_id');
            $table->text('cetxref');
            $table->string('recipient', 191);
            $table->string('recipient_address', 191);
            $table->integer('country_id');
            $table->enum('status', ['open', 'processing', 'completed', 'sent_out'])->default('open');
            $table->integer('payment_id')->nullable()->default(null);

            $table->unique(["payment_id"], 'transcript_applications_payment_id_unique');
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
