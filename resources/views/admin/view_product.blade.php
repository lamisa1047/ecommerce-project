<!DOCTYPE html>
<html>

<head>

  @include('admin.head')
  <script src="https://cdn.tailwindcss.com"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/daisyui/4.12.23/full.css">
</head>

<body>
  @include('admin.header')
  <div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content  justify-items-center">

      <div class="justify-center items-center min-h-screen p-5">
        <div class="p-4">
        <form action="{{url('search_p')}}" method="POST">
          @csrf
        <label class="input input-bordered flex items-center gap-2">
          <input type="text" class="grow" placeholder="Search" name="search" />
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 16 16"
            fill="currentColor"
            class="h-4 w-4 opacity-70">
            <path
              fill-rule="evenodd"
              d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
              clip-rule="evenodd" />
          </svg>
        </label>
        </form>
        </div>


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
              <th class="border border-gray-700 px-4 py-2 text-left">Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $product)
            <tr>
              <td class="border border-gray-700 px-4 py-2">{{ $product->id }}</td>
              <td class="border border-gray-700 px-4 py-2">{{ $product->title }}</td>
              <td class="border border-gray-700 px-4 py-2">{!!Str::limit($product->description,50)!!}</td>
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
              <td class="border border-gray-700 px-4 py-2 text-center">
                <form action="{{url('delete_product', $product->id )}}" method="POST" class="delete-form">
                  @csrf
                  <button type="button"
                    class="delete-btn px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                    Delete
                  </button>
                </form>
              </td>

            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="place-items-center p-4">
          {{$products->onEachSide(1)->links()}}
        </div>
      </div>


    </div>

    @include('admin.footer')
  </div>
  <!-- JavaScript files-->
  <script>
    document.addEventListener('click', function(e) {
      if (e.target && e.target.classList.contains('delete-btn')) {
        const form = e.target.closest('.delete-form');
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
            form.submit();
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