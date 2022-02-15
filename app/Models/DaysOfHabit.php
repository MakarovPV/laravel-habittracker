<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaysOfHabit extends Model
{
    use HasFactory;

    protected $fillable = ['habit_id', 'habit_status'];

    protected $table = 'days_of_habits';

    public $timestamps = false;

    public function habit()
    {
        return $this->belongsTo(Habit::class, 'habit_id');
    }
}
