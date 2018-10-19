<?php

namespace App\Http\Controllers\BackOffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Teams;
use App\Type;
use Session;
use DB;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = DB::table('Teams')
                        ->select('Teams.id','Teams.team_name','Teams.team_logo','Teams.type','type.type_name')
                        ->join('type', 'Teams.type', '=', 'type.type')
                        ->where('Teams.type', '=', 6)
                        ->orWhere('Teams.type', '=', 7)
                        ->get();
        return view('BackOffice.teams.teams',compact('team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $team = Teams::all();
        return view('BackOffice.teams.Createteams', compact('team'));
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
            // validate the data
            $this->validate($request, array(
                'team_name' => 'required|max:255',
            ));     
            // store in the database
            $team = new Teams;
            $team->fill($request->all());
            $team->save();
            
        } catch(\exception $e){
            die($e->getMessage());
        }
        Session::flash('success', 'The team was created!');
        return redirect()->route('teams.index');
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
        $data['team'] = Teams::find($id);
        return view('BackOffice.teams.Editteams', $data);
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
            $team = Teams::find($id);
            if (!empty($request->team_logo)) {
                $team->team_logo = $request->team_logo;
            }
            $team->type = $request->type;
            $team->team_name = $request->team_name;
            $team->updated_at = now();
            $team->save();
        } catch(\exception $e){
            die($e->getMessage());
        }
        Session::flash('warning', 'The content was successfully save!');
        return redirect()->route('teams.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Teams::find($id);
        $team->delete();
        Session::flash('delete', 'The post was successfully deleted.');
        return redirect()->route('teams.index');
    }
}
