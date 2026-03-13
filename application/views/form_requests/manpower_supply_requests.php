<div class="container py-4">

    <!-- Page header -->
    <div class="mb-4">
        <a href="<?php echo site_url('n/' . $this->session->userdata('username')); ?>" class=""><i
                class="fa fa-arrow-left me-2"></i>Back to dashboard</a>
        <h3 class="page-title mt-3 mb-1">Manpower Partner Registration Management</h3>
        <p class="text-muted mb-0">Review and manage all manpower supply company registration submissions.</p>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0 candidate-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Company Name</th>
                    <th>Country of Op.</th>
                    <th>Comp. Type</th>
                    <th>Contact Person</th>
                    <th>Mobile</th>
                    <th>Supply Countries</th>
                    <th>Source Countries</th>
                    <th>Categories</th>
                    <th>Industries</th>
                    <th>Trade Center Ava.</th>
                    <th>Status</th>
                    <th>Submitted</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($records)) { ?>
                    <?php foreach ($records as $index => $row) { ?>
                        <tr>
                            <td>
                                <?= $index + 1 ?>
                            </td>
                            <td>
                                <?php echo $row->company_name; ?>
                            </td>
                            <td>
                                <?php echo $row->country_of_operation; ?>
                            </td>
                            <td>
                                <?php echo $row->company_type; ?>
                            </td>
                            <td>
                                <?php echo $row->contact_person_name; ?>
                            </td>
                            <td>
                                <?php echo $row->mobile_number; ?>
                            </td>
                            <td>
                                <?php
                                $supply_countries = explode(',', $row->supply_countries);
                                if (!empty($supply_countries)):
                                    foreach ($supply_countries as $supply_country):
                                        ?>
                                        <span class="badge skill-badge border me-1 mb-2">
                                            <?php echo htmlspecialchars(ucwords(str_replace('_', ' ', trim($supply_country)))); ?>
                                        </span>
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                            </td>
                            <td>
                                <?php
                                $source_countries = explode(',', $row->source_countries);
                                if (!empty($source_countries)):
                                    foreach ($source_countries as $source_country):
                                        ?>
                                        <span class="badge skill-badge border me-1 mb-2">
                                            <?php echo htmlspecialchars(ucwords(str_replace('_', ' ', trim($source_country)))) ?>
                                        </span>
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                            </td>
                            <td>
                                <?php
                                $manpower_categories = explode(',', $row->manpower_categories);
                                if (!empty($manpower_categories)):
                                    foreach ($manpower_categories as $manpower_category):
                                        ?>
                                        <span class="badge skill-badge border me-1 mb-2">
                                            <?php echo htmlspecialchars(ucwords(str_replace('_', ' ', trim($manpower_category)))) ?>
                                        </span>
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                            </td>
                            <td>
                                <?php
                                $industries_served = explode(',', $row->industries_served);
                                if (!empty($industries_served)):
                                    foreach ($industries_served as $industry_served):
                                        ?>
                                        <span class="badge skill-badge border me-1 mb-2">
                                            <?php echo htmlspecialchars(ucwords(str_replace('_', ' ', trim($industry_served)))) ?>
                                        </span>
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                            </td>
                            <td>
                                <?php echo $row->trade_testing_center == 1 ? 'Yes' : 'No' ?>
                            </td>
                            <td>
                                <?php $status = request_forms_status($row->status); ?>
                                <span class="<?= $status['class'] ?>">
                                    <?= $status['name']; ?>
                                </span>
                            </td>
                            <td>
                                <?php echo $row->created_at; ?>
                            </td>
                            <td>
                                <a href="<?php echo site_url('form-requests/manpower-supply-request-view/' . $row->id); ?>"
                                    class="btn btn-sm btn-primary mb-1">View</a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="10" class="text-center">No candidates found.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <br>
        <?php echo $pagination; ?>
    </div>
</div>