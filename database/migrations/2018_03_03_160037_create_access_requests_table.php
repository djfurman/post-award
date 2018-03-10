<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_requests', function (Blueprint $table) {
            $table->string('uuid')
                ->comment('Globally unique UUID-v4 identifier for the access request');
            $table->primary('uuid');
            $table->string('type')
                ->comment('Identifier for the access request type; e.g., Initial, Modification, Deletion');
            $table->timestamp('request_at')
                ->comment('Timestamp of the requestors submission of the request');
            $table->string('system')
                ->comment('The system to which the access request pertains');
            $table->string('system_location')
                ->comment('The physical data facility or facilities where the application resides');
            $table->string('ldap')
                ->nullable()
                ->comment('Common name assigned to the organizational unit sub-object referring to the user');
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
        Schema::dropIfExists('access_requests');
    }
}
