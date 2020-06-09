@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img width="100%" src="{{ asset('storage').'/'. $team->logo }}" class="" alt="{{ $team->name }}">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">{{ $team->name }}</h5>
                <p class="card-text">{{ $team->getState->name }}</p>
              </div>
              <div class="text-right">
              <a href="{{ route('player.create') }}" > <button class="btn-sm btn-primary mr-4 mb-4">Add Player</button> </a>
              <a href="{{ route('team.index') }}" > <button class="btn-sm btn-primary mr-4 mb-4">Back to Teams</button> </a>
              </div>
            </div>
          </div>
        </div>
        <div class="table-responsive">          
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Logo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            
            @forelse ($players as $player)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td><a href="{{ route('team.show',$team->id) }}"> {{ $player->first_name }}</a></td>
                    <td>{{ $player->last_name }}</td>
                    <td><img height="50px" src="{{ asset('storage').'/'.$player->profile_image }}" class="img-rounded" alt="{{ $player->first_name }}"></td>
                    <td>
                      <form action="{{ route('player.destroy',$player->id) }}" method="post" >
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn-sm btn-primary">Delete</button>
                      </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Currently there is No Player in this Team.</td>
                </tr>
                
            @endforelse

            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection

