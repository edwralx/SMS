<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Student:</strong>
            {{-- <input type="text" name="name" class="form-control" value="{{old('name') ?? $student->name}}" placeholder="Name"> --}}
            <select name="student_id" class="form-control">
                @foreach ($students as $student)
                    <option value="{{$student->id}}" {{$student->id == $mark->student_id ? 'selected' : ''}}>{{$student->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Maths:</strong>
            <input type="text" name="maths" class="form-control" value="{{old('maths') ?? $mark->maths}}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Sience:</strong>
            <input type="text" name="science" class="form-control" value="{{old('science') ?? $mark->science}}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>History:</strong>
            <input type="text" name="history" class="form-control" value="{{old('history') ?? $mark->history}}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Term:</strong>
            <select name="term" class="form-control">
                <option value="" disabled>Term</option>
                @foreach ($mark->termOptions() as $termOptionKey=>$termOptionValue)
                    <option value="{{$termOptionKey}}" {{$mark->term == $termOptionValue ? 'selected' : ''}} >{{$termOptionValue}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
@csrf
