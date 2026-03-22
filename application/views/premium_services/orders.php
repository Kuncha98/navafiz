<section class="submition-form-section  py-sm-5 py-4">

    <div class="container">
        <!-- Page header -->
        <div class="mb-4">
            <a href="<?php echo site_url('n/' . $this->session->userdata('username')); ?>" class=""><i
                    class="fa fa-arrow-left me-2"></i>Back to dashboard</a>
            <h3 class="page-title mt-3 mb-1">Premium Service Order Management</h3>
            <p class="text-muted mb-0">Review and manage all services ordered through the platform.</p>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 candidate-table">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (!empty($orders)) { ?>
                        <?php foreach ($orders as $o): ?>

                            <tr>
                                <td>
                                    <?= $o->id ?>
                                </td>
                                <td>
                                    <?= $o->customer_name ?>
                                </td>
                                <td>
                                    <?= $o->customer_email ?>
                                </td>
                                <td>
                                    <?= $o->total_amount ?> AED
                                </td>

                                <td>
                                    <?php
                                    switch ($o->status) {
                                        case 'pending':
                                            $badgeStyle = 'background-color: #6c757d; color: #fff;';
                                            break;
                                        case 'paid':
                                            $badgeStyle = 'background-color: #0d6efd; color: #fff;';
                                            break;
                                        case 'in_progress':
                                            $badgeStyle = 'background-color: #fd7e14; color: #fff;';
                                            break;
                                        case 'completed':
                                            $badgeStyle = 'background-color: #198754; color: #fff;';
                                            break;
                                        case 'cancelled':
                                            $badgeStyle = 'background-color: #dc3545; color: #fff;';
                                            break;
                                        default:
                                            $badgeStyle = 'background-color: #6c757d; color: #fff;';
                                    }

                                    $statusOptions = [
                                        'pending' => 'Pending',
                                        'paid' => 'Paid',
                                        'in_progress' => 'In Progress',
                                        'completed' => 'Completed',
                                        'cancelled' => 'Cancelled'
                                    ];
                                    ?>

                                    <span class="badge" style="<?= $badgeStyle ?>">
                                        <?= $statusOptions[$o->status] ?? ucfirst($o->status) ?>
                                    </span>
                                </td>

                                <td>
                                    <?= date('Y-m-d', strtotime($o->created_at)) ?>
                                </td>

                                <td>
                                    <a href="<?= base_url('orders/view/' . $o->id) ?>" class="btn btn-sm btn-primary">
                                        View
                                    </a>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="10" class="text-center">No services found.</td>
                        </tr>
                    <?php } ?>

                </tbody>

            </table>
        </div>
    </div>
</section>