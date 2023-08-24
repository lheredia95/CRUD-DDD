<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE DATABASE IF NOT EXISTS crud_ddd');
    }

    public function down()
    {
        DB::statement('DROP DATABASE IF EXISTS crud_ddd');
    }
};
