<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class User extends Model
    {
        public $timestamps = false;
        
        //name of the table
        protected $table = 'tbluserjob';

        // column of the table
        protected $fillable = ['jobname',];

        //userid set to primary key
        protected $primaryKey = 'jobid';
    }
