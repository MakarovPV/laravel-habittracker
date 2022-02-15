<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\HabitRepository;
use App\Repositories\DaysOfHabitRepository;
use App\Models\Habit;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HabitsController extends Controller
{
    private $habitRepository;
    private $daysOfHabitRepository;

    public function __construct(HabitRepository $habitRepository, DaysOfHabitRepository $daysOfHabitRepository)
    {
        $this->habitRepository = $habitRepository;
        $this->daysOfHabitRepository = $daysOfHabitRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!($request->session()->exists('page'))) {
            $request->session()->put('page', 0);
        }
       
        $page = $request->session()->get('page'); 
        $habits = $this->habitRepository->getMonth(Auth::id(), $page);
        $monthName = $this->habitRepository->getMonthName();

        return view('index', compact('page', 'habits', 'monthName'));
    }

    public function previous(Request $request)
    {
        $request->session()->decrement('page');
    }

    public function next(Request $request)
    {
        $request->session()->increment('page');
    }

    public function returnToMainPage(Request $request)
    {
        $request->session()->forget('page');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input();

        $model = Habit::create([
            'user_id' => Auth::id(),
            'habit_name' => $data['habit_name'],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newsId = Habit::find($id)->delete();
    }
}
