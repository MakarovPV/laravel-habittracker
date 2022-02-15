<?php

namespace App\Repositories;

use App\Models\Habit;

/**
 * Class HabitRepository.
 */
class HabitRepository extends CoreRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Habit::class;
    }

    public function getHabitsByUserId($id)
    {
    	return $this->model->select('id', 'habit_name')->where('user_id', $id)->with('daysOfHabit');
    }

}
