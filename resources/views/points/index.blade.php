@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Team Points</div>
                <div class="card-body">
                    <div class="table-responsive">          
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Team Name</th>
                                <th>Points</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $page = (Request::get('page')) ? Request::get('page') : 1;
                        @endphp
                        
                        @forelse ($points as $point)
                            <tr>
                                <td>{{ $loop->index + 1 + ($page-1)*$paginate }}</td>
                                <td>{{ $point->teamName->name }}</td>
                                <td>{{ $point->point }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">Currently there is No Team Points in the system.</td>
                            </tr>
                            
                        @endforelse

                        @if(1==1)
                            <tr class="text-center">
                                <td colspan="3">{{ $points->links() }}</td>
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
