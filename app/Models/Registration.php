<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $table = 'registration';
    use HasFactory;
    protected $fillable = [
        'name',
        'lastname',
        'contact',
        'idnumber',
        'grade',
        'section',
        'strand',
        'gender',
     ];
}
