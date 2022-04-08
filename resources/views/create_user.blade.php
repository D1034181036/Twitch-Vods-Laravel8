<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>
<body>
    <form action="/create_user" method="POST">
        @csrf
        <label>username:</label>
        <input type="text" name="username">
        <label>code:</label>
        <input type="password" name="code">
        <input type="submit" value="Enter">
    </form>

    {{ $banner }}
</body>
</html>