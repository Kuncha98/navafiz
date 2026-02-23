<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Management System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('navassets/css/core/variables.css') ?>">
    <link rel="stylesheet" href="<?= base_url('navassets/css/core/base.css') ?>">
    <link rel="stylesheet" href="<?= base_url('navassets/css/core/components.css') ?>">
    <link rel="stylesheet" href="<?= base_url('navassets/css/core/utilities.css') ?>">
</head>

<body>

    <!-- Navbar -->
    <?php $this->load->view('layouts/website/navbar'); ?>

    <div class="content-wrapper d-flex flex-column">
        <!-- Main content -->
        <main>
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('success'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('error'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <!-- Content will render here -->
            <?php if (isset($content))
                $this->load->view($content); ?>
        </main>
        <!-- Footer -->
        <?php $this->load->view('layouts/website/footer'); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('navassets/js/admin-job-request-table-modal.js') ?>"></script>

</body>

</html>