<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
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
                <li class="nav-item ">
                    <a class="nav-link" href="/">Departmani</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/radnici">Radnici</a>
                </li>

            </ul>
        </div>
    </nav>
    <div class='container'>
        <div class='row mt-3'>
            <div class='col-9'>
                <h1 class='text-center'>{{$departman->naziv}}</h1>
            </div>
            <div class='col-3'>
                <form action="/departman/{{$departman->id}}/obrisi" method="post">
                @csrf
                    <button class='btn btn-danger mt-2'>Obrisi</button>
                </form>
            </div>
        </div>
        <div class="row mt-2 mb-4">
            <div class="col-8">
                <form action="/departman/{{$departman->id}}" method="post">
                @csrf
                    <label>Izmeni naziv</label>
                    <input type="text" class="form-control" name="naziv" value='{{$departman->naziv}}'>
                </form>
            </div>
        </div>
        <h2>Radnici u departmanu</h2>
        <div class='row mt-2'>

            <div class="col-7">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ime</th>
                            <th>Prezime</th>
                            <th>Godina zaposlenja</th>
                            <th>Struka</th>
                            <th>Plata</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($departman->radnici as $radnik)
                        <tr>
                            <td>{{$radnik->id}}</td>
                            <td>{{$radnik->ime}}</td>
                            <td>{{$radnik->prezime}}</td>
                            <td>{{date('Y', strtotime($radnik->created_at))}}</td>
                            <td>{{$radnik->struka->naziv}}</td>
                            <td>{{$radnik->plata}}</td>
                            <td>
                                <form action="/radnik/{{$radnik->id}}/izbaci" method="post">
                                @csrf
                                <input type="text" hidden value='{{$departman->id}}' name="departman">
                                <button type='submit' class='btn btn-danger form-control'>Izbaci</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-5">
                <h2>Dodaj radnika u departman</h2>
                <form action="/radnik/ubaci" method="post">
                 @csrf
                    <input type="text" hidden value='{{$departman->id}}' name="departman">
                    <label>Izaberite radnika</label>
                    <select class=" form-control" name='radnik_id'>
                        @foreach($radnici as $radnik)
                        <option value="{{$radnik->id}}">{{$radnik->ime.' '.$radnik->prezime}}</option>
                        @endforeach
                    </select>
                    <button class='btn btn-primary form-control mt-2'>Dodaj</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>