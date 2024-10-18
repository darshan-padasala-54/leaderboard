@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 bg-warning bg-gradient p-2">
            <form method="GET" action="{{ route('leaderboard.index') }}">
                <div class="form-group mb-1">
                    <input type="text" class="form-control" value="{{ $search }}" id="userID" name="search" placeholder="Search By User ID">
                </div>
                <select name="filter" class="form-select mb-1">
                    <option value="">All</option>
                    <option value="day" @if($filter == 'day') selected @endif>Today</option>
                    <option value="month" @if($filter == 'month') selected @endif>Current Month</option>
                    <option value="year" @if($filter == 'year') selected @endif>Current Year</option>
                </select>
                <button type="submit" class="btn btn-success">Search</button>

                <a href="{{ route('leaderboard.index', ['filter' => '']) }}" class="btn btn-primary">Re-Calculate</a>

            </form>
            
        </div>
        <div class="col-md-8">
            <table class="table table-striped table-responsive">
                <thead>
                    <tr>
                        <th><a class="text-decoration-none @if($sort_by === 'id') text-danger @else text-primary @endif" href="{{ route('leaderboard.index', ['sort_by' => 'id', 'sort_order' => $sort_by === 'id' && $sort_order === 'asc' ? 'desc' : 'asc', 'search' => $search, 'filter' => $filter]) }}">ID</a></th>
                        <th><a class="text-decoration-none @if($sort_by === 'name') text-danger @else text-primary @endif" href="{{ route('leaderboard.index', ['sort_by' => 'name', 'sort_order' => $sort_by === 'name' && $sort_order === 'asc' ? 'desc' : 'asc', 'search' => $search, 'filter' => $filter]) }}">Name</a></th>
                        <th><a class="text-decoration-none  @if($sort_by === 'points') text-danger @else text-primary @endif" href="{{ route('leaderboard.index', ['sort_by' => 'points', 'sort_order' => $sort_by === 'points' && $sort_order === 'asc' ? 'desc' : 'asc', 'search' => $search, 'filter' => $filter]) }}">Points</a></th>
                        <th>Rank</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->points }}</td>
                            <td>{{ $user->rank }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection