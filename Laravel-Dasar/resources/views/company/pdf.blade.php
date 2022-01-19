<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 15px;
        }
    </style>
  </head>
  <body>
  @if($data->isEmpty())
                        {{ __('No Data Available') }}
  @else
    <table class="table table-bordered">
    <thead>
      <tr>
        <td><b>Nama</b></td>
        <td><b>Company</b></td>
        <td><b>Email</b></td>     
      </tr>
      </thead>
      <tbody>
        @foreach($data as $d)
            <tr>
                <td>
                {{$d->name}}
                </td>
                <td>
                {{$d->companies->name}}
                </td>
                <td>
                {{$d->email}}
                </td>
            </tr>
        @endforeach
      </tbody>
    </table>
   @endif
  </body>
</html>