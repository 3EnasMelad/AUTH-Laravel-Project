{{-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        h1, h2 {
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
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
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

        button:hover {
            background-color: #45a049;
        }

        div {
            margin-bottom: 20px;
        }
    </style>
</head>


      
<body>
    <h1>Form Submission</h1>

    <form id="dynamicForm" action="{{ route('forms.submit', $form->id) }}" method="POST">
        @csrf
        <h2>{{ $form->name }}</h2> 
        @foreach($form->fields as $field)
            <div>
                <label>{{ $field->field_name }}:</label>
                @if($field->field_type == 'text')
                    <input type="text" name="{{ $field->field_name }}" class="form-input" {{ $field->is_required ? 'required' : '' }}>
                @elseif($field->field_type == 'number')
                    <input type="number" name="{{ $field->field_name }}" class="form-input" {{ $field->is_required ? 'required' : '' }}>
                @elseif($field->field_type == 'date')
                    <input type="date" name="{{ $field->field_name }}" class="form-input" {{ $field->is_required ? 'required' : '' }}>
                @endif
            </div>
        @endforeach

        <button type="submit" id="submitBtn" disabled>Submit</button>
    </form>

    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'DONE!',
                    text: '{{ session('success') }}',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('forms.index') }}";
                    }
                });
            });
        </script>
    @endif

    <style>
        
        #submitBtn:disabled {
            background-color: #2e7d32; 
            color: #ffffff;
            cursor: not-allowed;
        }

     
        #submitBtn {
            background-color: #4CAF50; 
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>



    <script>

        document.addEventListener('DOMContentLoaded', function() {
            const submitBtn = document.getElementById('submitBtn');
            const formInputs = document.querySelectorAll('.form-input');
            
            formInputs.forEach(input => {
                input.addEventListener('input', function() {
                    
                    const allFilled = Array.from(formInputs).every(input => input.value.trim() !== '');
                    submitBtn.disabled = !allFilled;
                });
            });
        });
    </script>
</body>

</html> --}}



@extends('layouts.app')

@section('content') 
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Submission</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                background-color: #f4f4f9;
                margin: 0;
                padding: 20px;
            }

            h1, h2 {
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
            input[type="number"],
            input[type="date"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ddd;
                border-radius: 4px;
                font-size: 16px;
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

            button:hover {
                background-color: #45a049;
            }

            div {
                margin-bottom: 20px;
            }
        </style>
    </head>

    <body>
        <h1>Form Submission</h1>

        <form id="dynamicForm" action="{{ route('forms.submit', $form->id) }}" method="POST">
            @csrf
            <h2>{{ $form->name }}</h2> 
            @foreach($form->fields as $field)
                <div>
                    <label>{{ $field->field_name }}:</label>
                    @if($field->field_type == 'text')
                        <input type="text" name="{{ $field->field_name }}" class="form-input" {{ $field->is_required ? 'required' : '' }}>
                    @elseif($field->field_type == 'number')
                        <input type="number" name="{{ $field->field_name }}" class="form-input" {{ $field->is_required ? 'required' : '' }}>
                    @elseif($field->field_type == 'date')
                        <input type="date" name="{{ $field->field_name }}" class="form-input" {{ $field->is_required ? 'required' : '' }}>
                    @endif
                </div>
            @endforeach

            <button type="submit" id="submitBtn" disabled>Submit</button>
        </form>

        @if(session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'DONE!',
                        text: '{{ session('success') }}',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('forms.index') }}";
                        }
                    });
                });
            </script>
        @endif

        <style>
            #submitBtn:disabled {
                background-color: #2e7d32; 
                color: #ffffff;
                cursor: not-allowed;
            }

            #submitBtn {
                background-color: #4CAF50; 
                color: #ffffff;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const submitBtn = document.getElementById('submitBtn');
                const formInputs = document.querySelectorAll('.form-input');
                
                formInputs.forEach(input => {
                    input.addEventListener('input', function() {
                        const allFilled = Array.from(formInputs).every(input => input.value.trim() !== '');
                        submitBtn.disabled = !allFilled;
                    });
                });
            });
        </script>
    </body>
    </html>
@endsection
