<!DOCTYPE html>
<html>

<head>

  @include('admin.head')
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 357px;
      margin-top: 50px;

    }

    td,
    th {
      border: 1px solid #dddddd;
      text-align: center;
      padding: 20px;
    }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  @include('admin.header')
  <div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content  justify-items-center">
      <div class="page-header px-[450px]">
        <div class="container-fluid">
          <form action="{{url('add_category')}}" method="POST">
            @csrf
            <div class="flex gap-x-4">
              <div class="">
                <input class="rounded px-[12px] py-[7.2px]" type="text" name="category">
              </div>
              <div>
                <input class="btn btn-primary" type="submit" value="Add Category">
              </div>
            </div>
          </form>
        </div>
        <div class="justify-items-center ">
          <table>
            <thead>
              <tr>
                <th>Category</th>
                <th>Edit</th>
                <th>Delete</th>

              </tr>
            </thead>
            <tbody>
              @foreach($data as $item)
              <tr>
                <td>{{ $item->category_name }}</td>
              
                <td>
                  <a href="{{ url('edit_category', $item->id) }}" class="btn btn-primary" name="category">Edit</a>
                </td>

                
                <td>
                  <form action="{{ url('delete_category', $item->id) }}" method="POST" class="delete-form">
                    @csrf
                    <button type="button" class="btn btn-danger delete-btn">Delete</button>
                  </form>
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