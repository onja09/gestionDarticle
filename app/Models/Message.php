<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Message extends Model
{
    // use HasFactory;
    // protected $guarded = [''];
    protected $fillable = [
        'content',
        'from_id',
        'to_id',
        'read_at',
        'created_at'
    ];

    protected $dates = ['created_at', 'read_at'];
    
    public $timestamps = false;

    public function from(){
        return $this->belongsTo(User::class, 'from_id');
    }
}
