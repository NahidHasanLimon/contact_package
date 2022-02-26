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
        <h6>Template: {{$template->title}}</h6>
      </div>
      <div class="card-body">
        {{-- {!!$template->content !!} --}}
        {!!$updated_temp !!}
       
      </div>
    </div>
@endsection
@section('page_level_script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>  
<script>
  $(document).ready(function() {
    $('#content').summernote();
});
</script>
@endsection

