<!DOCTYPE html>
<html>

<head>
  @include('admin.head')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.23/dist/full.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
  @include('admin.header')
  <div class="d-flex align-items-stretch">
    @include('admin.sidebar')

    <div class="page-content flex justify-center items-center min-h-screen">
      <div class="bg-gray-900 text-white p-8 rounded-lg shadow-lg w-[600px]">
        <!-- box -->
        <h2 class="text-xl font-semibold text-center mb-6">Add Product</h2>

<form action="{{ url('upload_product') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
  @csrf

  <div class="grid grid-cols-2 gap-4">
    <label class="input input-bordered flex items-center gap-2">
      Title
      <input type="text" name="title" class="grow" placeholder="Enter product title" />
    </label>

    <label class="input input-bordered flex items-center gap-2">
      Price
      <input type="text" name="price" class="grow" placeholder="Enter product price" />
    </label>
  </div>

  <label class="input input-bordered flex items-center gap-2">
    Description
    <input name="description" rows="2" class="grow" placeholder=""></input>
  </label>

  <div class="grid grid-cols-2 gap-4">
    <label class="input input-bordered flex items-center gap-2">
      Quantity
      <input type="text" name="quantity" class="grow" placeholder="Enter quantity" />
    </label>

    <label class="input input-bordered flex items-center gap-2">
      Category
      <select name="category" class="grow">
        <option value="">Select a category</option>
        @foreach($category as $category)
          <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
        @endforeach
      </select>
    </label>
  </div>

  <label class="input input-bordered flex items-center gap-2">
    Image
    <input type="file" name="image" class="grow" />
  </label>

  <div class="flex justify-center">
    <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
      Add Product
    </button>
  </div>
</form>

      </div>
    </div>
  </div>

  @include('admin.footer')
</body>

</html>
