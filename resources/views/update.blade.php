<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
<div class="container">
        <form action="/uptodate" method="post">
            <br><br><br><br>
            {{ csrf_field() }}
            <input type="hidden" name="id" class="form-control" value="{{ $taskdata->id }}">
            <input type="text" name="task" class="form-control" value="{{ $taskdata->task }}">
            <br><br>
            <button type="submit" class="btn btn-danger">Update</button>
            <a href="/task" class="btn btn-warning">Back</a>
        </form>
    </div>
</body>
</html>