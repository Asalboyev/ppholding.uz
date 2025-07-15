@extends('layouts.app')

@section('content')

    <h1 class="text-uppercase mb-4">products</h1>

    <a href="{{ route('products.create') }}" class="btn btn-success mb-3 text-white">Add product</a>

    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                    <tr>
                        <th class="border-0 rounded-start">#</th>
                        <th class="border-0">Title</th>
                        <th class="border-0">Catalog</th>
                        <th class="border-0">Vendor code</th>
                        <th class="border-0">Description</th>
                        <th class="border-0">Image</th>
                        <th class="border-0 rounded-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <!-- Item -->
                        <tr>
                            <td><a href="#" class="text-primary fw-bold">{{ ($products ->currentpage()-1) * $products ->perpage() + $loop->index + 1 }}</a></td>
                            <td class="fw-bold">{{ $product->title['ru'] }}</td>
                            <td>{{ isset($product->catalog->title['ru']) ? $product->catalog->title['ru'] : '--' }}</td>
                            <td>{{ $product->vendor_code }}</td>
                            <td>{{ $product->desc['ru'] }}</td>
                            <td>
                                <img src="{{ asset($product->main_img) }}" alt="" style="max-width: 250px">
                            </td>
                            <td>
                                <div class="actions d-flex flex-column">
                                    <form class="" action="{{ route('products.destroy', ['product' => $product->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="text-danger bg-transparent border-0 p-0 m-0 mb-3 fw-bolder">delete</button>
                                    </form>
                                    <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="text-info fw-bolder">edit</a>
                                </div>
                            </td>
                        </tr>
                        <!-- End of Item -->
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {!! $products->links() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
