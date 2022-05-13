<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- <img src="logo.png" class="navbar-brand"  alt="logo"> -->
            <a href="<?= \App\App::get('config')['app']['uri']?>" class="navbar-brand" style="font-family: 'Brush Script MT', cursive;font-size:35px;">Addresses Book</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item" style="margin-left:20px !important">
                        <a class="nav-link " aria-current="page" href="<?= \App\App::get('config')['app']['uri']?>address/add/">Add Address</a>
                    </li>
                    
                </ul>
                <form class="d-flex" action="<?= \App\App::get('config')['app']['uri']?>address/search" method="get">
                    <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    
    <br><br>
    <div class="container">
    <div class="card " style="max-width: 600px;margin-left:auto;margin-right:auto">
        <div class="card-header">
            Edit Address
        </div>
        <div class="card-body">
            <div class="container">
            <form action="../address/update" method="POST">
                <div class="mb-3">
                    <label for="Input1" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="first_name" id="Input1" value="<?= $address[0]->first_name ?>" >
                </div>
                <div class="mb-3">
                    <label for="Input2" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="Input2" value="<?= $address[0]->last_name?>">
                </div>
                <div class="mb-3">
                    <label for="Input3" class="form-label">Mobile</label>
                    <input type="text" class="form-control" name="mobile" id="Input3" value="<?=$address[0]->mobile?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$address[0]->email?>">
                </div>
                <div class="mb-3">
                    <label for="Input5" class="form-label">Job Title</label>
                    <input type="text" class="form-control" name="title" id="Input5" value="<?=$address[0]->title?>">
                </div>
                <div class="mb-3">
                    <label for="Input6" class="form-label">Company</label>
                    <input type="text" class="form-control" name="company" id="Input6" value="<?=$address[0]->company?>">
                </div>
                <div class="mb-3">
                    <label for="Input7" class="form-label">Telephone</label>
                    <input type="text" class="form-control" name="telephone" id="Input7" value="<?=$address[0]->telephone?>">
                </div>
                <input type="hidden" name="id" value="<?=$id?>">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>