@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">
    <h4>User Configrations</h4>
  </div>
  <div class="card-body">
  <form action="{{ route('settings.update', $setting->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method("PUT")
      <div class="form-group row">
        <div class="col-lg-4">
          <label class="form-label">App Name:</label>
          <input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror" value="{{ $setting->company_name }}">
        </div>
        <div class="col-lg-4">
          <label class="form-label">Email:</label>
          <input type="email" name="email" class="form-control"  value="{{ $setting->email }}">
        </div>
        <div class="col-lg-4">
          <label class="form-label">Mobile:</label>
            <input type="text" name="mobile" class="form-control"  value="{{ $setting->mobile }}">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-lg-6">
          <label class="form-label">Main Color:</label>
          <input type="color" name="main_color" class="form-control" value="{{ $setting->main_color }}" >
          <input type="hidden" name="old_color" class="form-control" value="{{ $setting->main_color }}">
        </div>
        <div class="col-lg-6">
          <label class="form-label">Second Color:</label>
            <input type="color" name="second_color" class="form-control"  value="{{ $setting->second_color }}">
          <input type="hidden" name="second_old_color" class="form-control" value="{{ $setting->second_color }}">

        </div>
      </div>
      <div class="form-group row">
        <div class="col-lg-12">
          <label class="form-label">Description:</label>
          <textarea class="form-control" name="desc">{{ $setting->desc }}</textarea>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-lg-12">
          <label class="form-label">Tags:</label>
          <textarea class="form-control" name="tags">{{ $setting->tags }}</textarea>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-lg-3">
            <div class="" >
                <label class="form-label">Logo: <span>(900 x 200 pixels)</span></label><br>
                <input type="file" name="logo" class="form-control file" accept="image/*" ><br>
                
            </div>
        </div>
        <div class="col-lg-3">
            <div class="" >
                <label class="form-label">Favicon Image:</label><br>
                <input type="file" name="favicon" accept="image/*" class="form-control file" accept="image/*" ><br>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="" >
                <label class="form-label">Login Image: (1647 x 892 pixels)</label><br>
                <input type="file" name="login_img" accept="image/*" class="form-control file" accept="image/*" ><br>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="" >
                <label class="form-label">Profile: (432 x 432 pixels)</label><br>
                <input type="file" name="profile" accept="image/*" class="form-control file" accept="image/*" ><br>
            </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-12">
          <button type="submit" class="btn btn-primary btn-sm btn-block form-control">Save</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
    function previewImage1(input) {
      var preview = document.getElementById("logoImagePreview");
      var file = input.files[0];
      var reader = new FileReader();

      reader.onload = function (e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
      };

      if (file) {
        reader.readAsDataURL(file);
      }
    }
</script>
<script>
    function previewImage2(input) {
      var preview = document.getElementById("faviconImagePreview");
      var file = input.files[0];
      var reader = new FileReader();

      reader.onload = function (e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
      };

      if (file) {
        reader.readAsDataURL(file);
      }
    }
</script>
<script>
    function previewImage3(input) {
      var preview = document.getElementById("loginImagePreview");
      var file = input.files[0];
      var reader = new FileReader();

      reader.onload = function (e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
      };

      if (file) {
        reader.readAsDataURL(file);
      }
    }
</script>
<script>
    function previewImage4(input) {
      var preview = document.getElementById("profileImagePreview");
      var file = input.files[0];
      var reader = new FileReader();

      reader.onload = function (e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
      };

      if (file) {
        reader.readAsDataURL(file);
      }
    }
</script>
@endsection
