@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Update Match  </div>

                <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <div class="text-center">Match {{ $match->getHomeTeam->name }} vs {{ $match->getAwayTeam->name }}</div>
                    <form action="{{ route('match.update',$match->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="select">
                            <label for="status">Status:</label>
                            <select name="status" class="form-control">
                                <option value="">--select--</option>
                                <option value="Upcoming">Upcoming</option>
                                <option value="Cancelled">Cancelled</option>
                                <option value="In Progess">In Progess</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                        <br>
                        <div class="select">
                            <label for="result">Result:</label>
                            <select name="result" class="form-control">
                                <option value="">--select--</option>
                                <option value="NA">NA</option>
                                <option value="Draw">Draw</option>
                                <option value="{{ $match->getHomeTeam->id }}">{{ $match->getHomeTeam->name }} Won the match</option>
                                <option value="{{ $match->getAwayTeam->id }}">{{ $match->getAwayTeam->name }} Won the match</option>
                                
                            </select>
                        </div>
                        <button type="submit" class="my-4 btn btn-primary">Update</button>

                        <a href="{{route('match.index')}}"><button type="button" class="btn btn-primary">Back to Matches</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
