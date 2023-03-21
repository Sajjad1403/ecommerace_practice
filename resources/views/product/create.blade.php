<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Product</title>
</head>
<style>
    .form-center{
        width: 560px;
        margin: 0 auto;
    }
</style>
<body>
    <div class="container mt-3 mb-3  form-center">
        <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="form-label" for="name">Name:</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="form-group">
                <label class="form-label" for="quantity">Quantity:</label>
                <input type="number" name="quantity" class="form-control" id="quantity" min="0">
            </div>
            <div class="form-group">
                <label class="form-label" for="image">Image:</label>
                <input type="file" name="image" class="form-control" id="image">
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
</body>

</html>
