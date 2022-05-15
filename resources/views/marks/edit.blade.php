@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Mark Records</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('marks.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        There are problems in your input!<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{ route('marks.update', $mark->id) }}" method="POST">
    @method('PUT')
        @include('marks.form')


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update Record</button>
        </div>
    </div>

</form>
@endsection
