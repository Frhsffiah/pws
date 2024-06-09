<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset= "UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compitable" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>

        table.static {
            position: relative;
            border: 1px solid #543535;
        }

    </style>
    <title>Print List Publication</title>
</head>
<body>
    <div class="form-group">
        <p align ="center"><b> List Publications</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
        <tr>
                <th>Title</th>
                <th>Type</th>
                <th>Year</th>
                <th>Author</th>
            </tr>
            @foreach ($publications as $publication)
            <tr>
                <td>{{ $publication->Pub_Title }}</td>
                <td>{{ $publication->Pub_type }}</td>
                <td>{{ $publication->Pub_date }}</td>
                <td>{{ $publication->Pub_author }}</td>
            </tr>
            @endforeach
        </table>
    </div>

    <script type="text/javascript">
        window.print();

    </script>
</body>
</html>