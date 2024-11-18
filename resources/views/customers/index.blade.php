@extends('layouts.app')

@section('content')
<div class="container-fluid py-5" style="background-color: #f0f8ff; min-height: 90vh;">
    <div class="container py-5">
        <h2 class="text-center mb-4" style="font-family: 'Poppins', sans-serif; font-weight: 700; color: #5a5a5a;">Customers Page</h2>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
      


        <table  class="table table-bordered shadow-sm rounded-3" style="line-height: 2.5;">
            <thead style="background-color: #a2e8b2; color: #333; font-weight: bold; line-height: 3;">
                <tr>
                    <th style="width: 30%; background-color:rgb(38, 27, 201) ;color:white">Name</th>
                    <th style="width: 40%; background-color:rgb(38, 27, 201);color:white">E-mail</th>
                    <th style="width: 30%; text-align: center;background-color:rgb(38, 27, 201);color:white">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr style="background-color: #f9f9f9;" class="table-row">
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td class="text-center">
                            <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-sm btn-outline-primary mx-1">Update</a>
                            <button onclick="confirmDelete('{{ route('customers.destroy', $customer->id) }}')" class="btn btn-sm btn-outline-danger mx-1">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="/forms" class="btn-custom">Do You Want To Create Your Own Form !!!?</a>

        <style>
            /* تكبير المسافة بين الأسطر */
            .table-row {
                line-height: 4;
            }
        
            /* تغيير لون الصف عند التمرير */
              .table-row:hover {
                background-color: #ffcccc; /* لون أحمر فاتح */
            }

            .btn-custom {
                background-color:rgb(38, 27, 201);
    color: white;
    padding: 12px 24px;
    font-size: 16px;
    text-align: center;
    text-decoration: none;
    border-radius: 8px;
    display: inline-block;
    transition: background-color 0.3s, box-shadow 0.3s;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    margin-left:65vh
}

.btn-custom:hover {
    background-color: #0966c9; /* لون عند التحويم */
    box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.15);
}
        </style>
        

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(url) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // إنشاء نموذج ديناميكي لطلب الحذف
                var form = document.createElement('form');
                form.action = url;
                form.method = 'POST';
                
                // تضمين CSRF و DELETE method
                form.innerHTML = `
                    @csrf
                    @method('DELETE')
                `;
              
                document.body.appendChild(form);
                form.submit();
            }
        });
    }
</script>
@endsection
