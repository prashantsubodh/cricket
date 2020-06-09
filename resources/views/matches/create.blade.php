@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Add Team  </div>

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
                    <form action="{{ route('match.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="select">
                            <label for="team_id_home">Team Home:</label>
                            <select name="team_id_home" class="form-control">
                                <option value="">--select--</option>
                                @foreach($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="select">
                            <label for="team_id_away">Team Away:</label>
                            <select name="team_id_away" class="form-control">
                                <option value="">--select--</option>
                                @foreach($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="my-4 btn btn-primary">Create</button>

                        <a href="{{route('match.index')}}"><button type="button" class="btn btn-primary">Back to Matches</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
