<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact with me</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>


    
    <div class="container">
      <div class="card-body">
        @include('contact::error')
      </div>
      <div class="card">
        <div class="card-header text-center">
          <h6>Contact With Me</h6>
        </div>
        <div class="card-body">
          <form action="{{route('contact.post')}}" method="POST">
            @csrf
            <div class="form-group row"> 
              <div class="col-md-6">
                <label for="name">Name</label>
                <input name="name" type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter your name">
                
              </div>
            <div class="col-md-6">
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control" id="email" aria-describedby="email" placeholder="Enter your email">
              </div>
            </div>
                <div class="form-group">
                  <label for="area"> What are you looking for?</label>
                    <select name="area" id="area" class="form-control">
                      <option value="software_development">Software Development</option>
                      <option value="software_architecture">Software Architecture</option>
                      <option value="business_discussion">Business Discussion </option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-group-label" for="description">Description</label>
                  <textarea name="description" id="description" class="form-control" cols="30" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label for="attachement">Attachment</label>
                  <input name="attachement" type="file" class="form-control" id="attachement" aria-describedby="attachement" placeholder="Enter attachement">
                </div>
                <div class="d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
          </form>

        </div>
      </div>

    </div>
</body>
</html>