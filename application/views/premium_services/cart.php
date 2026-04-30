<section class="submition-form-section  py-sm-5 py-4">

    <div class="container">
        <!-- Page header -->
        <div class="mb-4">
            <a href="<?php echo site_url('/premium-services'); ?>" class=""><i class=" fa fa-arrow-left me-2"></i>Add
                more premium services</a>
            <h3 class="page-title mt-3 mb-1">Your Shopping Cart</h3>
            <p class="text-muted mb-0">Review the services you’ve added and manage your selections before checkout</p>
        </div>

        <div class="alert alert-info mt-4" role="alert">
            <h5 class="mb-3">🎁 Referral Discount Rewards</h5>

            <ul class="mb-2 ps-3">
                <li>
                    <strong>10% Welcome Discount</strong> – If you joined using a referral link, you will receive
                    <strong>10% OFF</strong> on your first premium service order.
                </li>

                <li class="mt-2">
                    <strong>20% Referral Reward</strong> – Invite friends using your referral link. When
                    <strong>2 referred members</strong> successfully place premium service orders, you will unlock
                    <strong>20% OFF</strong> on your future premium service purchases.
                </li>

                <li class="mt-2">
                    <strong>Best Discount Applied</strong> – If multiple discounts are eligible, the highest available
                    discount will be applied automatically in here.
                </li>
            </ul>

            <hr>

            <?php if ($this->session->userdata('user_id')): ?>
                <p class="mb-0">
                    ✅ You are logged in. Any eligible referral discounts will be calculated automatically in here.
                </p>
            <?php else: ?>
                <p class="mb-0">
                    🔐 Please <a href="/login">log in</a> to access referral discounts and rewards.
                </p>
            <?php endif; ?>
        </div>

        <form method="post" action="/cart/update">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 candidate-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Service</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <?php $total = 0; ?>

                    <tbody>
                        <?php if (!empty($cart)) { ?>

                            <?php foreach ($cart as $index => $item): ?>

                                <?php $subtotal = $item['price'] * $item['qty']; ?>

                                <tr>
                                    <td>
                                        <?= $index + 1 ?>
                                    </td>
                                    <td><?= $item['name'] ?></td>
                                    <td><?= $item['price'] ?> AED</td>
                                    <td>
                                        <?php if ($item['allow_quantity']): ?>
                                            <input type="number" name="qty[<?= $item['id'] ?>]" value="<?= $item['qty'] ?>" min="1">
                                        <?php else: ?>
                                            1
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $subtotal ?> AED</td>
                                    <td>
                                        <a href="/cart/remove/<?= $item['id'] ?>" class="btn btn-danger btn-sm">
                                            Remove
                                        </a>
                                    </td>
                                </tr>

                                <?php $total += $subtotal; ?>

                            <?php endforeach; ?>

                        <?php } else { ?>
                            <tr>
                                <td colspan="10" class="text-center">No services found.</td>
                            </tr>
                        <?php } ?>

                        <!-- <tr>
                            <td colspan="4"><b>Total</b></td>
                            <td><b><?= $total ?> AED</b></td>
                            <td></td>
                        </tr> -->

                        <tr>
                            <td colspan="4"><b>Subtotal</b></td>
                            <td><b>
                                    <?= number_format($total, 2) ?> AED
                                </b></td>
                            <td></td>
                        </tr>

                        <?php if ($pricing['percent'] > 0): ?>
                            <tr>
                                <td colspan="4">
                                    <b>Discount (
                                        <?= $pricing['percent'] ?>%)
                                    </b>
                                </td>
                                <td>
                                    <b>-
                                        <?= number_format($pricing['amount'], 2) ?> AED
                                    </b>
                                </td>
                                <td></td>
                            </tr>

                            <tr>
                                <td colspan="4"><b>Final Total</b></td>
                                <td>
                                    <b>
                                        <?= number_format($pricing['final'], 2) ?> AED
                                    </b>
                                </td>
                                <td></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="d-flex align-items-center justify-content-end mt-4 gap-4">
                <?php if (!$this->session->userdata('user_id')): ?>
                    <div class="alert alert-info mt-3">
                        Login as a member to unlock referral discounts.
                    </div>
                <?php endif; ?>

                <?php if (!empty($cart)) { ?>
                    <button class="btn btn-primary">Update Cart</button>
                    <a href="/checkout" class="btn btn-success">Checkout</a>
                <?php } else { ?>
                    <button class="btn btn-success" disabled title="Add items to cart first">
                        Checkout
                    </button>
                <?php } ?>
            </div>
        </form>
    </div>
</section>