@extends('layouts.app')

@section('title', 'Create CV')

@push('css')
    <!-- Add custom CSS if needed -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

@endpush

@section('content')
    <!-- Preview Modal -->
    <div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="previewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="previewModalLabel">CV Preview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Personal Information -->
                    <h5>Personal Information</h5>
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th>Name</th>
                            <td id="preview-name"></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td id="preview-email"></td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td id="preview-phone"></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td id="preview-address"></td>
                        </tr>
                        </tbody>
                    </table>
                    <hr>

                    <!-- Career Objective -->
                    <h5>Career Objective</h5>
                    <p id="preview-objective"></p>
                    <hr>

                    <!-- Education -->
                    <h5>Education</h5>
                    <table class="table table-bordered" id="preview-education">
                        <!-- Rows will be dynamically added here -->
                    </table>
                    <hr>

                    <!-- External Experience -->
                    <h5>External Experience</h5>
                    <table class="table table-bordered" id="preview-external-experience">
                        <!-- Rows will be dynamically added here -->
                    </table>
                    <hr>

                    <!-- Professional Experience -->
                    <h5>Professional Experience</h5>
                    <table class="table table-bordered" id="preview-professional-experience">
                        <!-- Rows will be dynamically added here -->
                    </table>
                    <hr>

                    <!-- Professional Projects -->
                    <h5>Professional Projects</h5>
                    <table class="table table-bordered" id="preview-professional-projects">
                        <!-- Rows will be dynamically added here -->
                    </table>
                    <hr>

                    <!-- Published Papers -->
                    <h5>Published Papers</h5>
                    <table class="table table-bordered" id="preview-published-papers">
                        <!-- Rows will be dynamically added here -->
                    </table>
                    <hr>

                    <!-- References -->
                    <h5>References</h5>
                    <table class="table table-bordered" id="preview-references">
                        <!-- Rows will be dynamically added here -->
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Edit</button>
                    <button type="button" class="btn btn-success" id="submit-btn">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h2 class="mb-4">Create Your CV</h2>
        <form   action="{{ route('cv.store') }}" method="POST">
            @csrf

            <!-- Personal Information -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Personal Information</h5>
                </div>
                <div class="card-body row">
                    <div class="mb-3 col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" >
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" >
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" >
                        @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" >
                        @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Career Objective -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Career Objective</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="objective" class="form-label">Career Objective</label>
                        <textarea class="form-control @error('objective') is-invalid @enderror" id="objective" name="objective" rows="3" >{{ old('objective') }}</textarea>
                        @error('objective')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Education -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Education</h5>
                </div>
                <div class="card-body">
                    <div id="education-section">
                        <div class="education-entry row mb-3">
                            <div class="col-md-6">
                                <label for="degree" class="form-label">Degree</label>
                                <input type="text" class="form-control @error('degree.*') is-invalid @enderror" name="degree[]" value="{{ old('degree.0') }}" >
                                @error('degree.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="institution_name" class="form-label">Institution Name</label>
                                <input type="text" class="form-control @error('institution_name.*') is-invalid @enderror" name="institution_name[]" value="{{ old('institution_name.0') }}" >
                                @error('institution_name.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" class="form-control @error('start_date.*') is-invalid @enderror" name="start_date[]" value="{{ old('start_date.0') }}" >
                                @error('start_date.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="end_date" class="form-label">End Date</label>
                                <input type="date" class="form-control @error('end_date.*') is-invalid @enderror" name="end_date[]" value="{{ old('end_date.0') }}" >
                                @error('end_date.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="grade" class="form-label">Grade</label>
                                <input type="text" class="form-control @error('grade.*') is-invalid @enderror" name="grade[]" value="{{ old('grade.0') }}" >
                                @error('grade.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 text-end">
                                <button type="button" class="btn btn-danger remove-education mt-2">Remove</button>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary add-education">Add More Education</button>
                </div>
            </div>

            <!-- External Experience -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>External Experience</h5>
                </div>
                <div class="card-body">
                    <div id="external-experience-section">
                        <div class="external-experience-entry row mb-3">
                            <div class="col-md-6">
                                <label for="experience_title" class="form-label">Experience Title</label>
                                <input type="text" class="form-control @error('experience_title.*') is-invalid @enderror" name="experience_title[]" value="{{ old('experience_title.0') }}" >
                                @error('experience_title.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="organization_name" class="form-label">Organization Name</label>
                                <input type="text" class="form-control @error('organization_name.*') is-invalid @enderror" name="organization_name[]" value="{{ old('organization_name.0') }}" >
                                @error('organization_name.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" class="form-control @error('start_date.*') is-invalid @enderror" name="start_date[]" value="{{ old('start_date.0') }}" >
                                @error('start_date.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="end_date" class="form-label">End Date</label>
                                <input type="date" class="form-control @error('end_date.*') is-invalid @enderror" name="end_date[]" value="{{ old('end_date.0') }}" >
                                @error('end_date.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control @error('description.*') is-invalid @enderror" name="description[]" rows="2" >{{ old('description.0') }}</textarea>
                                @error('description.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 text-end">
                                <button type="button" class="btn btn-danger remove-experience mt-2">Remove</button>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary add-experience">Add More Experience</button>
                </div>
            </div>

            <!-- Professional Experience -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Professional Experience</h5>
                </div>
                <div class="card-body">
                    <div id="professional-experience-section">
                        <div class="professional-experience-entry row mb-3">
                            <div class="col-md-6">
                                <label for="job_title" class="form-label">Job Title</label>
                                <input type="text" class="form-control @error('job_title.*') is-invalid @enderror" name="job_title[]" value="{{ old('job_title.0') }}" >
                                @error('job_title.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="company_name" class="form-label">Company Name</label>
                                <input type="text" class="form-control @error('company_name.*') is-invalid @enderror" name="company_name[]" value="{{ old('company_name.0') }}" >
                                @error('company_name.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" class="form-control @error('start_date.*') is-invalid @enderror" name="start_date[]" value="{{ old('start_date.0') }}" >
                                @error('start_date.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="end_date" class="form-label">End Date</label>
                                <input type="date" class="form-control @error('end_date.*') is-invalid @enderror" name="end_date[]" value="{{ old('end_date.0') }}" >
                                @error('end_date.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control @error('description.*') is-invalid @enderror" name="description[]" rows="2" >{{ old('description.0') }}</textarea>
                                @error('description.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 text-end">
                                <button type="button" class="btn btn-danger remove-professional-experience mt-2">Remove</button>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary add-professional-experience">Add More Professional Experience</button>
                </div>
            </div>

            <!-- Professional Projects -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Professional Projects</h5>
                </div>
                <div class="card-body">
                    <div id="professional-projects-section">
                        <div class="professional-projects-entry row mb-3">
                            <div class="col-md-6">
                                <label for="project_name" class="form-label">Project Name</label>
                                <input type="text" class="form-control @error('project_name.*') is-invalid @enderror" name="project_name[]" value="{{ old('project_name.0') }}" >
                                @error('project_name.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="project_description" class="form-label">Project Description</label>
                                <textarea class="form-control @error('project_description.*') is-invalid @enderror" name="project_description[]" rows="2" >{{ old('project_description.0') }}</textarea>
                                @error('project_description.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 text-end">
                                <button type="button" class="btn btn-danger remove-project mt-2">Remove</button>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary add-project">Add More Projects</button>
                </div>
            </div>

            <!-- Published Papers (Optional) -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Published Papers (Optional)</h5>
                </div>
                <div class="card-body">
                    <div id="published-papers-section">
                        <div class="published-papers-entry row mb-3">
                            <div class="col-md-6">
                                <label for="paper_title" class="form-label">Paper Title</label>
                                <input type="text" class="form-control @error('paper_title.*') is-invalid @enderror" name="paper_title[]" value="{{ old('paper_title.0') }}">
                                @error('paper_title.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="journal_name" class="form-label">Journal Name</label>
                                <input type="text" class="form-control @error('journal_name.*') is-invalid @enderror" name="journal_name[]" value="{{ old('journal_name.0') }}">
                                @error('journal_name.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="publication_date" class="form-label">Publication Date</label>
                                <input type="date" class="form-control @error('publication_date.*') is-invalid @enderror" name="publication_date[]" value="{{ old('publication_date.0') }}">
                                @error('publication_date.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="paper_link" class="form-label">Paper Link</label>
                                <input type="url" class="form-control @error('paper_link.*') is-invalid @enderror" name="paper_link[]" value="{{ old('paper_link.0') }}">
                                @error('paper_link.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 text-end">
                                <button type="button" class="btn btn-danger remove-paper mt-2">Remove</button>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary add-paper">Add More Papers</button>
                </div>
            </div>

            <!-- References -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>References</h5>
                </div>
                <div class="card-body">
                    <div id="references-section">
                        <div class="reference-entry row mb-3">
                            <div class="col-md-6">
                                <label for="reference_name" class="form-label">Reference Name</label>
                                <input type="text" class="form-control @error('reference_name.*') is-invalid @enderror" name="reference_name[]" value="{{ old('reference_name.0') }}" >
                                @error('reference_name.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="reference_contact" class="form-label">Reference Contact</label>
                                <input type="text" class="form-control @error('reference_contact.*') is-invalid @enderror" name="reference_contact[]" value="{{ old('reference_contact.0') }}" >
                                @error('reference_contact.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 text-end">
                                <button type="button" class="btn btn-danger remove-reference mt-2">Remove</button>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary add-reference">Add More References</button>
                </div>
            </div>

            <!-- Existing Submit Button -->
            <!-- <button type="submit" class="btn btn-success">Submit</button> -->

            <!-- New Buttons -->
            <button type="button" class="btn btn-success" id="preview-btn">Preview</button>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // Existing code for adding/removing sections remains unchanged.

            // Preview Button Click Handler
            $('#preview-btn').click(function() {
                // Personal Information
                $('#preview-name').text($('#name').val());
                $('#preview-email').text($('#email').val());
                $('#preview-phone').text($('#phone').val());
                $('#preview-address').text($('#address').val());

                // Career Objective
                $('#preview-objective').text($('#objective').val());

                // Education
                let educationHTML = '';
                $('.education-entry').each(function(index) {
                    const degree = $(this).find('input[name="degree[]"]').val();
                    const institution = $(this).find('input[name="institution_name[]"]').val();
                    const startDate = $(this).find('input[name="start_date[]"]').val();
                    const endDate = $(this).find('input[name="end_date[]"]').val();
                    const grade = $(this).find('input[name="grade[]"]').val();

                    educationHTML += `<p><strong>${degree}</strong> from ${institution} (${startDate} to ${endDate}) - Grade: ${grade}</p>`;
                });
                $('#preview-education').html(educationHTML);

                // External Experience
                let externalExperienceHTML = '';
                $('.external-experience-entry').each(function() {
                    const title = $(this).find('input[name="experience_title[]"]').val();
                    const organization = $(this).find('input[name="organization_name[]"]').val();
                    const startDate = $(this).find('input[name="start_date[]"]').val();
                    const endDate = $(this).find('input[name="end_date[]"]').val();
                    const description = $(this).find('textarea[name="description[]"]').val();

                    externalExperienceHTML += `<p><strong>${title}</strong> at ${organization} (${startDate} to ${endDate})<br>Description: ${description}</p>`;
                });
                $('#preview-external-experience').html(externalExperienceHTML);

                // Professional Experience
                let professionalExperienceHTML = '';
                $('.professional-experience-entry').each(function() {
                    const jobTitle = $(this).find('input[name="job_title[]"]').val();
                    const company = $(this).find('input[name="company_name[]"]').val();
                    const startDate = $(this).find('input[name="start_date[]"]').val();
                    const endDate = $(this).find('input[name="end_date[]"]').val();
                    const description = $(this).find('textarea[name="description[]"]').val();

                    professionalExperienceHTML += `<p><strong>${jobTitle}</strong> at ${company} (${startDate} to ${endDate})<br>Description: ${description}</p>`;
                });
                $('#preview-professional-experience').html(professionalExperienceHTML);

                // Professional Projects
                let projectsHTML = '';
                $('.professional-projects-entry').each(function() {
                    const projectName = $(this).find('input[name="project_name[]"]').val();
                    const projectDescription = $(this).find('textarea[name="project_description[]"]').val();

                    projectsHTML += `<p><strong>${projectName}</strong><br>Description: ${projectDescription}</p>`;
                });
                $('#preview-professional-projects').html(projectsHTML);

                // Published Papers
                let papersHTML = '';
                $('.published-papers-entry').each(function() {
                    const paperTitle = $(this).find('input[name="paper_title[]"]').val();
                    const journalName = $(this).find('input[name="journal_name[]"]').val();
                    const publicationDate = $(this).find('input[name="publication_date[]"]').val();
                    const paperLink = $(this).find('input[name="paper_link[]"]').val();

                    papersHTML += `<p><strong>${paperTitle}</strong> published in ${journalName} on ${publicationDate}<br>Link: <a href="${paperLink}" target="_blank">${paperLink}</a></p>`;
                });
                $('#preview-published-papers').html(papersHTML);

                // References
                let referencesHTML = '';
                $('.reference-entry').each(function() {
                    const refName = $(this).find('input[name="reference_name[]"]').val();
                    const refContact = $(this).find('input[name="reference_contact[]"]').val();

                    referencesHTML += `<p><strong>${refName}</strong><br>Contact: ${refContact}</p>`;
                });
                $('#preview-references').html(referencesHTML);

                // Show the Modal
                $('#previewModal').modal('show');
            });

            // Submit Button in Modal Click Handler
            $('#submit-btn').click(function() {
                // Submit the form
                $('form').submit();
            });
        });

        $(document).ready(function() {
            // Education Section
            $('.add-education').click(function() {
                let educationHTML = $('.education-entry:first').clone();
                educationHTML.find('input').val('');
                educationHTML.find('.invalid-feedback').remove();
                $('#education-section').append(educationHTML);
            });

            $(document).on('click', '.remove-education', function() {
                if ($('#education-section .education-entry').length > 1) {
                    $(this).closest('.education-entry').remove();
                }
            });

            // External Experience Section
            $('.add-experience').click(function() {
                let experienceHTML = $('.external-experience-entry:first').clone();
                experienceHTML.find('input, textarea').val('');
                experienceHTML.find('.invalid-feedback').remove();
                $('#external-experience-section').append(experienceHTML);
            });

            $(document).on('click', '.remove-experience', function() {
                if ($('#external-experience-section .external-experience-entry').length > 1) {
                    $(this).closest('.external-experience-entry').remove();
                }
            });

            // Professional Experience Section
            $('.add-professional-experience').click(function() {
                let experienceHTML = $('.professional-experience-entry:first').clone();
                experienceHTML.find('input, textarea').val('');
                experienceHTML.find('.invalid-feedback').remove();
                $('#professional-experience-section').append(experienceHTML);
            });

            $(document).on('click', '.remove-professional-experience', function() {
                if ($('#professional-experience-section .professional-experience-entry').length > 1) {
                    $(this).closest('.professional-experience-entry').remove();
                }
            });

            // Professional Projects Section
            $('.add-project').click(function() {
                let projectHTML = $('.professional-projects-entry:first').clone();
                projectHTML.find('input, textarea').val('');
                projectHTML.find('.invalid-feedback').remove();
                $('#professional-projects-section').append(projectHTML);
            });

            $(document).on('click', '.remove-project', function() {
                if ($('#professional-projects-section .professional-projects-entry').length > 1) {
                    $(this).closest('.professional-projects-entry').remove();
                }
            });

            // Published Papers Section
            $('.add-paper').click(function() {
                let paperHTML = $('.published-papers-entry:first').clone();
                paperHTML.find('input').val('');
                paperHTML.find('.invalid-feedback').remove();
                $('#published-papers-section').append(paperHTML);
            });

            $(document).on('click', '.remove-paper', function() {
                if ($('#published-papers-section .published-papers-entry').length > 1) {
                    $(this).closest('.published-papers-entry').remove();
                }
            });

            // References Section
            $('.add-reference').click(function() {
                let referenceHTML = $('.reference-entry:first').clone();
                referenceHTML.find('input').val('');
                referenceHTML.find('.invalid-feedback').remove();
                $('#references-section').append(referenceHTML);
            });

            $(document).on('click', '.remove-reference', function() {
                if ($('#references-section .reference-entry').length > 1) {
                    $(this).closest('.reference-entry').remove();
                }
            });
        });
    </script>
@endpush
