@extends('layout')

@section('content')
<h2>MARKS</h2>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('marks.create') }}">Record Student's Marks</a>
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
            <th width="60px">No.</th>
            <th>Student</th>
            <th>Maths</th>
            <th>Science</th>
            <th>History</th>
            <th>Term</th>
            <th>Total Marks</th>
            <th>Created At</th>
            <th width="160px">Action</th>
        </tr>
        @foreach ($marks as $mark)
        <tr>
            <td>{{ ++$i }}</td>
            {{-- <td><a href="{{ route('marks.show',$mark->id) }}"> {{$mark->student->name}} </a></td> --}}
            <td>{{ $mark->student->name }}</td>
            <td>{{ $mark->maths }}</td>
            <td>{{ $mark->science }}</td>
            <td>{{ $mark->history }}</td>
            <td>{{ $mark->term }}</td>
            <td>{{ $mark->maths + $mark->science + $mark->history}}</td>
            <td>{{ $mark->created_at }}</td>
            <td>
                <form action="{{ route('marks.destroy',$mark->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('marks.edit',$mark->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $marks->links() !!}

@endsection
