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
      
    <div class="flex justify-center items-center min-h-screen">
    <form action="{{url('upload_product')}}" method="POST" enctype="multipart/form-data" class="w-[600px] bg-gray-900 p-8 rounded-lg shadow-lg">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-white">Title</label>
            <input type="text" id="title" name="title" class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm text-white bg-gray-800 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-white">Description</label>
            <textarea id="description" name="description" rows="2" class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm text-white bg-gray-800 focus:ring-blue-500 focus:border-blue-500"></textarea>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-white">Price</label>
            <input type="text" id="price" name="price" class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm text-white bg-gray-800 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label for="quantity" class="block text-sm font-medium text-white">Quantity</label>
            <input type="text" id="quantity" name="quantity" class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm text-white bg-gray-800 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label for="category" class="block text-sm font-medium text-white">Category</label>
            <select id="category" name="category" class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm text-white bg-gray-800 focus:ring-blue-500 focus:border-blue-500">
                <option value="">Select a category</option>
                @foreach($category as $category)

                <option value="{{($category->category_name)}}">{{($category->category_name)}}</option>

                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-white">Image</label>
            <input type="file" id="image" name="image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-1 file:px-2 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-4 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Add Product</button>
        </div>
    </form>
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