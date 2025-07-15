@extends('layouts.app')

@section('content')

    <h1 class="text-uppercase mb-4">sertificates</h1>

    <a href="{{ route('sertificates.create') }}" class="btn btn-success mb-3 text-white">Add sertificate</a>

    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                    <tr>
                        <th class="border-0 rounded-start">#</th>
                        <th class="border-0">Description</th>
                        <th class="border-0">Image</th>
                        <th class="border-0 rounded-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sertificates as $sertificate)
                        <!-- Item -->
                        <tr>
                            <td><a href="#" class="text-primary fw-bold">{{ ($sertificates ->currentpage()-1) * $sertificates ->perpage() + $loop->index + 1 }}</a></td>
                            <td>{{ $sertificate->desc['ru'] }}</td>
                            <td>
                                <img src="{{ asset($sertificate->img) }}" alt="" style="max-width: 250px">
                            </td>
                            <td>
                                <div class="actions d-flex flex-column">
                                    <form class="" action="{{ route('sertificates.destroy', ['sertificate' => $sertificate->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="text-danger bg-transparent border-0 p-0 m-0 mb-3 fw-bolder">delete</button>
                                    </form>
                                    <a href="{{ route('sertificates.edit', ['sertificate' => $sertificate->id]) }}" class="text-info fw-bolder">edit</a>
                                </div>
                            </td>
                        </tr>
                        <!-- End of Item -->
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {!! $sertificates->links() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
