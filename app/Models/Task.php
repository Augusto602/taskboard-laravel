<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status',
        'priority',
        'due_date',
    ];

    protected $appends = ['is_overdue'];

    // Relação com o usuário
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Relação com tags
    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    // Campo computado is_overdue
    public function getIsOverdueAttribute() {
        return $this->status !== 'done' 
            && $this->due_date 
            && Carbon::parse($this->due_date)->isPast();
    }
}
