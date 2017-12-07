<table class="table table-striped">
    <tr>
        <th>ID</th>
        <td>{{ $course->id }}</td>
    </tr>
    <tr>
        <th>Instructor</th>
        <td>{{ $course->user->name }}</td>
    </tr>
    <tr>
        <th>Level</th>
        <td>{{ $course->level->level }}</td>
    </tr>
    <tr>
        <th>Title</th>
        <td>{{ $course->title }}</td>
    </tr>
    <tr>
        <th>Description</th>
        <td>{!! $course->desc !!}</td>
    </tr>
    <tr>
        <th>Price</th>
        <td>{{ $course->price }}</td>
    </tr>
    <tr>
        <th>Subjects</th>
        <td>
            <ul>
                @foreach($course->subjects as $row)
                    <li>{{ $row->subject }}</li>
                @endforeach
            </ul>
        </td>
    </tr>
    <tr>
        <th>Software</th>
        <td>
            <ul>
                @foreach($course->software as $row)
                    <li>{{ $row->software }}</li>
                @endforeach
            </ul>
        </td>
    </tr>
    <tr>
        <th>Featured Image</th>
        <td><img src="{{ $course->image }}" id="holder" style="margin-top:15px;max-height:254px;max-width: 152px;"></td>
    </tr>
</table>

