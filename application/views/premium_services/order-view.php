<section class="submition-form-section  py-sm-5 py-4">

    <div class="container">
        <!-- Page header -->
        <div class="d-flex flex-wrap justify-content-between align-items-center">
            <div>
                <a href="<?php echo site_url('orders'); ?>" class=""><i class="fa fa-arrow-left me-2"></i>Go back</a>
                <p class="section-subtitle mt-3">Premium Service Orders</p>
                <h3 class="section-title">
                    Order # – <?php echo $order->id; ?>
                </h3>
            </div>

            <!-- Status Update -->
            <form method="post" action="<?= base_url('premium_service_orders/update_status/'. $order->id) ?>">
                <!-- <input type="hidden" name="order_id" value="<?= $order->id ?>"> -->

                <?php
                // Style based on status
                switch ($order->status) {
                    case 'pending':
                        $selectStyle = 'background-color: #6c757d; color: #212529;';
                        break;
                    case 'paid':
                        $selectStyle = 'background-color: #0d6efd; color: #fff;';
                        break;
                    case 'in_progress':
                        $selectStyle = 'background-color: #fd7e14; color: #000;';
                        break;
                    case 'completed':
                        $selectStyle = 'background-color: #198754; color: #fff;';
                        break;
                    case 'cancelled':
                        $selectStyle = 'background-color: #dc3545; color: #fff;';
                        break;
                    default:
                        $selectStyle = 'background-color: #6c757d; color: #212529;';
                }

                $statusOptions = [
                    'pending' => 'Pending',
                    'paid' => 'Paid',
                    'in_progress' => 'In Progress',
                    'completed' => 'Completed',
                    'cancelled' => 'Cancelled'
                ];
                ?>

                <select name="status" class="badge select-badge border-0" onchange="this.form.submit()" style="<?= $selectStyle ?>">
                    <?php foreach ($statusOptions as $key => $label):
                        $selected = ($order->status == $key) ? 'selected' : '';

                        // Example rule: prevent reverting from completed/cancelled to pending
                        $disabled = '';
                        if (($order->status == 'completed' || $order->status == 'cancelled') && $key == 'pending') {
                            $disabled = 'disabled';
                        }
                        ?>
                        <option value="<?= $key ?>" <?= $selected ?>     <?= $disabled ?>>
                            <?= $label ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </form>
        </div>

        <!-- Customer Info -->
        <div class="order-view-card">
            <div class="row g-3">
                <div class="col-12 col-md-3">
                    <p class="m-0"><b>Name:</b>
                        <?= $order->customer_name ?>
                    </p>
                </div>

                <div class="col-12 col-md-3">
                    <p class="m-0"><b>Email:</b>
                        <?= $order->customer_email ?>
                    </p>
                </div>

                <div class="col-12 col-md-3">
                    <p class="m-0"><b>Phone:</b>
                        <?= $order->customer_phone ?>
                    </p>
                </div>

                <div class="col-12 col-md-3">
                    <p class="m-0"><b>Total:</b>
                        <?= $order->total_amount ?> AED
                    </p>
                </div>
            </div>
        </div>

        <!-- Services -->
        <p class="section-subtitle my-4">Services in the order</p>

        <?php foreach ($items as $item): ?>

            <div class="order-view-card mb-3">
                <div class="card-body">

                    <h6>
                        <?= $item->service_name ?>
                    </h6>

                    <p>Price:
                        <?= $item->price ?> AED
                    </p>
                    <p>Qty:
                        <?= $item->quantity ?>
                    </p>
                    <p>Subtotal:
                        <?= $item->subtotal ?> AED
                    </p>

                    <!-- Custom Fields -->
                    <?php if (!empty($meta[$item->service_id])): ?>

                        <hr>

                        <?php foreach ($meta[$item->service_id] as $m): ?>

                            <p>
                                <b>
                                    <?= ucfirst(str_replace('_', ' ', $m->field_name)) ?>:
                                </b>

                                <?php if (preg_match('/\.(jpg|jpeg|png|pdf|doc|docx)$/i', $m->field_value)): ?>

                                    <a href="<?= base_url('navassets/uploads/premium_service_docs/' . $m->field_value) ?>"
                                        target="_blank">
                                        Download
                                    </a>

                                <?php else: ?>

                                    <?= $m->field_value ?>

                                <?php endif; ?>

                            </p>

                        <?php endforeach; ?>

                    <?php endif; ?>

                </div>
            </div>

        <?php endforeach; ?>
    </div>
</section>