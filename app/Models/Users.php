<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    
    protected $table ="users";

     protected $fillable = [
        'Name', 'Mobile', 'Email', 'Address', 'Role',
        'Designation', 'Marital_Status', 'DOB', 'Gender',
        'Photo_Path', 'Status','datetime'
    ];
}
