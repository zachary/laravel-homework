<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = "employees";
    protected $fillable = [
        "emp_id",
        "name_prefix",
        "first_name",
        "middle_initial",
        "last_name",
        "gender",
        "email",
        "fathers_name",
        "mothers_name",
        "mothers_maiden_name",
        "dob",
        "doj",
        "salary",
        "ssn",
        "phone",
        "city",
        "state",
        "zip",
    ];
}
