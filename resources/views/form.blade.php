<!DOCTYPE html>
<html lang="en">
<head>
    <title>Say Hello</title>
</head>
<body>
    <form action="/post">
        <label for="name">
            <input type="text" name="name">
        </label>
        <input type="text" hidden name="_token" value="{{ csrf_token() }}">
        <input type="submit" value="Say Hello">
    </form>
</body>
</html>
