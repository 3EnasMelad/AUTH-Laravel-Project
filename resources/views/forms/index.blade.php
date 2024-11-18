


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forms</title>
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
            }
    
            div {
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                margin-bottom: 20px;
                width:150vh ;
                margin-left: 25vh
            
                 }
    
            h3 {
                color: #555;
                margin-bottom: 10px;
            }
    
            a {
                color: #4CAF50;
                text-decoration: none;
                font-size: 16px;
            }
    
            a:hover {
                text-decoration: underline;
            }
    
            button {
                background-color: #f44336;
                color: white;
                padding: 10px 15px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
            }
    
            button:hover {
                background-color: #e53935;
            }
        </style>
    </head>
    <body>
    
        <h1 style="margin-left: 10vh">All Forms</h1>
        <div id="divone" style="display: flex; justify-content: center; align-items: center; height: 5vh ;background-color: #f4f4f9;; ">
            <a href="/forms/create" class="btn" style="background: #4CAF50; color: white; padding: 10px 20px; text-align: center; display: inline-block; text-decoration: none;">
                New Form
            </a>
        </div>
        
    
        @foreach($forms as $form)
            <div>
                <h3>{{ $form->name }}</h3>
                <a href="{{ route('forms.fill', $form->id) }}">Fill out the form</a>
                <form action="{{ route('forms.destroy', $form->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this form?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </div>

        @endforeach
   
    </body>
    </html>
    