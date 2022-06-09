@extends('layouts.app')

@section('content')
<div class="container">

    @if (session('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
    @endif

    <a href=" {{route('admin.categories.create')}} " class="btn btn-success">Crea category</a>

    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">label</th>
                <th scope="col">color</th>
                <th scope="col">actions</th>
            </tr>
        </thead>
        <tbody>

            @forelse ( $categories as $category )
                <tr>
                    <th>{{ $category->label }}</th>
                    <td>
                        <p>{{ $category->color }}</p>
                    </td>
                    <td class="d-flex ">
                        <a href=" {{ route('admin.categories.show', $category->id) }} " class="btn btn-primary">View</a>
                        {{-- <form action=" {{ route('admin.categories.destroy', $post->id) }} " method="POST" class="delete-form">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form> --}}

                        @include('includes.deleteCategory')

                        <a href=" {{ route('admin.categories.edit', $category->id) }} " class="btn btn-primary">Edit</a>

                    </td>
                </tr>
            @empty
                <h2>Non ci sono categorie</h2>
            @endforelse



        </tbody>
    </table>

    {{-- @if( $posts->hasPages() )
        {{ $posts->links() }}
    @endif --}}

</div>


@endsection

@section('scripts')
<script src="{{ asset('js/delete-form.js') }}"></script>
@endsection
