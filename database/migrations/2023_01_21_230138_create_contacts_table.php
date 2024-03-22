<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('email')->nullable();
            $table->string('workk')->nullable();
            $table->longText('description')->nullable();
            $table->longText('address')->nullable();
            $table->text('mobile')->nullable();
            $table->text('phone')->nullable();
            $table->text('fax')->nullable();
            $table->longText('keyword')->nallable();
            $table->longText('optionn')->nallable();
            $table->text('Facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->text('Youtube')->nullable();
            $table->text('Instagram')->nullable();
            $table->text('Google')->nullable();
            $table->text('telegram')->nullable();
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
