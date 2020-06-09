@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">

                All Matches
                
                <a href="{{route('match.create')}}"><button class="btn-sm btn-primary">Add Match</button></a>
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
                                <th>Team Home</th>
                                <th>Team Away</th>
                                <th>Status</th>
                                <th>Result</th>
                                <th class="text-center" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $page = (Request::get('page')) ? Request::get('page') : 1;
                        @endphp
                        
                        @forelse ($matches as $match)
                            <tr>
                                <td>{{ $loop->index + 1 + ($page-1)*$paginate }}</td>
                                <td>{{ $match->getHomeTeam->name }}</td>
                                <td>{{ $match->getAwayTeam->name }}</td>
                                <td>{{ $match->status }}</td>
                                <td>
                                    @if(is_numeric($match->result))
                                        {{ $match->getWinnerTeam->name }} Won
                                    @else
                                        {{ $match->result }}
                                    @endif
                                </td>
                                <td><a href="{{ route('match.edit',$match->id) }}"><button>Edit</button></a></td>
                                <td>
                                @if($match->result == 'NA')
                                <form action="{{ route('match.destroy',$match->id) }}" method="post">
                                  @method('delete')
                                  @csrf
                                  <button type="submit" class="btn-sm btn-primary">Delete</button>
                                </form>
                                @endif
                                </td>
                                
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">Currently there is No Matches in the system.</td>
                            </tr>
                            
                        @endforelse

                        @if(1==1)
                            <tr class="text-center">
                                <td colspan="7">{{ $matches->links() }}</td>
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
