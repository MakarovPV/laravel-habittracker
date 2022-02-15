<?php

namespace App\Repositories;

use App\Models\DaysOfHabit;

/**
 * Class HabitRepository.
 */
class DaysOfHabitRepository extends CoreRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return DaysOfHabit::class;
    }
}
