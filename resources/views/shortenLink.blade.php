<!DOCTYPE html>
<html>
<head>
    <title>ShortLink</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>
<body>

<div class="container">
    <h1><strong>ShortLink</strong></h1>

    <div class="card">
      <div class="card-header">
        <form method="POST" action="{{ route('generate.shorten.link.post') }}">
            @csrf
            <div class="input-group mb-3">
              <input type="text" name="link" class="form-control" placeholder="Enter URL" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-success" type="submit">Generate Shorten Link</button>
              </div>
            </div>
        </form>
      </div>
      <div class="card-body">

              @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
 <input  id="input" name="custId">

            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Short Link</th>
                        <th>Action</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($shortLinks as $index => $row)
                        <tr>
                             <td>{{ $index+1 }}</td>
                            <td><a href="{{ route('shorten.link', $row->code) }}" target="_blank">{{ route('shorten.link', $row->code) }}</a></td>
                            <td>
            {{-- <button class="copyButton" id="copyButton">Copy</button> --}}
              
    {!! Form::open(['method' => 'DELETE','url' => 'shortlinks/'. $row->id]) !!}
      
                  {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
      
                  {!! Form::close() !!}
                            </td>
                            <td>{{ $row->link }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
      </div>
    </div>
    
</div>
{{--  <script>
        function copy(copyId){

            var $inp = $("#input");
            $("body").append($inp);
            $inp.val($(""+copyId).
                text()).select();
            document.execCommand("copy");
            $inp.remove();


        }

        $(document).ready(function(){
            $id = ('#copytext').text();
console.log($id);
            $('#copyButton').click(
                function(){
                    copy('#copytext');
                });
        });
 </script> --}}
</body>
</html>