<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WebUsers;

class State extends Model
{
    protected $fillable = ['name'];

    public function web_users()
    {
      return $this->hasMany(WebUsers::class);
    }
}
