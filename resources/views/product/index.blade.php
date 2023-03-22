<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Product</title>
</head>
<style>
    .form-center {
        width: 560px;
        margin: 0 auto;
    }
</style>

<body>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name:</th>
                <th>Quantity:</th>
                <th>Image:</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>

                    <td>{{ $product->name }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                        <img src="{{ asset('storage/product_image/' . $product->image) }}" alt="" title=""
                            style="height:130px; width:110px" />
                    </td>
                    <td>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"
                                    aria-hidden="true"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
