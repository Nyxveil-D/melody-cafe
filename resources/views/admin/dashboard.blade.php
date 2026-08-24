<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <main>
        <h1>Melody Cafe Admin Dashboard</h1>
        <p>Welcome, {{ auth()->user()->name }}.</p>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit">Log out</button>
        </form>
    </main>
</body>
</html>
