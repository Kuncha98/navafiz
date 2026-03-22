<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 text-center">

            <!-- Success Icon -->
            <div class="mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="currentColor"
                    class="text-success bi bi-check-circle" viewBox="0 0 16 16">
                    <path
                        d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm3.97-8.03a.75.75 0 0 1-1.08.022L7.477 6.417 6.324 7.57a.75.75 0 0 1-1.06-1.06l1.5-1.5a.75.75 0 0 1 1.08.022l3 3z" />
                </svg>
            </div>

            <!-- Heading -->
            <h2 class="fw-bold mb-3">Order Placed Successfully!</h2>

            <!-- Subtext -->
            <p class="text-muted mb-4">
                Thank you for your order. Our team will reach out to you shortly with the next steps.
            </p>

            <?php if (!empty($order)): ?>
                <div class="card mb-4 text-start">
                    <div class="card-body">

                        <h5 class="mb-3">Order Summary</h5>

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

                        <h5 class="text-end">
                            Total: AED
                            <?= number_format($order->total_amount, 2); ?>
                        </h5>

                    </div>
                </div>
            <?php endif; ?>

            <!-- Payment Instructions -->
            <div class="alert alert-info text-start mt-4">
                <p class="mb-2">
                    <strong>You can deposit in the following UAE Bank Account and WhatsApp the receipt to:</strong><br>
                    <a href="https://wa.me/971554465332" target="_blank">
                        <strong>+971 55 446 5332</strong>
                    </a>
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

            <!-- Back to Services Button -->
            <a href="/premium-services" class="btn btn-primary btn-lg px-4 mt-4">
                Back to Services
            </a>

        </div>
    </div>
</div>