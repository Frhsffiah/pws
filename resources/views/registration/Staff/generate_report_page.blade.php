@extends('components.staffLayout')

@section('staff')
<!DOCTYPE html>
<html>
<head>
    <title>Generate Report</title>
    <style>
        .container {
            margin: 0 auto;
            padding: 20px;
            max-width: 800px;
        }

        h1 {
            font-size: 28px;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], 
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .report-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .report-table th, .report-table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .report-table th {
            background-color: #f2f2f2;
        }

        .report-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .report-table tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Generate Report</h1>
        <form id="reportForm" action="{{ route('reports.generate') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="institute">Institute</label>
                <select id="institute" name="institute" required>
                    <option value="">Select Institute</option>
                    @foreach($institutes as $institute)
                        <option value="{{ $institute }}">{{ $institute }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn">SEARCH</button>
        </form>

        @if(isset($report))
        <table class="report-table">
            <thead>
                <tr>
                    <th>Institute</th>
                    <th>Count</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $report['institute'] }}</td>
                    <td>{{ $report['count'] }}</td>
                </tr>
            </tbody>
        </table>
        @endif
    </div>
</body>
</html>
@endsection
