<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participants List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Flash Messages -->
        <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('message') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <h2>Participants List</h2>
        <a href="/participants/create" class="btn btn-primary mb-3">Add Participant</a>

        <div class="card">
            <div class="card-header">
                <h4>Participants</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Age</th>
                            <th>Address</th>
                            <th>Place of Birth</th>
                            <th>Gender</th>
                            <th>Event ID</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($participants as $participant): ?>
                            <tr>
                                <td><?= $participant['id'] ?></td>
                                <td><?= $participant['name'] ?></td>
                                <td><?= $participant['email'] ?></td>
                                <td><?= $participant['phone'] ?></td>
                                <td><?= $participant['umur'] ?></td>
                                <td><?= $participant['alamat'] ?></td>
                                <td><?= $participant['tempat_tanggal_lahir'] ?></td>
                                <td><?= $participant['jenis_kelamin'] ?></td>
                                <td><?= $participant['event_id'] ?></td>
                                <td>
                                    <a href="/participants/edit/<?= $participant['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="/participants/delete/<?= $participant['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
