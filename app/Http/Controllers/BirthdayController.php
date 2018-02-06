<?php

namespace App\Http\Controllers;

use App\Birthday;
use Illuminate\Http\Request;

class BirthdayController extends Controller
{
    /**
     * Shows the calendar overview based on our birthday model.
     * @return [string] - Returns a view component
     */
    public function index()
    {
        $lastMonth = -1;
        $birthdays = Birthday::orderBy("month")->orderBy("day")->get();
        return view('kalender.index', compact('birthdays', 'lastMonth'));
    }

    /**
     * Shows the calendar based on our birthday model.
     * @return [string] - Returns a view component
     */
    public function create_view()
    {
        return view('kalender.create');
    }

    /**
     * Process the post request we receive.
     */
    public function create(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|min:3',
            'date' => 'required|date'
        ]);

        // Convert the date input to a real date.
        $date = date_create($request->date);

        $name = $request->name;

        $year = date_format($date, "Y");
        $month = date_format($date, "m");
        $day = date_format($date, "d");

        $birthday = new Birthday;
        $birthday->person = $name;
        $birthday->day = $day;
        $birthday->month = $month;
        $birthday->year = $year;
        $birthday->save();

        return redirect(url('/kalender'));
    }

    /**
     * Delete a record from the database, found by id.
     */
    public function delete($id)
    {
        $birthday = Birthday::find($id);

        $birthday->delete();

        return back();
    }

    /**
     * Shows the edit blade
     */
    public function edit_view($id)
    {
        $birthday = Birthday::find($id);
        return view('kalender.edit', compact('birthday'));
    }

    /**
     * Process the edit request
     */
    public function edit(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|min:3',
            'date' => 'required|date'
        ]);

        // Convert the date input to a real date.
        $date = date_create($request->date);

        $name = $request->name;

        $year = date_format($date, "Y");
        $month = date_format($date, "m");
        $day = date_format($date, "d");

        $birthday = Birthday::find($id);
        $birthday->person = $name;
        $birthday->day = $day;
        $birthday->month = $month;
        $birthday->year = $year;
        $birthday->save();

        return redirect(url('/kalender'));
    }
}
