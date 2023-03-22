<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Category</title>
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
                <th>Sub Category Name:</th>
                <th>Parent Category</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->parent ? $category->parent->name : '' }}</td>
                        <td>{{ dateFormat($category->created_at)}}</td>
                        <td>
                            <form action="{{ route('products.destroy', $category->id) }}" method="POST">
                                <a href="{{ route('products.edit', $category->id) }}" class="btn btn-primary"><i
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
