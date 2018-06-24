<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // Setting the primarykey field name, since it is different than just "id"
    protected $primaryKey = 'employee_id';
    // Ignoring the timestamps since it is not needed for this sample project
    public $timestamps = false;
}
