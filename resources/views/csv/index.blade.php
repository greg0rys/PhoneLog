<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload CSV Files</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <style>
        body {
            padding: 2rem;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <main class="container">
        <h1>Upload CSV Records Manually</h1>

        @if($errors->any())
            <article style="background-color: #fee; border-color: #c33;">
                <h4>Errors</h4>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </article>
        @endif

        @if(session('success'))
            <article style="background-color: #efe; border-color: #3c3;">
                <strong>Success!</strong> {{ session('success') }}
            </article>
        @endif

        <form action="{{ route('csv.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="csv_file_1">
                    First CSV File
                    <input type="file" id="csv_file_1" name="csv_file_1" accept=".csv" required>
                </label>
            </div>

            <div>
                <label for="csv_file_2">
                    Second CSV File
                    <input type="file" id="csv_file_2" name="csv_file_2" accept=".csv" required>
                </label>
            </div>

            <button type="submit">Upload Files</button>
        </form>
    </main>
</body>

</html>