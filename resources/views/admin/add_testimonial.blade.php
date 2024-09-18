<!DOCTYPE html>
<html lang="en">
@include('admin.includes.head')
@include('admin.includes.header')
@include('admin.includes.footer')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container my-5">
    <div class="mx-2">
        <h2 class="fw-bold fs-2 mb-5 pb-2">Add Testimonial</h2>
        <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data" class="px-md-5">
            @csrf
            <div class="form-group mb-3 row">
                <label class="form-label col-md-2 fw-bold text-md-end">Name:</label>
                <div class="col-md-10">
                    <input type="text" name="name" placeholder="e.g. John Doe" class="form-control py-2" required />
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label class="form-label col-md-2 fw-bold text-md-end">Content:</label>
                <div class="col-md-10">
                    <textarea name="content" rows="5" class="form-control" required></textarea>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="published" class="form-label col-md-2 fw-bold text-md-end">Published:</label>
                <div class="col-md-10">
                <input type="hidden" name="published" value="0"> <!-- Hidden field for unchecked state -->
                <input type="checkbox" name="published" value="1" class="form-check-input"  {{ old('published', $model->published ?? false) ? 'checked' : '' }}  style="padding: 0.7rem;" />
                </div>
            </div>
            <hr>
            <div class="form-group mb-3 row">
                <label class="form-label col-md-2 fw-bold text-md-end">Image:</label>
                <div class="col-md-10">
                    <input type="file" name="image" class="form-control" style="padding: 0.7rem;" />
                </div>
            </div>
            <div class="text-md-end">
                <button class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
                    Add Testimonial
                </button>
        </div>
      </form>
    </div>
  </div>
  </main>
 