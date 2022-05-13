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
            <a class="navbar-brand" href="" style="font-family: 'Brush Script MT', cursive;font-size:35px;">Addresses Book</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent" >
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item " style="margin-left:20px !important">
                        <a class="nav-link " aria-current="page" href="<?= \App\App::get('config')['app']['uri']?>address/add">Add Address</a>
                    </li>
                    
                </ul>
                <form class="d-flex" action="<?= \App\App::get('config')['app']['uri']?>address/search/" method="get">
                    <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <br>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Mobile</th>
                <th scope="col">E-mail</th>
                <th scope="col">Job Title</th>
                <th scope="col">Company</th>
                <th scope="col">Telephone</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($addresses as $address) : ?>
                <tr>
                    <th scope="row"><?php echo $i++; ?></th>
                    <td><?= $address->first_name ?></td>
                    <td><?= $address->last_name ?></td>
                    <td><?= $address->mobile ?></td>
                    <th><?= $address->email ?></th>
                    <td><?= $address->title ?></td>
                    <td><?= $address->company ?></td>
                    <td><?= $address->telephone ?></td>
                    <td><a href="address/view?id=<?= $address->id ?>" class="btn btn-secondary">edit</a></td>
                    <td><a href="address/delete?id=<?= $address->id ?>" class="btn btn-danger">delete</a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>