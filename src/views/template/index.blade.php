<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>template List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>


    
    <div class="container">
      <div class="card-body">
        @include('contact::error')
      </div>
      <div class="card">
        <div class="card-header text-center">
          <h6>Template List</h6>
         <div class="d-flex justify-content-end">
            <a target="_blank" href="{{route('template.create')}}" class="btn">Add a template</a>
         </div>
        </div>
        <div class="card-body">
          <div class="table-responsive-sm">
            <table class="table table-sm">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Purpose</th>
                  <th scope="col">Thumbnail</th>
                  <th scope="col">Status</th>
                  <th scope="col">Actions</th>
                  {{-- <th scope="col">Status</th> --}}
                  {{-- <th scope="col">Remarks</th> --}}
                </tr>
              </thead>
              <tbody>
                @foreach ($templates as $template)
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$template->title}}</td>
                    <td>{{$template->purpose}}</td>
                    <td>Thumbnail</td>
                    <td>
                      @if($template->status == 'active')
                        <span class="badge badge-info">Active</span>
                      @elseif($template->status == 'inactive')
                        <span class="badge badge-success">Inacctive</span>
                      @else
                        <span class="badge badge-secondary">N/A</span>
                      @endif
                    </td>
                    <td>
                      <a class="btn btn-info" href="{{route('template.show',$template->id)}}">View</a>
                        @if($template->status != 'active')
                          {{-- <a class="btn btn-secondary btn-xs" href="">make active</a> --}}
                          <form class="d-inline" action="{{route('template.change_status',$template->id)}}" method="POST">
                            @csrf
                            <input type="submit" class="btn btn-secondary btn-xs" value="make active ">
                          </form>
                        @endif
                    </td>
                    {{-- <td>{{$template->remarks ?  $template->remarks : 'N/A'}}</td> --}}
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
</body>
</html>