<?php

namespace App\Http\Controllers;

use App\Team;
use App\Player;
use App\State;
use Illuminate\Http\Request;
use App\Http\Requests\TeamRequest;


class TeamController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginate = 10;
        $teams = Team::paginate($paginate);
        return view('teams.index',compact('teams','paginate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        return view('teams.create',compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        $path = $this->uploadImage($request->logo);
        $data = [
                'name' => $request->name,
                'logo' => $path,
                'state'=> $request->state
            ];
        Team::create($data);
        return redirect(route('team.index'))->with('success',$request->name.' : Team Created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //dd($team);
        $players = $team->players;
        return view('teams.show',compact('team','players'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $players = $team->players->count();
        if($players){
            return redirect(route('team.index'))->with('error','Please Remove Player from Team then Delete Team.');
        }
        $team->delete();
        return redirect(route('team.index'))->with('success',$team->name. ' : Team Deleted.');
    }

    private function uploadImage($image){
        $path = $image->store('team_images','public');
        return $path;
    }
}
