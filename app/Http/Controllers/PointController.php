<?php


namespace App\Http\Controllers;

use App\Point;
use Illuminate\Http\Request;

class PointController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }

    public function index()
    {
    	$paginate = 10;
        $points = Point::selectRaw('team_id, sum(point) as point')->groupBy('team_id')->orderBy('point','desc')->paginate($paginate);
        return view('points.index',compact('points','paginate'));
    }
}
