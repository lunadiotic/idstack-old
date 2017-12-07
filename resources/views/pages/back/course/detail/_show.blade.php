<table class="table table-striped">
    <tr>
        <th>ID</th>
        <td>{{ $course->id }}</td>
    </tr>
    <tr>
        <th>Course</th>
        <td>{{ $course->course->title }}</td>
    </tr>
    <tr>
        <th>Description</th>
        <td>{!! $course->desc !!}</td>
    </tr>
</table>

{!! $course->iframe !!}

