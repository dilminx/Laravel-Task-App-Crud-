<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="text-center">
            <h1>Task App</h1>
            <div class="row">
                <div class="col-md-12">
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                    @endforeach
                    <br><br>
                    <form action="/saveTask" method="post">
                        {{ csrf_field() }}
                        <input type="text" class="form-control" name="task" placeholder="Enter Your Task">
                        <br>
                        <input type="submit" class="btn btn-primary" value="Save">
                        <input type="button" class="btn btn-warning" value="Clear">
                    </form>
                    <br><br>
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $dd)
                            <tr>
                                <td>{{ $dd->id }}</td>
                                <td>{{ $dd->task }}</td>
                                <td>
                                    @if($dd->isCompleted)
                                    <button class='btn btn-success'>Completed</button>
                                    @else
                                    <button class='btn btn-warning'>Not Completed</button>
                                    @endif
                                </td>
                                <td>
                                    @if(!$dd->isCompleted)
                                    <a href="/markasupdated/{{ $dd->id }}" class='btn btn-primary'>Mark As Completed</a>
                                    <a href="/markasdelete/{{ $dd->id }}" class='btn btn-danger'>Delete</a>
                                    @else
                                    <a href="/markasnotupdated/{{ $dd->id }}" class='btn btn-danger'>Mark As Not Completed</a>
                                    <a href="/markasdelete/{{ $dd->id }}" class='btn btn-warning'>Delete</a>
                                    @endif
                                    <a href="/updatetask/{{ $dd->id }}" class='btn btn-secondary'>Update</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <a href="/" class="btn btn-primary">Back to Home</a>
</body>
</html>
