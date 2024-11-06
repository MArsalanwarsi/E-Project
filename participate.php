<?php
include('header.php');
include('body_start.php');
?>
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
                            <form class="contact-form c-mb-20 c-gutter-20" method="post" action="https://html.modernwebtemplates.com/">

                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group has-placeholder">
                                            <label for="name">Full Name <span class="required">*</span></label>
                                            <input type="text" aria-required="true" size="30" value="" name="name" id="name" class="form-control" placeholder="Full Name">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group has-placeholder">
                                            <label for="email">Email address<span class="required">*</span></label>
                                            <input type="email" aria-required="true" size="30" value="" name="email" id="email" class="form-control" placeholder="Email Address">
                                        </div>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group has-placeholder">
                                            <label for="subject">Age<span class="required">*</span></label>
                                            <input type="text" aria-required="true" size="30" value="" name="Age" id="subject" class="form-control" placeholder="Age">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-12">
                                        <div class="container mb-5">
                                            <div class="row justify-content-start">
                                                <div class="col-12 col-sm-12 col-md-12 p-3">
                                                    <div class="form-group">
                                                        <input type="file" name="category_image_update" id="file" class="input-file">
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
                                                <button type="submit" id="contact_form_submit" name="contact_submit" class="btn btn-maincolor">Send Now
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
    })
</script>