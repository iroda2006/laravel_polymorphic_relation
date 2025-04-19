<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Dashboard</h2>

        <div class="row">
            <!-- Post-lar CRUD tugmasi -->
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Post-lar CRUD</h5>
                        <p class="card-text">Post-larni boshqarish (qo'shish, tahrirlash, o'chirish).</p>
                        <a href="{{route('posts.index')}}" class="btn btn-primary">Post-lar</a>
                    </div>
                </div>
            </div>

            <!-- Video-larni CRUD tugmasi -->
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Video-larni CRUD</h5>
                        <p class="card-text">Video-larni boshqarish (qo'shish, tahrirlash, o'chirish).</p>
                        <a href="{{route('videos.index')}}" class="btn btn-primary">Video-larni</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

