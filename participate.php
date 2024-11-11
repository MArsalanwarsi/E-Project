<?php
include('header.php');
include('body_start.php');
?>
<link href="assets/css/app.css" rel="stylesheet">
<link href="assets/css/icons.css" rel="stylesheet">
<style>
    /* Global style */


    .btn-tertiary {
        color: #fff;
        padding: 0;
        line-height: 40px;
        width: 100%;
        margin: auto;
        display: block;
        border: 2px solid #fff;

        &:hover,
        &:focus {
            color: lighten(#fff, 20%);
            border-color: lighten(#fff, 20%);
        }
    }

    /* input file style */

    .input-file,
    .input-file2 {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;

        +.js-labelFile,
        +.js-labelFile2 {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            padding: 20px 10px;
            cursor: pointer;

            .icon:before {
                content: "\f093";
            }

            &.has-file {
                .icon:before {
                    content: "\f00c";
                    color: #5AAC7B;
                }
            }
        }
    }
</style>
<link rel="stylesheet" href="css/main.css">
<div class="bg-light p-5 w-100"></div>

<!-- Start My Account Area -->
<section class="my_account_area pt--80 pb--55 bg--white">
    <div class="container">
        <div class="row">
            <section class="ds s-pt-50 s-pb-30 s-pb-md-90 c-mb-20 c-mb-xl-20">
                <div class="container">
                    <div class="row">

                        <div class="divider-40 d-none d-xl-block"></div>

                        <div class="col-lg-12 col-xl-12">
                            <h4 class="text-left mb-40">
                                Submit Your Story
                            </h4>
                            <form class="contact-form c-mb-20 c-gutter-20" method="post" id="particapation_form" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-12 alerts">
                                       
                                    </div>
                                    <input type="hidden" name="event_id" value="<?php echo $_GET['id']; ?>">
                                    <div class="col-sm-6">
                                        <div class="form-group has-placeholder">
                                            <label for="name">Full Name <span class="required">*</span></label>
                                            <input type="text" aria-required="true" size="30" value="" name="participant_name" id="name" class="form-control" placeholder="Full Name">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group has-placeholder">
                                            <label for="email">Email address<span class="required">*</span></label>
                                            <input type="email" aria-required="true" size="30" value="" name="participant_email" id="email" class="form-control" placeholder="Email Address">
                                        </div>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group has-placeholder">
                                            <label for="subject">Age<span class="required">*</span></label>
                                            <input type="number" aria-required="true" size="30" value="" name="participant_Age" id="subject" class="form-control" placeholder="Age">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-12">
                                        <div class="container mb-5">
                                            <div class="row justify-content-start">
                                                <div class="col-12 col-sm-12 col-md-12 p-3">
                                                    <div class="form-group">
                                                        <input type="file" name="participant_file" id="file" class="input-file">
                                                        <label for="file" class="btn btn-tertiary js-labelFile">
                                                            <i class="icon fa fa-check"></i>
                                                            <span class="js-fileName">Choose PDF/DOC File</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-sm-12 text-left d-flex justify-content-end">

                                            <div class="form-group">
                                                <button type="button" id="participate_submit" name="contact_submit" class="btn btn-maincolor">Send Now
                                                </button>
                                            </div>
                                        </div>

                                    </div>

                            </form>
                        </div>




                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
<!-- End My Account Area -->
<?php
include 'body_end.php';
include 'footer.php';
?>
<script src="assets/js/app.js"></script>
<script>
    $(document).ready(function() {
        (function() {

            'use strict';

            $('.input-file').each(function() {
                var $input = $(this),
                    $label = $input.next('.js-labelFile'),
                    labelVal = $label.html();

                $input.on('change', function(element) {
                    var fileName = '';
                    if (element.target.value) fileName = element.target.value.split('\\').pop();
                    fileName ? $label.addClass('has-file').find('.js-fileName').html(fileName) : $label.removeClass('has-file').html(labelVal);
                });
            });

        })();

        $('#participate_submit').click(function() {
            $('#participate_submit').attr("disabled", true);
            $form = $('#particapation_form');
            var formData = new FormData($form[0]);
            $.ajax({

                url: 'code.php',

                type: 'POST',

                data: formData,

                cache: false,

                contentType: false,

                processData: false,

                success: function(data) {
                    if (data == "success") {
                        $('.alerts').html("<div class='alert border-0 alert-dismissible fade show py-2 rounded' style='border:green 1px solid !important;padding:20px !important'><div class='d-flex align-items-center'><div class='font-35 text-success'><i class='bx bxs-check-circle'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>File Submitted Successfully</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
                        setTimeout(function() {
                            location.assign("participate.php?id=<?php echo $_GET['id']; ?>");
                        }, 2000);
                    } else if (data == "failed") {
                        $('.alerts').html("<div class='alert border-0 alert-dismissible fade show py-2 rounded' style='border:red 1px solid !important;padding:20px !important'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Failed to Update Info. Please Try Again</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
                        $('#participate_submit').attr("disabled", false);
                    } else if (data == "missing") {
                        $('.alerts').html("<div class='alert border-0 alert-dismissible fade show py-2 rounded' style='border:red 1px solid !important;padding:20px !important'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Please Fill All Fields</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
                        $('#participate_submit').attr("disabled", false);

                    } else if (data == "email_error") {
                        $('.alerts').html("<div class='alert border-0 alert-dismissible fade show py-2 rounded' style='border:red 1px solid !important;padding:20px !important'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Please Enter a Valid Email</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
                        $('#participate_submit').attr("disabled", false);

                    } else if (data == "name_error") {
                        $('.alerts').html("<div class='alert border-0 alert-dismissible fade show py-2 rounded' style='border:red 1px solid !important;padding:20px !important'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Name can only contain letters and spaces</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
                        $('#participate_submit').attr("disabled", false);

                    } else if (data == "extention_error") {
                        $('.alerts').html("<div class='alert border-0 alert-dismissible fade show py-2 rounded' style='border:red 1px solid !important;padding:20px !important'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Please Select a PDF/DOC/Docx File</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
                        $('#participate_submit').attr("disabled", false);

                    } else if (data == "exist") {
                        $('.alerts').html("<div class='alert border-0 alert-dismissible fade show py-2 rounded' style='border:red 1px solid !important;padding:20px !important'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Email Already Exists</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
                        $('#participate_submit').attr("disabled", false);

                    } else {
                        alert(data);
                        $('#participate_submit').attr("disabled", false);

                    }

                }
            });

        });
    })
</script>