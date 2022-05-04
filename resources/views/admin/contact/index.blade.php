@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="container">
                    <div class="row">
                        <a href="{{route('add.contact')}}" class="ms-3">
                            <button class="btn btn-info">Add Contact</button>
                        </a>
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
                                <div class="card-header">All Contact Data</div>

                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">SL No</th>
                                                <th scope="col">Contact Address</th>
                                                <th scope="col">Contact Email</th>
                                                <th scope="col">Contact Phone</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @if (isset($contacts) && count($contacts) > 0)
                                                @foreach ($contacts as $contact)
                                                    <tr>
                                                        <th scope="row">{{ $i++ }}
                                                        </th>
                                                        <td>{{ $contact->address }}</td>
                                                        <td>{{ $contact->email }}</td>>
                                                        <td>{{ $contact->phone }}</td>>
                                                        {{-- <td>{{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}</td> --}}

                                                        <td>
                                                            <a href="{{ url('/contact/edit/' . $contact->id) }}"
                                                                class="btn btn-info">Edit</a>
                                                            <a href="{{ url('contact/delete/' . $contact->id) }}"
                                                                class="btn btn-danger"
                                                                onclick="return confirm('Are you sure delete?')">Delete</a>
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
                                    {{-- @if (isset($contacts) && count($contacts) > 0)
                                        {{ $contacts->links() }}
                                    @endif --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div

@endsection
