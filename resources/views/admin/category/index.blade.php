<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <b>All Category</b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
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
                                <div class="card-header">All Category</div>

                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">SL No</th>
                                                <th scope="col">Category Name</th>
                                                <th scope="col">User</th>
                                                <th scope="col">Created At</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($categories) && count($categories) > 0)
                                                @foreach ($categories as $category)
                                                    <tr>
                                                        <th scope="row">{{ $categories->firstItem() + $loop->index }}
                                                        </th>
                                                        <td>{{ $category->category_name }}</td>
                                                        <td>{{ $category->user->name }}</td>
                                                        <td>
                                                            @if ($category->created_at == null)
                                                                <span class="text-danger">No Data Set</span>
                                                            @else
                                                                {{ $category->created_at->diffForHumans() }}
                                                            @endif
                                                        </td>
                                                        {{-- <td>{{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}</td> --}}

                                                        <td>
                                                            <a href="{{ url('/category/edit/' . $category->id) }}"
                                                                class="btn btn-info">Edit</a>
                                                            <a href="{{ url('softdelete/category/' . $category->id) }}"
                                                                class="btn btn-danger">Delete</a>
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
                                    @if (isset($categories) && count($categories) > 0)
                                        {{ $categories->links() }}
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">Add Category</div>
                                <div class="card-body">
                                    <form action="{{ route('store.category') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                            <input type="text" name="category_name" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp">
                                            @error('category_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add Category</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row my-5">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">Trash Category</div>

                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">SL No</th>
                                                <th scope="col">Category Name</th>
                                                <th scope="col">User</th>
                                                <th scope="col">Created At</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($trashCat) && count($trashCat) > 0)
                                                @foreach ($trashCat as $category)
                                                    <tr>
                                                        <th scope="row">{{ $trashCat->firstItem() + $loop->index }}
                                                        </th>
                                                        <td>{{ $category->category_name }}</td>
                                                        <td>{{ $category->user->name }}</td>
                                                        <td>
                                                            @if ($category->created_at == null)
                                                                <span class="text-danger">No Data Set</span>
                                                            @else
                                                                {{ $category->created_at->diffForHumans() }}
                                                            @endif
                                                        </td>
                                                        {{-- <td>{{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}</td> --}}

                                                        <td>
                                                            <a href="{{ url('/category/restore/' . $category->id) }}"
                                                                class="btn btn-info">Restore</a>
                                                            <a href="{{ url('/pdelete/category/' . $category->id) }}"
                                                                class="btn btn-danger">P Delete</a>
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
                                    @if (isset($trashCat) && count($trashCat) > 0)
                                        {{ $trashCat->links() }}
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
