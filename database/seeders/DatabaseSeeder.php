<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
                $student = new User;
                $student->profile ='logo.png';
                $student->name = 'Christian';
                $student->lastname =  'Alfonso';
                $student->contact = '09183646362';
                $student->idnumber = 1234567;
                $student->grade = 'Grade 12';
                $student->section = 'Section B';
                $student->strand = "TVL";
                $student->gender = 'Male';
                $student->username ='admin';
                $student->password = Hash::make('admin');
                $student->usertype = 'admin';
                $student->save();
    }
}
