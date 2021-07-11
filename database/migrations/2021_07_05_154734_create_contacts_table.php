<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->nullable(false);
            $table->string('fullname')->nullable(false);
            $table->tinyInteger('gender')->nullable(false);
            $table->string('email')->nullable(false);
            $table->char('postcode', 8)->nullable(false);
            $table->string('address')->nullable(false);
            $table->string('building_name')->nullable();
            $table->text('opinion')->nullable(false);
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
        Schema::dropIfExists('contacts');
    }
}
