@extends('layouts.dashboard.master')

@section('title', isset($blog) ? 'Edit Blog' : 'Add Blog')

@section('dashboard-content')
<div class="container-fluid">
     <!-- Debug Errors -->
    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ isset($blog) ? route('blogs.update', $blog->id) : route('blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($blog))
            @method('PUT')
        @endif
        
        <div class="row">
            <!-- Left side -->
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <!-- Name -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Blog Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Blog title" 
                                   value="{{ old('title', $blog->title ?? '') }}">
                            @error('title')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                          
                          <div class="mt-2">
                              <label class="form-label">Slug</label>
                              <div class="input-group">
                                  <input type="text" name="slug" id="slugInput" class="form-control" 
                                         value="{{ old('slug', $blog->slug ?? '') }}" 
                                         placeholder="slug" readonly>
                                  <button type="button" class="btn btn-outline-secondary" onclick="enableSlugEditing()" id="editSlugBtn">
                                      <i class="fas fa-edit"></i> Edit
                                  </button>
                              </div>
                              @error('slug')
                                <div class="text-danger small">{{ $message }}</div>
                              @enderror
                          </div>
                        </div>

                        <!-- Description (with CKEditor) -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="6">{{ old('description', $blog->description ?? '') }}</textarea>
                            @error('description')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right side -->
            <div class="col-md-2">
                <div class="d-grid gap-2 mb-3">
                    <button type="submit" class="btn btn-primary">
                        {{ isset($blog) ? 'Update Blog' : 'Publish Blog' }}
                    </button>
                </div>

                <!-- Categories -->
                <div class="card mb-3">
                    <div class="card-body">
                        <label class="form-label">Categories</label>
                        <div class="d-flex flex-column">
                            @foreach($categories as $category)
                                <div class="form-check">
                                    <input class="form-check-input" 
                                        type="checkbox" 
                                        name="categories[]" 
                                        value="{{ $category->id }}" 
                                        id="category-{{ $category->id }}"
                                        {{ in_array($category->id, old('categories', isset($blog) ? $blog->categories->pluck('id')->toArray() : [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="category-{{ $category->id }}">
                                        {{ $category->title }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error('categories')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                        @error('categories.*')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Featured Image -->
                <div class="card mb-3">
                    <div class="card-body">
                        <label class="form-label">Featured Image</label>
                            <div>
                                <button type="button" class="setMediaBtn" data-bs-toggle="modal" data-bs-target="#uploadImageModal" 
                                        onclick="setImageType('featured_image')">
                                    Set Featured Image
                                </button>
                            </div>
                         
                            <div id="featuredimageContainer" style="{{ isset($blog) && $blog->featured_image ? '' : 'display:none;' }} margin-top:10px;">
                                <div class="frontend-item d-inline-block position-relative">
                                    <img id="featuredimageImage" src="{{ isset($blog) && $blog->featured_image ? asset('storage/' . $blog->featured_image) : '' }}" 
                                         class="img-fluid rounded border" style="max-height:100px;">
                                    <button type="button" class="btn btn-danger btn-sm btn-remove position-absolute top-0 end-0 m-1"
                                            onclick="removeImage('featured_image')">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <input type="hidden" name="featured_image" id="featuredimageInput" value="{{ old('featured_image', $blog->featured_image ?? '') }}">
                        
                    </div>
                </div>

                
            </div>
        </div>
    </form>
    @include('pages.dashboard.common.media.index')

</div>


@endsection