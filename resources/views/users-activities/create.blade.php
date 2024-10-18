@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Today's Activity</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users-activities.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Activity Name <span class="text-danger">*</span></label>
            <select name="activity_id" class="form-select mb-1">
                @foreach($activities as $activity)
                    <option @if(old("activity_id") == $activity['id']) selected @endif value="{{ $activity['id'] }}">{{ $activity['activity'] }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Activity</button>
    </form>
</div>
@endsection