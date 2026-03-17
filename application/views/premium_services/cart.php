<section class="submition-form-section  py-sm-5 py-4">

    <div class="container">
        <!-- Page header -->
        <div class="mb-4">
            <a href="<?php echo site_url('/premium-services'); ?>" class=""><i class=" fa fa-arrow-left me-2"></i>Add
                more premium services</a>
            <h3 class="page-title mt-3 mb-1">Your Shopping Cart</h3>
            <p class="text-muted mb-0">Review the services you’ve added and manage your selections before checkout</p>
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

                        <tr>
                            <td colspan="4"><b>Total</b></td>
                            <td><b><?= $total ?> AED</b></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="d-flex align-items-center justify-content-end mt-4 gap-4">
                <button class="btn btn-primary">Update Cart</button>
                <a href="/checkout" class="btn btn-success">Checkout</a>
            </div>
        </form>
    </div>
</section>