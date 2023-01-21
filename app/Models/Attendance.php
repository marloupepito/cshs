<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
     protected $table = 'attendance';
      protected $fillable = [
            'student_id',
            'event_id',
            'ms',
            'me',
            'ass',
            'ae',
           'grade',
           'section',
           'strand',
     ];
}
