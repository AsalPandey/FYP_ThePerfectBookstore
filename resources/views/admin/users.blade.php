<div class="main-panel">
    <div class="content-wrapper">
        <table class="table_deg">
            <tr class="th_color">
                <th>Name</th>
                <th>Email</th>
                <th>usertype</th>
                <th>phone</th>
                <th>address</th>
                <th>make-admin</th>
                <th>delete-user</th>
            </tr>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->usertype=='0')
                            user
                        @elseif($user->usertype=='1')
                        staff
                        @elseif($user->usertype=='2')
                        member
                        @elseif($user->usertype=='3')
                            admin
                        @endif

                    </td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->address }}</td>
                    <td>
                        @if($user->usertype=='0')
                            <a href="{{url('makeadmin',$user->id)}}" onclick="return confirm('are you sure you want to make this user staff?')" class="btn btn-primary">make staff</a>
                        @elseif($user->usertype=='2')
                            <a href="{{url('makeadmin',$user->id)}}" onclick="return confirm('are you sure you want to make this member staff?')" class="btn btn-primary">make staff</a>
                        @elseif($user->usertype=='1')
                            <p style="color: gold">✓Staff</p>
                        @elseif($user->usertype=='3')
                            <p style="color: gold">Admin/Superuser/Me</p>
                        @endif
                    </td>
                    <td>
                        @if($user->usertype=='3')
                            <p style="color: gold">Admin/Superuser/Me</p>
                        @else
                        <a class="btn btn-danger" onclick="return confirm('Are you sure to remove this product?')" href="{{url('delete_user',$user->id)}}">Remove User</a></td>
                    @endif

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
