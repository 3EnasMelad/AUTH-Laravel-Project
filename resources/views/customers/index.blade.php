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
      


        <table id="hh" class="table table-bordered shadow-sm rounded-3" style="line-height: 2.5;">
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
        
        <style>
            /* تكبير المسافة بين الأسطر */
            .table-row {
                line-height: 4;
            }
        
            /* تغيير لون الصف عند التمرير */
             #hh .table-row:hover {
                background-color: #ffcccc; /* لون أحمر فاتح */
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
