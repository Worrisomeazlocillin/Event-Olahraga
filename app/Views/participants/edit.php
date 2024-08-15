<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Participant</title>
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

        <!-- Edit Participant Form -->
        <div class="card">
            <div class="card-header">
                <h4>Edit Participant</h4>
            </div>
            <div class="card-body">
                <form action="/participants/update/<?= $participant['id'] ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= esc($participant['name']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= esc($participant['email']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?= esc($participant['phone']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="umur" class="form-label">Age</label>
                        <input type="number" class="form-control" id="umur" name="umur" value="<?= esc($participant['umur']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Address</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= esc($participant['alamat']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="tempat_tanggal_lahir" class="form-label">Place and Date of Birth</label>
                        <input type="text" class="form-control" id="tempat_tanggal_lahir" name="tempat_tanggal_lahir" value="<?= esc($participant['tempat_tanggal_lahir']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Gender</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="Male" <?= $participant['jenis_kelamin'] === 'Male' ? 'selected' : '' ?>>Male</option>
                            <option value="Female" <?= $participant['jenis_kelamin'] === 'Female' ? 'selected' : '' ?>>Female</option>
                        </select>
                    </div>

                    <input type="hidden" name="event_id" value="<?= esc($participant['event_id']) ?>">

                    <button type="submit" class="btn btn-primary">Update Participant</button>
                    <a href="/events/show/<?= $participant['event_id'] ?>" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
