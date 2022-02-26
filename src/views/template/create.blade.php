@extends('contact::master')
@section('page_level_style')
    <!-- include summernote css/js -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  
@endsection
@section('body')
    <div class="card-body">
      @include('contact::error')
    </div>
    <div class="card">
      <div class="card-header text-center">
        <h6>Template With Me</h6>
      </div>
      <div class="card-body">
        <form action="{{route('template.post')}}" method="POST">
          @csrf
          <div class="form-group row"> 
            <div class="col-md-6">
              <label for="name">Title</label>
              <input name="title" type="text" class="form-control" id="title" aria-describedby="name" placeholder="Enter title" required>
              
            </div>
          <div class="col-md-6">
              <label for="purpose">Purpose</label>
              <select name="purpose" id="purpose" class="form-control" required>
                <option value="contact_response">Contact Auto Response</option>
                <option value="other">Others</option>
              </select>
            </div>
          </div>
              
              <div class="form-group">
                  <label class="form-group-label" for="content">content</label>
                <textarea name="content" id="content" class="form-control" cols="30" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label for="preview_image">Thumbnail</label>
                <input name="preview_image" type="file" class="form-control" id="preview_image" aria-describedby="preview_image" placeholder="Enter preview_image" required>
              </div>
              <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
        </form>

      </div>
    </div>

@endsection
@section('page_level_script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>  
<script>
//   $(document).ready(function() {
//     $('#content').summernote();
// });
</script>
@endsection

