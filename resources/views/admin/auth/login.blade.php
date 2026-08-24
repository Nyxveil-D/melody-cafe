<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <main>
        <h1>Melody Cafe Admin Login</h1>
        @if ($errors->any())
            <div role="alert">{{ $errors->first() }}</div>
        @endif
        <form method="POST" action="{{ route('admin.login.store') }}">
            @csrf
            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus>
            <label for="password">Password</label>
            <input id="password" name="password" type="password" required>
            <button type="submit">Log in</button>
        </form>
    </main>
</body>
</html>
