<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Management System </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.5.1/dist/css/tom-select.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('navassets/css/core/variables.css') ?>">
    <link rel="stylesheet" href="<?= base_url('navassets/css/core/base.css') ?>">
    <link rel="stylesheet" href="<?= base_url('navassets/css/core/components.css') ?>">
    <link rel="stylesheet" href="<?= base_url('navassets/css/core/utilities.css') ?>">
    <link rel="stylesheet" href="<?= base_url('navassets/css/home.css') ?>">
</head>

<body>

    <!-- Navbar -->
    <?php $this->load->view('layouts/website/navbar'); ?>

    <!-- Main content -->
    <?php if (isset($content))
        $this->load->view($content); ?>

    <!-- Footer -->
    <?php $this->load->view('layouts/website/footer'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.5.1/dist/js/tom-select.complete.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="<?= base_url('navassets/js/common.js') ?>"></script>
    <script src="<?= base_url('navassets/js/website.js') ?>"></script>
    <script src="<?= base_url('navassets/js/master-form.js') ?>"></script>
    <script>new TomSelect("#skills", {

        });</script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelector('.contact-card form').addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch('<?= base_url("send-contact") ?>', {
                method: 'POST',
                body: formData
            })
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: data.message
                        });
                        this.reset();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: Object.values(data.errors || { error: data.message }).join('\n')
                        });
                    }
                })
                .catch(err => console.error(err));
        });
    </script>

    <script>
        $(document).ready(function () {
            $.ajax({
                url: 'professionals/professionalsajaxnew', // Your controller method
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    console.log(data.members); // Check data in console

                    var featuredCandidatesContainer = $('#featured-candidates-card');
                    featuredCandidatesContainer.empty(); // Clear previous content

                    // var currentRow = $('<div class="row g-4"></div>'); // New row

                    $.each(data.members, function (index, memberWrapper) {
                        if (memberWrapper.profile && memberWrapper.profile.length !== 0) {
                            var member = memberWrapper.profile;

                            // Avatar URL
                            var avatarUrl = `<?= site_url() ?>assets/uploads/members/${member.m_avatar}`;

                            // Skills split into badges (limit to first 3)
                            var skills = member.m_skills ? member.m_skills.split(',').slice(0, 3) : [];

                            // Build skill badges HTML
                            var skillsHtml = '';
                            skills.forEach(function (skill) {
                                skillsHtml += `<span class="badge skill-badge border me-1 me-2 mb-2">${skill}</span>`;
                            });

                            // Candidate card HTML
                            var candidateCard = $(`
                        <div class="col-lg-4 col-md-6">
                            <div class="card candidate-card position-relative">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                        <img src="${avatarUrl}" class="img-thumbnail rounded-circle candidate-avatar me-3 p-0" alt="${member.m_name}">
                                        <h6>${member.m_name || 'Name not available'}</h6>
                                    </div>
                                    <small class="text-muted">${member.m_profession || 'Profession not available'}</small>

                                    <ul class="list-unstyled small my-3">
                                        <li class="mb-1"><strong>Location:</strong> ${member.m_current_city || 'Location not available'}</li>
                                        <li><strong>Experience:</strong> ${member.uae_experience || 'Experience not available'}</li>
                                    </ul>

                                    <div>${skillsHtml}</div>
                                </div>
                                <!-- Hover Button -->
                                <div class="card-hover-action">
                                    <a href="n/${member.m_id}" class="btn btn-primary w-100">View Profile</a>
                                </div>
                            </div>
                        </div>
                    `);

                            featuredCandidatesContainer.append(candidateCard);

                        }

                    });


                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });
    </script>
</body>

</html>