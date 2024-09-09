<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {
    protected $fillable = [
        'title', 'description', 'status', 'due_date'
    ];

    protected $attributes = [
        'status' => 'pending',
    ];

    protected $dates = ['due_date', 'created_at', 'updated_at'];

    public static function boot() {
        parent::boot();

        static::creating(function ($task) {
            if (empty($task->status)) {
                $task->status = 'pending';
            }
        });
    }
}
