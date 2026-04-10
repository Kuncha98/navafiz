<style>
    /* Modal container */
    .modern-modal {
        border-radius: 16px;
        padding: 10px;
    }

    /* Icon circle */
    .icon-box {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: rgba(13, 110, 253, 0.1);
        color: #0d6efd;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
    }

    /* Typography tweaks */
    .modal-title {
        font-size: 1.1rem;
        letter-spacing: 0.2px;
    }

    .modal-body p {
        font-size: 0.95rem;
        line-height: 1.5;
    }

    /* Buttons */
    .modern-btn {
        border-radius: 10px;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .modern-btn:hover {
        transform: translateY(-1px);
        /* box-shadow: 0 6px 14px rgba(13, 110, 253, 0.25); */
    }

    /* Cancel button */
    .btn-light {
        border-radius: 10px;
        background: #f8f9fa;
        border: 1px solid #e5e7eb;
    }

    .btn-light:hover {
        background: #f1f3f5;
    }

    /* Modal base */
    .modern-modal {
        border-radius: 16px;
        padding: 10px;
    }

    /* Status badge */
    .status-badge {
        display: inline-block;
        padding: 4px 10px;
        font-size: 12px;
        border-radius: 5px;
        background: rgba(25, 135, 84, 0.1);
        color: #198754;
        font-weight: 500;
    }

    /* Info group */
    .info-group {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    /* Each row */
    .info-item {
        display: flex;
        justify-content: space-between;
        padding: 10px 12px;
        background: #f9fafb;
        border-radius: 10px;
    }

    /* Labels */
    .label {
        font-size: 0.85rem;
        color: #6c757d;
    }

    /* Values */
    .value {
        font-size: 0.9rem;
        font-weight: 500;
        color: #212529;
    }

    /* Credential message */
    .credential-box {
        background: #f1f3f5;
        padding: 12px;
        border-radius: 10px;
        font-size: 0.9rem;
        white-space: pre-line;
    }

    /* Buttons */
    .modern-btn {
        border-radius: 10px;
        padding: 6px 14px;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .modern-btn:hover {
        transform: translateY(-1px);
    }

    /* Light button */
    .btn-light {
        border: 1px solid #e5e7eb;
        background: #fff;
    }

    .btn-light:hover {
        background: #f8f9fa;
    }
</style>
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

<!-- Premium Access Modal -->
<div class="modal fade" id="premiumModal" tabindex="-1" aria-labelledby="premiumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modern-modal border-0 shadow-lg">

            <!-- HEADER -->
            <div class="modal-header border-0">
                <div>
                    <h5 class="modal-title fw-semibold mb-1" id="premiumModalLabel">Premium Access Required</h5>
                    <span class="status-badge bg-warning text-dark">Restricted</span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- BODY -->
            <div class="modal-body pt-2">
                <p>You need to be a premium member or recruiter to access candidate resumes.</p>
                <p><span class="pe-2">
                        Contact us on WhatsApp for assistance:
                    </span>
                    <a href="https://wa.me/971554465332" target="_blank">
                        <i class="fab fa-whatsapp me-1"></i>
                        055 446 5332
                    </a>
                </p>
            </div>

            <!-- FOOTER -->
            <div class="modal-footer border-0 d-flex justify-content-end">
                <!-- <a href="<?= site_url('premium-services') ?>" class="btn btn-primary modern-btn">Go to Premium
                    Services</a> -->
                <button type="button" class="btn btn-light modern-btn" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Script to auto-open modal if ?show_modal=1 -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const premiumModalElement = document.getElementById('premiumModal');

        // Check if modal exists
        if (premiumModalElement) {
            const urlParams = new URLSearchParams(window.location.search);
            const showModal = urlParams.get('show_modal');

            if (showModal === '1') {
                const premiumModal = new bootstrap.Modal(premiumModalElement);
                premiumModal.show();
            }
        }
    });
</script>