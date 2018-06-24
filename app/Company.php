<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    // Setting the primarykey field name, since it is different than just "id"
    protected $primaryKey = 'company_id';
    // Ignoring the timestamps since it is not needed for this sample project
    public $timestamps = false;
}
