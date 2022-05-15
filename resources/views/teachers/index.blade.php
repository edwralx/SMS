@extends('layout')

@section('content')
<h2>TEACHERS</h2>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('teachers.create') }}">Register a Teacher</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th width="90px">No.</th>
            <th>Name</th>
            <th>Notes</th>
            <th width="160px">Action</th>
        </tr>
        @foreach ($teachers as $teacher)
        <tr>
            <td>{{ ++$i }}</td>
            <td><a href="{{ route('teachers.show',$teacher->id) }}"> {{$teacher->name}} </a></td>
            <td>{{ $teacher->notes }}</td>
            <td>
                <form action="{{ route('teachers.destroy',$teacher->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('teachers.edit',$teacher->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $teachers->links() !!}

@endsection
