<?php

namespace App\Models\employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employeeUser extends Model
{
    use HasFactory;
    protected $table = 'employee';
    protected $primaryKey='e_id';
    protected $fillable = [
        'e_name',
        'e_phn',
        'e_mail',
        'e_add',
    ];
    
}
