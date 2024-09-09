<!DOCTYPE html>
<html lang="en">
@include('admin.includes.head')
@include('admin.includes.header')

  <div class="container my-5">
    <div class="mx-2">
      <h2 class="fw-bold fs-2 mb-5 pb-2">Add Testimonial</h2>
      <form action="" method="" class="px-md-5">
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Name:</label>
          <div class="col-md-10">
            <input type="text" placeholder="e.g. Jhon Doe" class="form-control py-2" />
          </div>
        </div>
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Content:</label>
          <div class="col-md-10">
            <textarea name="" id="" rows="5" class="form-control"></textarea>
          </div>
        </div>
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Published:</label>
          <div class="col-md-10">
            <input type="checkbox" class="form-check-input" style="padding: 0.7rem;" />
          </div>
        </div>
        <hr>
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Image:</label>
          <div class="col-md-10">
            <input type="file" class="form-control" style="padding: 0.7rem;" />
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
  <script src="{{asset('admin/assests/js/jquery.min.js')}}"></script>
  <script src="{{asset('admin/assests/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('admin/assests/js/dataTables.min.js')}}"></script>
  <script src="{{asset('admin/assests/js/tables.js')}}"></script>
</body>

</html>