@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">

                All Teams
                
                <a href="{{route('team.create')}}"><button class="btn-sm btn-primary">Add Team</button></a>
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
                                <th>State</th>
                                <th>Logo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $page = (Request::get('page')) ? Request::get('page') : 1;
                        @endphp
                        
                        @forelse ($teams as $team)
                            <tr>
                                <td>{{ $loop->index + 1 + ($page-1)*$paginate }}</td>
                                <td><a href="{{ route('team.show',$team->id) }}"> {{ $team->name }}</a></td>
                                <td>{{ $team->getState->name }}</td>
                                <td><img height="50px" src="{{ asset('storage').'/'.$team->logo }}" class="img-rounded" alt="{{ $team->name }}"></td>
                                <td>
                                <form action="{{ route('team.destroy',$team->id) }}" method="post">
                                  @method('delete')
                                  @csrf
                                  <button type="submit" class="btn-sm btn-primary">Delete</button>
                                </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Currently there is No Team in the system.</td>
                            </tr>
                            
                        @endforelse

                        @if(1==1)
                            <tr class="text-center">
                                <td colspan="5">{{ $teams->links() }}</td>
                            </tr>
                            
                        @endif
                        
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
