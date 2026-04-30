<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8 text-center">

            <div class="alert alert-danger text-center mb-4">
                <h4 class="fw-bold mb-2">Payment Required to Confirm Your Order</h4>

                <p class="mb-2">
                    Thank you for your order. Your order is received and reserved but is NOT confirmed yet.
                    Please complete payment via bank transfer to confirm and activate
                    your service.
                </p>

                <p class="mb-0">
                    After payment, send the receipt via WhatsApp:
                    <a href="https://wa.me/971554465332" target="_blank">
                        <strong>+971 55 446 5332</strong>
                    </a>
                </p>
            </div>

            <!-- Payment Instructions -->
            <div class="alert alert-info text-start mt-4">
                <p class="mb-2 text-center">
                    <strong>Bank Transfer Details</strong><br>
                </p>

                <hr>

                <p class="mb-1"><strong>Bank Name:</strong> ADCB - Abu Dhabi Commercial Bank PJSC</p>
                <p class="mb-1"><strong>Account Title:</strong> LIAQAT ALI</p>
                <p class="mb-1"><strong>Account Number:</strong> 407923810001</p>
                <p class="mb-1"><strong>IBAN:</strong> AE090030000407923810001</p>
                <p class="mb-1"><strong>Currency:</strong> AED</p>
                <p class="mb-0"><strong>Branch:</strong> IBD KHALIFA CITY A</p>
                <p class="mb-0"><strong>Swift Code:</strong> ADCBAEAA</p>
            </div>

            <!-- Heading -->
            <!-- <h4 class="fw-bold mb-3">Order Received Successfully!</h4> -->

            <!-- Subtext -->
            <!-- <p class="text-muted mb-4">
                Thank you for your order. Your order is received and reserved. Complete payment
            </p> -->

            <?php if ($order->discount_percent > 0): ?>
                <div class="alert alert-success mt-4">
                    You saved AED
                    <?= number_format($order->discount_amount, 2); ?> on this order.
                </div>
            <?php endif; ?>

            <?php if (!empty($order)): ?>
                <div class="card mb-4 text-start rounded">
                    <div class="card-body">

                        <h5 class="mb-3">Order Summary (Pending Confirmation)</h5>

                        <p><strong>Order ID:</strong> #
                            <?= $order->id; ?>
                        </p>
                        <p><strong>Name:</strong>
                            <?= $order->customer_name; ?>
                        </p>
                        <p><strong>Email:</strong>
                            <?= $order->customer_email; ?>
                        </p>
                        <p><strong>Phone:</strong>
                            <?= $order->customer_phone; ?>
                        </p>

                        <hr>

                        <h6>Items:</h6>

                        <ul class="list-group mb-3">
                            <?php foreach ($items as $item): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?= $item->service_name; ?> (x
                                    <?= $item->quantity; ?>)
                                    <span>AED
                                        <?= number_format($item->subtotal, 2); ?>
                                    </span>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <!-- <h5 class="text-end">
                            Total: AED
                            <?= number_format($order->total_amount, 2); ?>
                        </h5> -->

                        <div class="mt-4">

                            <div class="d-flex justify-content-between mb-2">
                                <span><strong>Subtotal</strong></span>
                                <span>
                                    AED
                                    <?= number_format($order->total_amount, 2); ?>
                                </span>
                            </div>

                            <?php if ($order->discount_percent > 0): ?>
                                <div class="d-flex justify-content-between mb-2 text-success">
                                    <span>
                                        <strong>Discount (
                                            <?= number_format($order->discount_percent, 0); ?>%)
                                        </strong>
                                    </span>
                                    <span>
                                        - AED
                                        <?= number_format($order->discount_amount, 2); ?>
                                    </span>
                                </div>
                            <?php endif; ?>

                            <hr>

                            <div class="d-flex justify-content-between">
                                <span><strong>Total Payable</strong></span>
                                <span class="fw-bold">
                                    AED
                                    <?= number_format(
                                        $order->discount_percent > 0
                                        ? $order->final_amount
                                        : $order->total_amount,
                                        2
                                    ); ?>
                                </span>
                            </div>

                        </div>

                    </div>
                </div>
            <?php endif; ?>



            <!-- Back to Services Button -->
            <a href="/premium-services" class="btn btn-primary btn-lg px-4 mt-4">
                Back to Services
            </a>

        </div>
    </div>
</div>