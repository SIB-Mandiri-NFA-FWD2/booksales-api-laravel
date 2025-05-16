<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booksales - Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        h1, h2 {
            text-align: center;
            color: #333;
        }
        .table-wrapper {
            overflow-x: auto;
            margin-top: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            background-color: white;
        }

        .styled-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
            border-radius: 8px;
            overflow: hidden;
        }

        .styled-table thead {
            background-color: #3498db;
            color: white;
            text-align: left;
            font-weight: bold;
        }

        .styled-table th, .styled-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
        }

        .styled-table tbody tr:hover {
            background-color: #f2f9ff;
        }

        .styled-table img {
            width: 50px;
            border-radius: 4px;
        }

        .action-button {
            background-color: transparent;
            border: none;
            cursor: pointer;
            font-size: 16px;
            color:rgb(131, 131, 131);
            transition: transform 0.2s ease;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('books') }}">Books</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('genres') }}">Genres</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('authors') }}">Authors</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

        <h1>Books Table</h1>

        <div class="table-wrapper">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Cover</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Genres</th>
                        <th>Authors</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                    <tr>
                        <td><img src="{{ $book['cover_photo'] }}" alt="Cover"></td>
                        <td>{{ $book['title'] }}</td>
                        <td>{{ $book['description'] }}</td>
                        <td>{{ $book['price'] }}</td>
                        <td>{{ $book['stock'] }}</td>
                        <td>{{ $book['genres_name'] }}</td>
                        <td>{{ $book['authors_name'] }}</td>
                        <td style="text-align: center;">
                            <button class="action-button"><i class="fa-solid fa-heart"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
