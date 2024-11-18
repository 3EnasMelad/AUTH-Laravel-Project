
@extends('layouts.app')

@section('content') 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Form</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            font-size: 16px;
            margin-bottom: 8px;
            display: block;
            color: #555;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="checkbox"] {
            margin-left: 10px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        button[type="button"] {
            background-color: #007BFF;
        }

        button:hover {
            background-color: #45a049;
        }

        button[type="button"]:hover {
            background-color: #0056b3;
        }

        .field {
            margin-bottom: 15px;
        }

        .field input[type="text"],
        .field select {
            width: calc(50% - 10px);
            display: inline-block;
            margin-right: 10px;
        }

        .field input[type="text"]:last-child,
        .field select:last-child {
            margin-right: 0;
        }

        .field label {
            margin-top: 5px;
            display: inline-block;
        }

        #fields-container {
            margin-bottom: 20px;
        }
    </style>
</head>


<body>
    <h1>Create New Form</h1>

    <form action="{{ route('forms.store') }}" method="POST">
        @csrf
        <label for="name">Form Name:</label>
        <input type="text" name="name" id="name" required>
        <br><br>

        <label for="fields">Fields :</label>
        <div id="fields-container">
           
            <div class="field">
                <input type="text" name="fields[0][name]" placeholder=" Field Name">
                <select name="fields[0][type]">
                    <option value="text">Text</option>
                    <option value="number">Number</option>
                    <option value="date">Date</option>
                </select>
                <label>
                    <input type="checkbox" name="fields[0][required]"> Reqired
                </label>
            </div>
        </div>
        <button type="button" id="add-field">Add Field</button>
        <br><br>

        <button type="submit">Save</button>
        {{-- @if(session('error'))
    <div style="color: red" class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif --}}
    </form>

    <script> 
        {{-- // Add a new field dynamically --}}
          document.getElementById('add-field').addEventListener('click', function() {
            const fieldContainer = document.createElement('div');
            fieldContainer.classList.add('field');
            fieldContainer.innerHTML = `
                <input type="text" name="fields[][name]" placeholder="Field Name" required>
                <select name="fields[][type]" required>
                    <option value="text">Text</option>
                    <option value="number">Number</option>
                    <option value="date">Date</option>
                </select>
                <label>
                    <input type="checkbox" name="fields[][required]"> Required
                </label>
            `;
            document.getElementById('fields-container').appendChild(fieldContainer);
        });
    </script>
</body>

</html> 
@endsection
