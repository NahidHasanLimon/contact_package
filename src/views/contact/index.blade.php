<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>


    
    <div class="container">
      <div class="card-body">
        @include('contact::error')
      </div>
      <div class="card">
        <div class="card-header text-center">
          <h6>Contact List</h6>
          <div class="d-flex">
            <a href="/contact/marked-all-seen" class="btn btn-xs btn-success py-0 ">Marked all as seen</a>

          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive-sm">
            <table class="table table-sm">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Area</th>
                  <th scope="col">Description</th>
                  <th scope="col">Status</th>
                  <th scope="col">Remarks</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($contacts as $contact)
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$contact->name}}</td>
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->phone_number}}</td>
                    <td>{{$contact->area}}</td>
                    <td>{{$contact->description}}</td>
                    <td>
                      @if($contact->status == 'unseen')
                        <span class="badge badge-info">Unseen</span>
                      @elseif($contact->status == 'seen')
                        <span class="badge badge-success">Seen</span>
                      @else
                        <span class="badge badge-secondary">N/A</span>
                      @endif
                    </td>
                    <td>{{$contact->remarks ?  $contact->remarks : 'N/A'}}</td>
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