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

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 10px;
}


</style>
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
          <div class="justify-items-center">
          <table>
  <thead>
    <tr>
      <th>Category</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $item)
    <tr>
      <td>{{ $item->category_name }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
          </div>
        </div>
  
     @include('admin.footer')
    </div>
    <!-- JavaScript files-->
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