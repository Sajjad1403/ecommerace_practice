<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>sub Category</title>
</head>
<style>
    .form-center {
        width: 560px;
        margin: 0 auto;
    }
</style>

<body>
    <div class="container mt-3 mb-3  form-center">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label" for="name">Name:</label>
                <input type="text" name="name" class="form-control" id="name" old('name') placeholder="sub category name">
            </div>
            <div class="form-group">
                <label class="form-label" for="category">Parent Category:</label>
                <select class="form-select" name="parent_id" aria-label="Default select example">
                    <option disabled selected value>Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{$category->id === old('parent_id') ? 'selected' : ''}} >{{$category->name}}</option> 
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
</body>

</html>
