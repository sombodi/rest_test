<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>MYJAR REST API TEST</title>

    <!-- Bootstrap -->
    <link href="css/app.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <h1>Hello, world!</h1>

      @foreach ($clients as $client)
          <p>This is client {{ $client->id }} <br>
          Email: {{ $client->email }} <br>
          Telephone: {{ $client->telephone }} <br>
          @if(!is_null($client->client_data))
          Client Data: 
          <ul>
            @foreach($client->client_data as $a_client_data_key => $a_client_data )
              <li> {{$a_client_data_key}} - {{ $a_client_data }} </li>
            @endforeach 
          </ul>
          @endif
          </p>
          <hr>
      @endforeach


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/app.js"></script>
  </body>
</html>