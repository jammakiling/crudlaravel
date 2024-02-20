<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit Task</h1>
    <form action="/edit-task/{{$task->id}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{$task->title}}">
        <textarea name="body" > {{$task->body}}</textarea>
        <button>Save Changes</button>
    </form>

</body>
</html>