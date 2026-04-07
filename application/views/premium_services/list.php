<section class="submition-form-section  py-sm-5 py-4">

    <div class="container">
        <!-- Page header -->
        <div class="mb-4">
            <p class="section-subtitle">Explore our curated range of premium services tailored to meet your needs</p>
            <h2 class="section-title">Our Premium Services</h2>
        </div>

        <!-- Notification Placeholder -->
        <div id="cart-notification" class="alert alert-success text-dark" style="display: none;">
            <!-- Notification text will be injected here -->
        </div>

        <div class="accordion" id="servicesAccordion">
            <?php $grouped_services = is_array($grouped_services) ? $grouped_services : [];
            ksort($grouped_services);
            $i = 0; ?>
            <?php foreach ($grouped_services as $category_id => $category): ?>
                <?php $i++; ?>
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header" id="heading<?= $i ?>">
                        <button class="accordion-button <?= $i == 1 ? '' : 'collapsed' ?>" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapse<?= $i ?>"
                            aria-expanded="<?= $i == 1 ? 'true' : 'false' ?>" aria-controls="collapse<?= $i ?>">
                            <?= $category['category_name'] ?>
                        </button>
                    </h2>
                    <div id="collapse<?= $i ?>" class="accordion-collapse collapse <?= $i == 1 ? 'show' : '' ?>"
                        aria-labelledby="heading<?= $i ?>" data-bs-parent="#servicesAccordion">
                        <div class="accordion-body">
                            <?php foreach ($category['services'] as $service): ?>
                                <div class="mb-2">
                                    <div class="service-list-item row gap-2 gap-lg-0 mb-3">
                                        <!-- Service Name -->
                                        <div class="col-12 col-lg-4 d-flex align-items-center">
                                            <h6 class="m-0"><?= $service->name ?></h6>
                                        </div>

                                        <!-- Service Description -->
                                        <div class="col-12 col-lg-4">
                                            <p class="m-0">
                                                <?= $service->description ?>
                                            </p>
                                        </div>

                                        <!-- Service Price -->
                                        <div
                                            class="col-12 col-lg-2 d-flex align-items-center justify-content-start justify-content-lg-end">
                                            <h6 class="m-0"><?= $service->price ?> AED</h6>
                                        </div>

                                        <!-- Add to Cart Button -->
                                        <div
                                            class="col-12 col-lg-2 d-flex align-items-center justify-content-start justify-content-lg-end">
                                            <button class="btn btn-primary add-to-cart cart-btn" data-id="<?= $service->id ?>">
                                                Add to
                                                Cart <i class="fas fa-shopping-cart ms-1"></i></button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>