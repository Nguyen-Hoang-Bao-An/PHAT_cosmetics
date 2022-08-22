@extends('layouts.admin')

@section('title')
    <title>Category List</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Category', 'key' => 'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('categories.create') }}" class="btn btn-success float-right m-2">Create new
                            Category</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Parent Category</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    @if ($category->parent_id == null)
                                        <tr>
                                            <th scope="row">{{ $category->id }}</th>
                                            <td>{{ $category->name }}</td>
                                            <td></td>
                                            <td>
                                                <a href="{{ route('categories.edit', ['id' => $category->id]) }}"
                                                    class="btn btn-default">Edit</a>
                                                <a href=" {{ route('categories.delete', ['id' => $category->id]) }}"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <th scope="row">{{ $category->id }}</th>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $categories->where('id',$category->parent_id)->first() ? $categories->where('id',$category->parent_id)->first()->name : '' }}</td>
                                            <td>
                                                <a href="{{ route('categories.edit', ['id' => $category->id]) }}"
                                                    class="btn btn-default">Edit</a>
                                                <a href=" {{ route('categories.delete', ['id' => $category->id]) }}"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endif

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $categories->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
