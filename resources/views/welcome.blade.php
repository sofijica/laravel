<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Kompanija</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Kompanija</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item active">
                <a class="nav-link" href="/">Departmani</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="/radnici">Radnici</a>
                </li>

            </ul>
        </div>
       
    </nav>
    <div class='container'>
        <h1 class='text-center '>Departmani u kompaniji</h1>
        @foreach($departmani as $departman)
            <div class='row mt-3 border-top border-secondary'>
               <div class='col-12'>
               <h4 class='text-center'>{{$departman->naziv}} - {{$departman->radnici->count()}} radnika </h4>
                <form action="/departman/{{$departman->id}}" method="get">
                <button type='submit' class='btn btn-secondary form-control'>Izmeni</button>
            </form>
               </div>
            </div>
        @endforeach
        </div>
</body>
</html>