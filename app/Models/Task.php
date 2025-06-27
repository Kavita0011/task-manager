<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// has fctory trait is used to enable model factories for testing
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Task extends Model
{
    // The table associated with the model
    use HasFactory;
    protected $table = 'tasks';
    // The attributes that are mass assignable
        protected $fillable = [
        'user_id',
        'title',
        'description',
        'image',
        'is_completed',
        'due_date',
    ];
    //  function user to define the relationship with the User model
    // This indicates that each task belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
