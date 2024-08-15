<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Details</title>
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

        <!-- Participants List -->
        <h4>Participants</h4>
        <ul class="list-group mb-3">
            <?php foreach ($participants as $participant): ?>
                <li class="list-group-item">
                    <?= $participant['name'] ?> - <?= $participant['email'] ?>
                    <a href="/participants/edit/<?= $participant['id'] ?>" class="btn btn-warning btn-sm float-end ms-2">Edit</a>
                    <a href="/participants/delete/<?= $participant['id'] ?>" class="btn btn-danger btn-sm float-end">Delete</a>
                </li>
            <?php endforeach; ?>
        </ul>

        <!-- Add Participant Form -->
        <div class="card">
            <div class="card-header">
                <h4>Add Participant</h4>
            </div>
            <div class="card-body">
                <form action="/events/registerParticipant/<?= $event['id'] ?>" method="post">
                    <?= csrf_field() ?>
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>

                    <div class="mb-3">
                        <label for="umur" class="form-label">Age</label>
                        <input type="number" class="form-control" id="umur" name="umur" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Address</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>

                    <div class="mb-3">
                        <label for="tempat_tanggal_lahir" class="form-label">Place and Date of Birth</label>
                        <input type="text" class="form-control" id="tempat_tanggal_lahir" name="tempat_tanggal_lahir" required>
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Gender</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Participant</button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Event Details: <?= $event['name'] ?></h4>
            </div>
            <div class="card-body">
                <p><strong>Date:</strong> <?= $event['date'] ?></p>
                <p><strong>Description:</strong> <?= $event['description'] ?></p>
                <p><strong>Location:</strong> <?= $event['location'] ?></p>
                <p><strong>Registration Start:</strong> <?= $event['registration_start'] ?></p>
                <p><strong>Registration End:</strong> <?= $event['registration_end'] ?></p>

                <h5>Participants</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Age</th>
                            <th>Address</th>
                            <th>Date of Birth</th>
                            <th>Gender</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($participants)): ?>
                            <?php foreach ($participants as $participant): ?>
                                <tr>
                                    <td><?= $participant['name'] ?></td>
                                    <td><?= $participant['email'] ?></td>
                                    <td><?= $participant['phone'] ?></td>
                                    <td><?= $participant['umur'] ?></td>
                                    <td><?= $participant['alamat'] ?></td>
                                    <td><?= $participant['tempat_tanggal_lahir'] ?></td>
                                    <td><?= $participant['jenis_kelamin'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center">No participants found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <a href="/events" class="btn btn-secondary mt-3">Back to Events</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
