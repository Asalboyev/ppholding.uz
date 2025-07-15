@extends('layouts.app')

@section('content')

    <h1 class="text-uppercase mt-5">services</h1>

    <div class="headcrumbs d-flex mb-3">
        <a href="{{ route('products.index') }}" class="d-flex text-uppercase me-2" style="opacity:25%">products</a> >> <a class="d-flex text-uppercase ms-2">create</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="post" enctype='multipart/form-data'>
        @csrf
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow components-section">
                    <div class="card-body">
                        <nav>
                            <div class="nav nav-tabs border-bottom mb-4" id="nav-tab" role="tablist">
                                @foreach($languages as $language)
                                    <button class="nav-link border-bottom" id="{{ $language->lang }}-tab" data-bs-toggle="tab" data-bs-target="#{{ $language->lang }}" type="button" role="tab" aria-controls="{{ $language->lang }}" aria-selected="true">{{ $language->lang }}</button>
                                @endforeach
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            @foreach($languages as $language)
                                <div class="tab-pane fade" id="{{ $language->lang }}" role="tabpanel" aria-labelledby="{{ $language->lang }}-tab">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6">
                                            <!-- Form -->
                                            <div class="mb-4">
                                                <label for="email">Title</label>
                                                <input type="text" class="form-control" name="title[{{ $language->small }}]" placeholder="title..." value="{{ old('title.'.$language->small) }}">
                                            </div>
                                            <div class="my-4">
                                                <label for="textarea">Description</label>
                                                <textarea class="form-control ckeditor" placeholder="Enter your description..." id="textarea" rows="4" name="desc[{{ $language->small }}]">{{ old('desc.'.$language->small) }}</textarea>
                                            </div>
                                            <!-- End of Form -->
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-4">
                                    <label class="my-1 me-2" for="catalog">Catalog</label>
                                    <select class="form-select" id="catalog" name="catalog">
                                        <option>Open this select menu</option>
                                        @foreach($catalog as $item)
                                            <option value="{{ $item->id }}" {{ old('catalog') == $item->id ? 'selected' : '' }}>{{ $item->title['ru'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="email">Vendor code</label>
                                    <input type="text" class="form-control" name="vendor_code" placeholder="vendor code..." value="{{ old('vendor_code') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6 col-sm-6">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Image</label>
                                    <input class="form-control" type="file" name="img">
                                </div>
                            </div>
                        </div>
                        @include('app.includes.file_upload', [
                            'name' => 'images',
                            'label' => 'Images',
                            'datas' => [],
                            'multiple' => true
                        ])
                        <button class="btn btn-success px-5 text-white" type="submit" style="padding:12px">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('scripts')
    <script>
        $(document).on('click', '.openFileDialog', function (e) {
            $(this).parents(".fileUploadBlock").find('input[type=file]').trigger('click');
        });
        $(document).on('click', '.rmFile', function (e) {
            $(this).parent(".d-flex").remove();
        });
        $('.fileUploadInput').on('change', function () {
            var formData = new FormData();
            var hi = $(this).attr("name") + '_hidden[]';
            var pv = $(this).parents(".fileUploadBlock").find('.previewFiles');
            formData.append('file', $(this)[0].files[0]);
            $.ajax({
                method : 'post',
                cache: false,
                contentType: false,
                processData: false,
                url : '/admin/file/upload',
                data : formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success : function (data) {
                    if(data.file_type == 'img'){
                        var fileBlok = `
					<div class="d-flex align-items-center justify-content-center me-2 mb-2" style="width: 100px; height: 100px; background-color: #eeeeee82; border-radius: 12px; border: 1px dashed #ccc; cursor: pointer; position: relative">
						<img src="/images/${data.file_name}" alt="" style="height: 100%; width:100%; border-radius: 12px;object-fit: cover;">
						<input type="hidden" name="${hi}" value="${data.file_name}">
						<button class="btn btn-danger rmFile" style="position: absolute;top: -7px;padding: 0.15rem 0.55rem;right: -7px;"><i class="fas fa-times"></i></button>
					</div>
					`
                    }else{
                        var fileBlok = `
					<div class="d-flex align-items-center justify-content-center me-2 mb-2" style="width: 100px; height: 100px; background-color: #eeeeee82; border-radius: 12px; border: 1px dashed #ccc; cursor: pointer; position: relative">
						<i class="fas fa-file fa-2x" style="color: #29313d;"></i>
						<input type="hidden" name="${hi}" value="${data.file_name}">
						<button class="btn btn-danger rmFile" style="position: absolute;top: -7px;padding: 0.15rem 0.55rem;right: -7px;"><i class="fas fa-times"></i></button>
					</div>
					`
                    }
                    pv.prepend(fileBlok);
                },
                error : function (error) {
                    console.log(error)
                },
            });
        });
    </script>
@endsection
