<?php

namespace App\Http\Controllers;

use App\Player;
use App\Team;
use App\Country;
use Illuminate\Http\Request;
use App\Http\Requests\PlayerRequest;

class PlayerController extends Controller
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
        $players = Player::paginate($paginate);
        return view('players.index',compact('players','paginate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $teams = Team::all();
        return view('players.create',compact('teams','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlayerRequest $request)
    {
        $path = $this->uploadImage($request->profile_image);
        $data = [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'profile_image' => $path,
                'jersey_number' => $request->jersey_number,
                'country_id' => $request->country_id,
                'team_id' => $request->team_id,
            ];
        Player::create($data);
        return redirect(route('team.show',$request->team_id))->with('success',$request->first_name.' : Player Created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        $player->delete();
        return redirect(route('team.index'))->with('success',$player->first_name. ' : Player Deleted.');
    }

    private function uploadImage($image){
        $path = $image->store('profile_images','public');
        return $path;
    }
}
