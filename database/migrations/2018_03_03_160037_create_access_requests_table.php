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
            $table->string('mfa')
                ->nullable()
                ->comment('Multi factor authentication universal ID');
            $table->string('given_name')
                ->comment('Given or first name for the user');
            $table->string('surname')
                ->comment('Last or surname for the user');
            $table->string('middle_initial', 1)
                ->nullable()
                ->comment('Middle initial of the user');
            $table->string('street_line_1')
                ->comment('Primary street address');
            $table->string('street_line_2')
                ->nullable()
                ->comment('Secondary street address');
            $table->string('city')
                ->comment('Address city');
            $table->string('state')
                ->comment('Address State');
            $table->string('country')
                ->comment('Address country');
            $table->string('planet')
                ->comment('Address planet');
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
