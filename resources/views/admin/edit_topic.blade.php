<!DOCTYPE html>
<html lang="en">

@include('admin.includes.head')
@include('admin.includes.header')
@include('admin.includes.footer')

<body>

  
<div class="container my-5">
    <div class="mx-2">
        <h2 class="fw-bold fs-2 mb-5 pb-2">Edit Topic</h2>
        <!-- Form action points to the update route -->
        <form action="{{ route('topic.update', $topic->id) }}" method="POST" enctype="multipart/form-data" class="px-md-5">
            @csrf
            @method('PUT') <!-- Use PUT method for updating -->
            
            <div class="form-group mb-3 row">
                <label for="title" class="form-label col-md-2 fw-bold text-md-end">Topic Title:</label>
                <div class="col-md-10">
                    <input type="text" name="title" placeholder="e.g. Design Patterns" class="form-control py-2" value="{{ old('title', $topic->title) }}" required/>
                    @error('title')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group mb-3 row">
                <label for="category" class="form-label col-md-2 fw-bold text-md-end">Category:</label>
                <div class="col-md-10">
                    <select name="category" id="category" class="form-control py-1" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->name }}" {{ $topic->category == $category->name ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group mb-3 row">
                <label for="content" class="form-label col-md-2 fw-bold text-md-end">Content:</label>
                <div class="col-md-10">
                    <textarea name="content" id="content" rows="5" class="form-control" required>{{ old('content', $topic->content) }}</textarea>
                    @error('content')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group mb-3 row">
                <label for="trending" class="form-label col-md-2 fw-bold text-md-end">Trending:</label>
                <div class="col-md-10">
                <input type="hidden" name="trending" value="0"> <!-- Hidden field for unchecked state -->
                <input type="checkbox" name="trending" value="1" class="form-check-input" style="padding: 0.7rem;" {{ old('trending', $topic->trending) ? 'checked' : '' }} />
                </div>
            </div>

            <div class="form-group mb-3 row">
                <label for="published" class="form-label col-md-2 fw-bold text-md-end">Published:</label>
                <div class="col-md-10">
                <input type="hidden" name="published" value="0"> <!-- Hidden field for unchecked state -->
                <input type="checkbox" name="published" value="1" class="form-check-input" style="padding: 0.7rem;" {{ old('published', $topic->published) ? 'checked' : '' }} />
                </div>
            </div>

            <hr>

            <div class="form-group mb-3 row">
                <label for="image" class="form-label col-md-2 fw-bold text-md-end">Image:</label>
                <div class="col-md-10">
                    <input type="file" name="image" class="form-control" style="padding: 0.7rem; margin-bottom: 10px;" />
                    @if($topic->image)
                       <img src="{{ asset('admin/assests/images/topics/' . $topic->image) }}" alt="Topic Image" style="width: 10rem;">
                       @endif
                    @error('image')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="text-md-end">
                <button type="submit" class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
                    Edit Topic
                </button>
        </div>
      </form>
    </div>
  </div>
  </main>
