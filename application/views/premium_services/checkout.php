<section class="submition-form-section  py-sm-5 py-4">

    <div class="container">
        <!-- Page header -->
        <div class="mb-4">
            <a href="<?php echo site_url('/cart'); ?>" class=""><i class=" fa fa-arrow-left me-2"></i>Back
                to cart</a>
            <h3 class="page-title mt-3 mb-1">Complete Your Checkout</h3>
            <p class="text-muted mb-0">Almost there! Provide your details and confirm your purchase securely</p>
        </div>

        <form method="post" action="/premium_services_checkout/place_order" enctype="multipart/form-data">

            <div class="row mb-4">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label required-label">Full Name</label>
                    <input type="text" id="name" name="name" class="form-control required-field">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label required-label">Mobile Number (WhatsApp)</label>
                    <input type="text" id="phone" name="phone" class="form-control required-field">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label required-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control required-field">
                </div>
            </div>

            <?php foreach ($cart as $item): ?>
                <div class="checkout-card mb-4">
                    <div class="checkout-card-header">
                        <h5>
                            <?= $item['name'] ?>
                        </h5>
                    </div>
                    <div class="">
                        <?php if (!empty($custom_fields[$item['id']])): ?>
                            <div class="row g-3">
                                <?php foreach ($custom_fields[$item['id']] as $field): ?>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="phone" class="form-label required-label">
                                                <?= $field->field_label ?>
                                            </label>

                                            <?php if ($field->field_type == 'text'): ?>
                                                <input type="text" name="fields[<?= $item['id'] ?>][<?= $field->field_name ?>]"
                                                    class="form-control" placeholder="<?= $field->field_label ?>" <?= $field->is_required ? 'required' : '' ?>>

                                            <?php elseif ($field->field_type == 'textarea'): ?>
                                                <textarea name="fields[<?= $item['id'] ?>][<?= $field->field_name ?>]"
                                                    class="form-control" rows="3" placeholder="<?= $field->field_label ?>"
                                                    <?= $field->is_required ? 'required' : '' ?>></textarea>

                                            <?php elseif ($field->field_type == 'date'): ?>
                                                <input type="date" name="fields[<?= $item['id'] ?>][<?= $field->field_name ?>]"
                                                    class="form-control" <?= $field->is_required ? 'required' : '' ?>>

                                            <?php elseif ($field->field_type == 'file'): ?>
                                                <input type="file" name="files_<?= $item['id'] ?>_<?= $field->field_name ?>"
                                                    class="form-control" <?= $field->is_required ? 'required' : '' ?>>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <p class="text-muted">No additional fields required for this item.</p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>

            <button class="btn btn-success">
                Place Order
            </button>

        </form>
    </div>
</section>