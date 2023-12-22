<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show posts</title>
</head>
<body>
    <h2>{{$post-> title}}</h2>
    <h3>{{$post-> description}}</h3>
    <h3>{{($post->published)?"published":"not published"}}</h3>
    <h3>{{$post-> auther}}</h3>
    <h3>{{$post-> created_at}}</h3>


</body>
</html>