@extends('layouts.app')

@section('content')

<h1 class="text-uppercase mb-4">Catalog</h1>

<a href="{{ route('catalog.create') }}" class="btn btn-success mb-3 text-white">Add catalog</a>

<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-centered table-nowrap mb-0 rounded">
                <thead class="thead-light">
                <tr>
                    <th class="border-0 rounded-start">#</th>
                    <th class="border-0">Title</th>
                    <th class="border-0">Description</th>
                    <th class="border-0">Image</th>
                    <th class="border-0 rounded-end">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($catalog as $item)
                    <!-- Item -->
                    <tr>
                        <td><a href="#" class="text-primary fw-bold">{{ ($catalog ->currentpage()-1) * $catalog ->perpage() + $loop->index + 1 }}</a></td>
                        <td class="fw-bold">{{ $item->title['ru'] }}</td>
                        <td>{{ $item->desc['ru'] }}</td>
                        <td>
                            <img src="{{ asset($item->img) }}" alt="" style="max-width: 250px">
                        </td>
                        <td>
                            <div class="actions d-flex flex-column">
                                <form class="" action="{{ route('catalog.destroy', ['catalog' => $item->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-danger bg-transparent border-0 p-0 m-0 mb-3 fw-bolder">delete</button>
                                </form>
                                <a href="{{ route('catalog.edit', ['catalog' => $item->id]) }}" class="text-info fw-bolder">edit</a>
                            </div>
                        </td>
                    </tr>
                    <!-- End of Item -->
                @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {!! $catalog->links() !!}
            </div>
        </div>
    </div>
</div>

@endsection
