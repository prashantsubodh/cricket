@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Add Player </div>

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
                    <form action="{{ route('player.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="first_name">First Name:</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name:</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name">
                        </div>
                        <div class="form-group">
                            <label for="profile_image">Profile Image:</label>
                            <input type="file" class="form-control" id="profile_image" name="profile_image">
                        </div>
                        <div class="form-group">
                            <label for="jersey_number">Jersey Number:</label>
                            <input type="text" class="form-control" id="jersey_number" name="jersey_number" placeholder="Enter Jersey Number">
                        </div>
                        <div class="checkbox">
                            <label for="team_id">Team:</label>
                            <select name="team_id" class="form-control">
                                <option value="">--Select--</option>
                                @foreach($teams as $team)
                                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="checkbox">
                            <label for="country_id">Country:</label>
                            <select name="country_id" class="form-control">
                                <option value="">--Select--</option>
                                @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="my-4 btn btn-primary">Create</button>
                        <a href="{{route('player.index')}}"><button type="button" class="btn btn-primary">Back to Players</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
