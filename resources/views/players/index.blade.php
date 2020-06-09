@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">

                All Players
                
                <a href="{{route('player.create')}}"><button class="btn-sm btn-primary">Add Player</button></a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-warning alert-dismissible" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="table-responsive">          
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Jersey Number</th>
                                <th>Country</th>
                                <th>Team</th>
                                <th>Profile Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $page = (Request::get('page')) ? Request::get('page') : 1;
                        @endphp
                        
                        @forelse ($players as $player)
                            <tr>
                                <td>{{ $loop->index + 1 + ($page-1)*$paginate }}</td>
                                <td>{{ $player->first_name }} {{ $player->last_name }}</td>
                                <td>{{ $player->jersey_number }}</td>
                                <td>{{ $player->getCountry->name }}</td>
                                <td>{{ $player->team->name }}</td>
                                <td><img height="50px" src="{{ asset('storage').'/'.$player->profile_image }}" class="img-rounded" alt="{{ $player->first_name }}"></td>
                                <td>
                                <form action="{{ route('player.destroy',$player->id) }}" method="post">
                                  @method('delete')
                                  @csrf
                                  <button type="submit" class="btn-sm btn-primary">Delete</button>
                                </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">Currently there is No Player in the system.</td>
                            </tr>
                        @endforelse
                            <tr class="text-center">
                                <td colspan="7">{{ $players->links() }}</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
