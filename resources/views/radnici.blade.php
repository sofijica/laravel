<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Radnici</title>
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
                    <a class="nav-link active" href="/radnici">Radnici</a>
                </li>

            </ul>
        </div>
    </nav>
    <div class='container'>
        <div class='row mt-5'>
            <div class='col-7'>
                <h2>Radnici u kompaniji</h2>
                <table class='table table-striped text-center'>
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
                        @foreach($radnici as $radnik)
                        <tr>
                            <td>{{$radnik->id}}</td>
                            <td>{{$radnik->ime}}</td>
                            <td>{{$radnik->prezime}}</td>
                            <td>{{date('Y', strtotime($radnik->created_at))}}</td>
                            <td>{{$radnik->struka->naziv}}</td>
                            <td>{{$radnik->plata}}</td>
                            <td>
                               
                                <form action="/radnik/{{$radnik->id}}" method="post">
                                @csrf
                                <button type='submit' class='btn btn-danger form-control'>Obrisi</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class='col-5'>
                <h2>Kreiraj radnika</h2>
                <form action="/radnik" method="post">
                @csrf
                    <label>Ime</label>
                    <input type="text" name='ime' class='form-control'>
                    <label>Prezime</label>
                    <input type="text" name='prezime' class='form-control'>
                    <label>Plata</label>
                    <input type="text" name='plata' class='form-control'>
                    <label>Struka</label>
                    <select id='struke' name='struka_id' class='form-control'></select>
                    <button type='submit' class='btn btn-primary mt-5 form-control'> Kreiraj
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $.getJSON('/api/struka', function (data) {
            console.log(data);
            if (!data.success) {
                alert('doslo je do greske pri ucitavanju struke. Molim ponovo ucitajte stranicu');
                return;
            }
            for (let struka of data.data) {
                $('#struke').append(
                    `
                    <option value='${struka.id}'>${struka.naziv}</option>
                    `
                )
            }
        })
    </script>
</body>

</html>