<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class User extends Model
    {
        public $timestamps = false;
        
        //name of the table
        protected $table = 'tbluser';
        // column of the table
        protected $fillable = [
            'username','password', 'jobid',
        ];
        
        //userid set to primary key
        protected $primaryKey = 'userid';
        //password is hidden
        protected $hidden = ['password'];
    }