<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hangman</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<class="container">
    <div>
    <h1>
      <br>
     <strong>Word:</strong> 
            @foreach ($wordarray as $letter)
                @if(in_array($letter,$storeletters))
                {{$letter}}
                @else
                _ 
                @endif
            @endforeach
     @if($tries==0)
     <P>YOU LOST! Try again.</P>
     @elseif($foundword)
     <P>YOU WIN</P>
     @else 
      <P>You have {{$tries}} remaining attempts</P>
      @endif
   </h1>
   </div>
   <h1>
    <form action="{{url("/hangman")}}" method="POST">
    @csrf
    <div>
   @foreach ($letters as $index=>$letter)
       @if($index % 6==0) <br>
       @endif
       @if(in_array($letter,$storeletters))
       <button type="submit" name="letter" class="btn btn-danger" style="letter-spacing:2px;">{{$letter}}</button>
       @else  
     <button type="submit" name="letter" id="letter" class="btn btn-info" style="letter-spacing:2px;" value="{{ $letter }}">{{$letter}}</button>
      @endif
   @endforeach
   </h1>
</div>
</form>
 <br>
  <form action="{{route("newGame.hangman")}}" method="GET">
<button type="sumbit" name="newgames" id="newgame" class="btn btn-primary">New game</button>
  </form>
   </div>
</body>
</html>