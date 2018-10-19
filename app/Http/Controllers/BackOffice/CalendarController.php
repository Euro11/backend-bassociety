<?php

namespace App\Http\Controllers\BackOffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Teams;
use App\Calendar;
use App\Type;
use Session;
use DB;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['team'] = DB::table('Teams')
        //                 ->select('Teams.id','Teams.team_name','Teams.team_logo','calendar.home_team','calendar.away_team')
        //                 ->leftjoin('calendar','Teams.id','=','calendar.home_team')
        //                 ->leftjoin('calendar','Teams.id','=','calendar.away_team')
        //                 ->get();
        $data['team'] = Calendar::with(['getTeamHome','getTeamAway'])->get();
        $data['calendar'] = DB::table('Calendar')
                        ->select('Calendar.id','Calendar.date','Calendar.time','Calendar.match_type','Calendar.scoreHome','Calendar.scoreAway','type.type_name')
                        ->join('type', 'Calendar.match_type', '=', 'type.type')
                        ->where('Calendar.match_type', '=', 6)
                        ->orWhere('Calendar.match_type', '=', 7)
                        ->orWhere('Calendar.match_type', '=', 8)
                        ->orWhere('Calendar.match_type', '=', 9)
                        ->orWhere('Calendar.match_type', '=', 10)
                        ->get();
        return view('BackOffice.calendar.Calendar', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $team = Teams::all();
        $calendar = Calendar::all();
        return view('BackOffice.calendar.CreateCalendar', compact('calendar','team'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{     
            // store in the database
            $calendar = new Calendar;
            $calendar->fill($request->all());
            $calendar->save();
            
        } catch(\exception $e){
            die($e->getMessage());
        }
        Session::flash('success', 'The calendar was created!');
        return redirect()->route('calendar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['calendar'] = Calendar::find($id);
        $data['team'] = Teams::all();
        return view('BackOffice.calendar.EditCalendar', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            // store in the database
            $calendar = Calendar::find($id);
            // if (!empty($request->home_logo)) {
            //     $calendar->home_logo = $request->home_logo;
            // }
            // if (!empty($request->away_logo)) {
            //     $calendar->away_logo = $request->away_logo;
            // }
            $calendar->date = $request->date;
            $calendar->time = $request->time;
            $calendar->match_type = $request->match_type;
            $calendar->home_team = $request->home_team;
            $calendar->away_team = $request->away_team;
            $calendar->updated_at = now();
            $calendar->save();
        } catch(\exception $e){
            die($e->getMessage());
        }
        Session::flash('warning', 'The calendar was successfully save!');
        return redirect()->route('calendar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $calendar = Calendar::find($id);
        $calendar->delete();
        Session::flash('delete', 'The post was successfully deleted.');
        return redirect()->route('calendar.index');
    }

    public function editScore($id)
    {
        $calendar = Calendar::find($id);
        return view('BackOffice.calendar.editScore', compact('calendar'));
    }

    public function updateScore(Request $request,$id)
    {
        try{     
            $calendar = Calendar::find($id);
            $calendar->scoreHome = $request->scoreHome;
            $calendar->scoreAway = $request->scoreAway;
            $calendar->updated_at = now();
            $calendar->save();
        } catch(\exception $e){
            die($e->getMessage());
        }
        Session::flash('success', 'Score was Update!');
        return redirect()->route('calendar.index');
    }

    public function homelogo(Request $request){
        $img_team = Teams::find($request->name);
        return response()->json($img_team->team_logo);
    }
    
    public function awaylogo(Request $request){
        $img_team = Teams::find($request->name);
        return response()->json($img_team->team_logo);
    }
}