@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>
                        <button class="btn btn-danger"
                                onclick="deleteUser(this)"
                                data-field-id="{{ $user->id }}">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function deleteUser(button) {
            if(!confirm("Are you sure to delete?")) return;
            const id = $(button).data('field-id');
            $.ajax({
                type: 'DELETE',
                url: '/home/users/' + id,
                success: function(data) {
                    BootstrapDialog.show({
                        title: 'Success!',
                        message: 'User has been successfully deleted.',
                        buttons: [{
                            label: 'Close',
                            action: function (dialog) {
                                dialog.close();
                                location.reload();
                            }
                        }]
                    })
                },
                error: function() {
                    console.log("Error");
                }
            });
        }
    </script>
@endsection