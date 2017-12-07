<table class="table table-striped">
    <tr>
        <th>ID</th>
        <td>{{ $user->id }}</td>
    </tr>
    <tr>
        <th>Name</th>
        <td>{{ $user->name }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $user->email }}</td>
    </tr>
    <tr>
        <th>Title</th>
        <td>{{ $user->title }}</td>
    </tr>
    <tr>
        <th>Description</th>
        <td>{!! $user->desc !!}</td>
    </tr>
    <tr>
        <th>Role</th>
        <td>{{ ucwords($user->role) }}</td>
    </tr>
    <tr>
        <th>Active</th>
        <td>{{ $user->active == 1 ? 'Active' : 'Non-Active' }}</td>
    </tr>
    <tr>
        <th>Phone</th>
        <td>{{ $user->phone }}</td>
    </tr>
    <tr>
        <th>Facebook</th>
        <td>{{ $user->facebook }}</td>
    </tr>
    <tr>
        <th>Twitter</th>
        <td>{{ $user->twitter }}</td>
    </tr>
    <tr>
        <th>GitHub</th>
        <td>{{ $user->github }}</td>
    </tr>
    <tr>
        <th>Photo</th>
        <td><img src="{{ $user->image }}" id="holder" style="margin-top:15px;max-height:254px;max-width: 152px;"></td>
    </tr>
</table>

