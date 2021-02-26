<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("employees", function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->integer("emp_id");
            $table->string("name_prefix", 15);
            $table->string("first_name", 31);
            $table->string("middle_initial", 7);
            $table->string("last_name", 31);
            $table->char("gender", 1);
            $table->string("email", 63);
            $table->string("fathers_name", 63);
            $table->string("mothers_name", 63);
            $table->string("mothers_maiden_name", 63);
            $table->date("dob");
            $table->date("doj");
            $table->decimal("salary", 8, 2);
            $table->string("ssn", 11);
            $table->string("phone", 12);
            $table->string("city", 63);
            $table->char("state", 2);
            $table->string("zip", 10);
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
        Schema::dropIfExists("employees");
    }
}
