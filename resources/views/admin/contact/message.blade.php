@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="container">
                    <h2>Admin Message</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('success') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('error') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <div class="card-header">All Message Data</div>

                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">SL No</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Subject</th>
                                                <th scope="col" width="35%">Message</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @if (isset($messages) && count($messages) > 0)
                                                @foreach ($messages as $message)
                                                    <tr>
                                                        <th scope="row">{{ $i++ }}
                                                        </th>
                                                        <td>{{ $message->name }}</td>
                                                        <td>{{ $message->email }}</td>>
                                                        <td>{{ $message->subject }}</td>>
                                                        <td>{{ $message->message }}</td>>>
                                                        {{-- <td>{{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}</td> --}}
                                                        <td>
                                                            <a href="{{ url('message/delete/' . $message->id) }}"
                                                                class="btn btn-danger"
                                                                onclick="return confirm('Are you sure delete?')">Delete
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td class="text-center" colspan="5">No data</td>
                                                </tr>
                                            @endif

                                        </tbody>
                                    </table>
                                    {{-- @if (isset($messages) && count($messages) > 0)
                                        {{ $messages->links() }}
                                    @endif --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
</div @endsection
