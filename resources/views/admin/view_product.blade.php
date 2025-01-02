<!DOCTYPE html>
<html>

<head>

  @include('admin.head')
  <script src="https://cdn.tailwindcss.com"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  @include('admin.header')
  <div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content  justify-items-center">
      
    <div class="justify-center items-center min-h-screen p-5">
    
        
    <h2 class="text-xl font-semibold text-white mb-4">Product List</h2>
        <table class="min-w-full bg-gray-800 text-white border-collapse border border-gray-700">
            <thead>
                <tr>
                    <th class="border border-gray-700 px-4 py-2 text-left">ID</th>
                    <th class="border border-gray-700 px-4 py-2 text-left">Title</th>
                    <th class="border border-gray-700 px-4 py-2 text-left">Description</th>
                    <th class="border border-gray-700 px-4 py-2 text-left">Price</th>
                    <th class="border border-gray-700 px-4 py-2 text-left">Quantity</th>
                    <th class="border border-gray-700 px-4 py-2 text-left">Category</th>
                    <th class="border border-gray-700 px-4 py-2 text-left">Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td class="border border-gray-700 px-4 py-2">{{ $product->id }}</td>
                    <td class="border border-gray-700 px-4 py-2">{{ $product->title }}</td>
                    <td class="border border-gray-700 px-4 py-2">{{ $product->description }}</td>
                    <td class="border border-gray-700 px-4 py-2">${{ $product->price }}</td>
                    <td class="border border-gray-700 px-4 py-2">{{ $product->quantity }}</td>
                    <td class="border border-gray-700 px-4 py-2">{{ $product->category }}</td>
                    <td class="border border-gray-700 px-4 py-2">
                        @if($product->image)
                        <img src="products/{{$product->image}}" alt="Product Image" class="h-16 w-16 rounded-lg object-cover">
                        @else
                        <span>No Image</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>

        
      </div>

      @include('admin.footer')
    </div>
    <!-- JavaScript files-->
    <script>
      // Use event delegation to handle multiple buttons
      document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('delete-btn')) {
          const form = e.target.closest('.delete-form'); // Get the associated form
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              form.submit(); // Submit the form
            }
          });
        }
      });
    </script>
    <script src="{{asset('/admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('/admincss/js/front.js')}}"></script>
</body>

</html>