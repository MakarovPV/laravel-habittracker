<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Habit extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['user_id', 'habit_name'];

    protected $table = 'habits';

    public $timestamps = false;

    public function daysOfHabit()
    {
        return $this->hasOne(DaysOfHabit::class);
    }
}
