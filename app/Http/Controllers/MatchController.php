<?php

namespace App\Http\Controllers;

use App\Match;
use App\Team;
use App\Point;
use Illuminate\Http\Request;
use App\Http\Requests\MatchRequest;

class MatchController extends Controller
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
        $matches = Match::paginate($paginate);
        return view('matches.index',compact('matches','paginate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();
        return view('matches.create',compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatchRequest $request)
    {
        Match::create($request->all());
        return redirect(route('match.index'))->with('success','Match Created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show(Match $match)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function edit(Match $match)
    {
        $teams = Team::all();
        return view('matches.edit',compact('teams','match'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Match $match)
    {
        $validatedData = $request->validate([
            'status' => 'required',
            'result' => 'required',
        ]);
        $match->status = $request->status;
        $match->result = $request->result;
        $match->save();
        if($match->result == 'Draw'){

            Point::create([
                    'team_id' => $match->team_id_home,
                    'match_id' => $match->id,
                    'point' => 1
                ]);

            Point::create([
                    'team_id' => $match->team_id_away,
                    'match_id' => $match->id,
                    'point' => 1
                ]);

        }elseif(is_numeric($match->result)){
            Point::create([
                    'team_id' => $request->result,
                    'match_id' => $match->id,
                    'point' => 2
                ]);
        }

        return redirect(route('match.index'))->with('success','Match Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy(Match $match)
    {
        $match->delete();
        return redirect(route('match.index'))->with('success','Match Deleted.');
    }
}
