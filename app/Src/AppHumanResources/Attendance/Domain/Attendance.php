<?php

namespace App\Src\AppHumanResources\Attendance\Domain;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $table = 'attendance';

    protected $fillable = [
        'emp_id', 'check_in', 'check_out', 'schedule_id'
    ];
}
