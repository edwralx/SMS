<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            <input type="text" name="name" class="form-control" value="{{old('name') ?? $student->name}}" placeholder="Name">
        </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Age:</strong>
            <input type="text" name="age" class="form-control" value="{{old('age') ?? $student->age}}" placeholder="Age">
        </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Gender:</strong>
            <select name="gender" class="form-control">
                <option value="" disabled>Select gender type</option>
                @foreach ($student->genderOptions() as $genderOptionKey=>$genderOptionValue)
                    <option value="{{$genderOptionKey}}" {{$student->gender == $genderOptionValue ? 'selected' : ''}} >{{$genderOptionValue}}</option>
                @endforeach
            </select>
        </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Teacher:</strong>
            <select name="teacher_id" class="form-control">
                @foreach ($teachers as $teacher)
                    <option value="{{$teacher->id}}" {{$teacher->id == $student->teacher_id ? 'selected' : ''}}>{{$teacher->name}}</option>
                @endforeach
            </select>
        </div>
</div>
@csrf
