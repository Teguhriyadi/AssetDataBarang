<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string("id_users", 50)->primary();
            $table->string("nama");
            $table->string("email")->unique();
            $table->string("password");
            $table->tinyInteger("dibuat_oleh")->default(0);
            $table->string("nomor_hp", 20);
            $table->enum("jenis_kelamin", ["L", "P"]);
            $table->text("alamat");
            $table->enum("status", [1, 0])->default(1);
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
        Schema::dropIfExists('users');
    }
};
