<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historic extends Model
{
    
        public $table = 'historics';
    
        protected $dates = [
            'created_at',
            'updated_at',
            'deleted_at',
        ];
    
        protected $fillable = [
            'name',
            'email',
            'last_login_at',
            'last_login_ip',
        ];
        public function roles()
        {
            return $this->belongsToMany(Role::class);
        }
}
