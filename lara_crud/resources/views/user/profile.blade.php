@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Profile') }}</div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $LoggedUserInfo->name }}</td>
                                <td>{{ $LoggedUserInfo->address }}</td>
                                <td>{{ $LoggedUserInfo->username }}</td>
                                <td>{{ $LoggedUserInfo->email }}</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
