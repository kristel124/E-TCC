{{-- resources/views/user_page.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <!-- Include any CSS/JS here, e.g., Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-[#f8f5f0] text-[#2e2b26] font-sans">
    {{-- Include the header from the other Blade file --}}
    @include('user.header')

    <main class="container mt-4">
        <h1>Welcome to the User Page</h1>
        <p>This is the content for the user page. You can display user-specific data here.</p>
        
        {{-- Example: Display authenticated user's name --}}
        @auth
            <p>Hello, {{ Auth::user()->name }}!</p>
            {{-- Add more user-specific content, like profile info --}}
        @else
            <p>Please log in to view this page.</p>
        @endauth
    </main>

    <!-- Include any footer or scripts here -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>