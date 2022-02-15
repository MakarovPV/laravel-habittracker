<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

trait Dates
{ 
  private $currentDate;

    public function getMonth($userId, $counter)
    {
      $this->currentDate = Carbon::now()->addMonth($counter);
      
      $dateFirstDayOfPreviousMonth =$this->currentDate
                                   ->firstOfMonth()
                                   ->toDateTimeString();

      $dateLastDayOfNextMonth = $this->currentDate
                                   ->endOfMonth()
                                   ->toDateTimeString();

      $dataByDate = $this->getHabitsByUserId($userId)
                                   ->where('created_at', '<=', $dateLastDayOfNextMonth)
                                   ->where('created_at', '>=', $dateFirstDayOfPreviousMonth)->get();

      return $dataByDate;
    }

    public function getMonthName()
    {
      $monthName = $this->currentDate->format('F');
      return $monthName;
    }
}
