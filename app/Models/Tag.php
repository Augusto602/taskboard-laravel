<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
    ];

    // Relação com usuário
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Relação com tarefas
    public function tasks() {
        return $this->belongsToMany(Task::class);
    }
}
