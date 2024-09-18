<!DOCTYPE html>
<html lang="en">

@include('admin.includes.head')
@include('admin.includes.header')
@include('admin.includes.footer')

<body>
 
  
<div class="container my-5">
    <div class="mx-2">
        <h2 class="fw-bold fs-2 mb-5 pb-2">Edit Testimonial</h2>
        <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data" class="px-md-5">
            @csrf
            @method('PUT') 
            <div class="form-group mb-3 row">
                <label for="name" class="form-label col-md-2 fw-bold text-md-end">Name:</label>
                <div class="col-md-10">
                    <input type="text" name="name" placeholder="e.g. Jhon Doe" class="form-control py-2" value="{{ old('name', $testimonial->name) }}" />
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="content" class="form-label col-md-2 fw-bold text-md-end">Content:</label>
                <div class="col-md-10">
                    <textarea name="content" id="content" rows="5" class="form-control">{{ old('content', $testimonial->content) }}</textarea>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="published" class="form-label col-md-2 fw-bold text-md-end">Published:</label>
                <div class="col-md-10">
                    <input type="checkbox" name="published" class="form-check-input" style="padding: 0.7rem;" value="1"  {{ old('published', $testimonial->published) ? 'checked' : '' }}  />
                </div>
            </div>
            <hr>
            <div class="form-group mb-3 row">
                <label for="image" class="form-label col-md-2 fw-bold text-md-end">Image:</label>
                <div class="col-md-10">
                    <input type="file" name="image" class="form-control" style="padding: 0.7rem; margin-bottom: 10px;" />
                    @if($testimonial->image)
                        <img src="{{ asset('admin/assets/images/testimonials/' . $testimonial->image) }}" alt="Testimonial Image" style="width: 10rem;">
                    @endif
                </div>
            </div>
            <div class="text-md-end">
                <button type="submit" class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
                    Edit Testimonial
                </button>
        </div>
      </form>
    </div>
  </div>
  </main>
  