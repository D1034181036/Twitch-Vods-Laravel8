<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Legion TD 2 Videos</title>
    <meta name="description" content="">
    <link rel="icon" sizes="192x192" href="{{ asset('img/icon.svg') }}">
    
    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container py-4">
        <!-- Navbar -->
        <div class="pb-2 border-bottom">
            <a href="" class="text-dark text-decoration-none">
                <span class="fs-4">Legion TD 2 Videos</span>
            </a>
        </div>

        <!-- Header -->
        <div class="py-5 px-2 my-5 rounded-3 text-white text-center header">
            <h2 class="fw-bold mb-4">Legion TD 2 Videos</h2>
            <h5 class="mb-2">High ELO Streamer Videos</h5>
        </div>
        
        <!-- Videos -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
            <?php foreach($videos as $video): ?>
            <?php
                $video['thumbnail_url'] = str_replace('%{width}', '960', $video['thumbnail_url']);
                $video['thumbnail_url'] = str_replace('%{height}', '540', $video['thumbnail_url']);
                $video['thumbnail_url'] = $video['thumbnail_url'] !== '' ? $video['thumbnail_url'] : 'assets/img/thumbnail.png';
            ?>
            <div class="col mb-4">
                <div class="card">
                    <div class="s">
                        <div class="thumbnail">
                            <a href="<?= $video['url'] ?>">
                                <img class="card-img-top" src="<?= $video['thumbnail_url'] ?>">
                                <div class='view_count'>
                                    <span>Views: <?= number_format($video['view_count']) ?></span>
                                </div>
                                <div class='duration'>
                                    <span><?= $video['duration'] ?></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                <img class="profile-image" src="<?= $video['user']['profile_image_url'] ?>">
                            </div>
                            <div class="col-10">
                                <h5 class="card-title"><?= $video['title'] ?></h5>
                                <p class="card-text m-0"><?= $video['user']['display_name'] ?></p>
                                <p class="card-text m-0"><?= date("Y-m-d", strtotime($video['published_at'])) ?></p>
                            </div>          
                        </div>          
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>

        <!-- Bottom Paginate -->
        <div class="d-flex justify-content-center">
            {{ $videos->links("pagination::bootstrap-4") }}
        </div>
    </div>
    
    <!-- Copy Right -->
    <div class="bg-dark text-white text-center py-1">
        <span>ImSoHappySC © 2022</span>
    </div>

    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <!-- jQuery js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>
</html>