<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Medicare Pronto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
</head>
<style>
    a.disabled {
        pointer-events: none;
        cursor: default;
    }

    .style_date,
    .style_address,
    .style_name,
    .style_email,
    .style_phone {
        margin-top: 3px;
        margin-bottom: 5px;
        color: red;
        font-size: 10px;
        font-weight: 400;
    }

    #valid_month,
    #valid_address,
    #valid_zip_code,
    #valid_name,
    #valid_email,
    #valid_phone {
        display: none;
    }

    #valid_year {
        display: none;
    }

    #valid_day {
        display: none;
    }
</style>

<body>

    <div class="header">
        <div class="container">
            <div class="logo-col">
                <img src="images/logo.png" class="logo" />
            </div>
        </div>
    </div>

    <div class="top-strip">
        <div class="container">
            <p>Find and Compare 2023 Plans & Benefits</span></p>
        </div>
    </div>

    <div class="quiz-sec">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .card {
            width: 100%;
            margin: 0 auto;
            margin-top: 19px;

        }

        .active {

            background: #518FCF !important;
            box-shadow: 2px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 10px;
            color: #F2F2F2;
        }

        header {
            width: 100%;
            height: 80px;
            background: #2E75BF;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            /* margin-top: 0 auto 16; */
        }

        .btn {
            background: #F2F2F2;
            box-shadow: 2px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 10px;
            border: none;
            outline: none;
            padding: 12px 12px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn span {
            margin-left: 6px;
        }

        .btn:hover {
            border: 2px solid #2E75BF;
        }

        .question_text_f1 {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 500;
            font-size: 20px;
            margin-left: 6px;
            /* identical to box height */

            color: #000000;
        }

        .question_text_f2 {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 500;
            font-size: 15px;


            /* identical to box height */

            color: #000000;
        }

        .input_label {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 500;
            font-size: 22px;
            /* identical to box height */

            color: #2E75BF;
        }

        form input[type="text"] {

            box-sizing: border-box;

            background: #f1f1f1;
            box-shadow: 2px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 10px;
            width: 88% !important;
            height: 45px !important;
        }

        form input[type="radio"] {


            background: transparent;
            box-shadow: none !important;
            border: none !important;
            outline: none !important;
            z-index: 1
        }

        ::placeholder {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 500;

            /* identical to box height */

            colorr: #B7B7B7;
        }

        .result_btn {

            width: 384px;
            height: 59px;
            display: flex;
            justify-content: center;
            align-items: center;

            background: #518FCF;
            box-shadow: 2px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 10px;
            border: none;
            outline: none;
            padding: 0 15px;
            margin: 42px 0;
            color: white;
        }

        .form_text {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        #valid_name,
        #valid_email,
        #valid_phone,
        #valid_yes_no,
        #valid_age {
            display: none;
        }

        .form-group {
            margin-left: 56px !important;
            margin-top: 10px;
        }

        .result_btn {
            background: lightgrey;
            color: white;
        }

        .background_image {
            /* background:url('image/background.png'); */
            background-image: url('images/background.png') !important;
            background-position: 22% 158%;
            /* background-size: cover; */

        }

        .ss_image {
            position: absolute;
            bottom: 10px;
            right: 50px;
            z-index: 11;
        }

        @media only screen and (max-width: 600px) {
            .background_image {
                /* background:url('image/background.png'); */
                background-image: url('images/background.png') !important;
                background-position: 41% 506%;
                /* background-size: cover; */
            }
        }
    </style>
    <div class="container rounded">
        <img src="{{ asset('images/ss.png') }}" alt="" width="200" height="200" class="ss_image">
        <form action="database/insertData2.php" enctype="multipart/form-data" method="POST">
            
            <input type="hidden" name="s1_id" value="<?php echo (isset($_GET['sub1']))?$_GET['sub1']:'' ?>" id="">
            <input type="hidden" name="s2_id" value="<?php echo (isset($_GET['sub2']))?$_GET['sub1']:'' ?>" id="">
            <input type="hidden" name="s3_id" value="<?php echo (isset($_GET['sub3']))?$_GET['sub1']:'' ?>" id="">
            <input type="hidden" name="s4_id" value="<?php echo (isset($_GET['sub4']))?$_GET['sub1']:'' ?>" id="">
            <input type="hidden" name="s5_id" value="<?php echo (isset($_GET['sub5']))?$_GET['sub1']:'' ?>" id="">
            <input type="hidden" name="transaction_id" value="<?php echo (isset($_GET['transaction_id'])) ? $_GET['transaction_id'] : '' ?>" id="">
            <input type="hidden" name="aff_id" value="<?php echo (isset($_GET['affid']))?$_GET['affid']:'' ?>" id="">
            <input type="hidden" name="off_id" value="<?php echo (isset($_GET['offid']))?$_GET['offid']:'' ?>" id="">

            <div class="card">
                <header class="rounded">
                    <div class="box-header">
                        <h2>Seniors are eligible for Medicare Flex Card assistance for groceries, dentures, eyeglasses, and
                            hearing
                            aids based on zip code</h2>
                    </div>
                   
                </header>
                <div class="background_image">
                    <div class="card-body content rounded mt-5">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="row mt-1">
                                    <div class="col-12 d-flex justify-content-center align-items-center">
                                        <p class="question_text_f1">How Old are You?</p>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12 ">
                                        <div class="d-flex justify-content-around align-items-center" id="age_btn0"
                                            onclick="validate_all_fields(this.id)">
                                            <label class="btn bd_class_1 option-col age_btn" id="age_btn1"
                                                onclick="validate_all_fields(this.id)">
                                                <svg width="20" height="20" viewBox="0 0 38 38" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <rect width="38" height="38" fill="url(#pattern0)" />
                                                    <defs>
                                                        <pattern id="pattern0" patternContentUnits="objectBoundingBox"
                                                            width="1" height="1">
                                                            <use xlink:href="#image0_79_56" transform="scale(0.015625)" />
                                                        </pattern>
                                                        <image id="image0_79_56" width="64" height="64"
                                                            xlink:href="data:image/png;base64,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" />
                                                    </defs>
                                                </svg>
                                                <input type="radio" style="border:none;outline:none" name="bd_class"
                                                    value="64-70" />
                                                <span>64-70</span>
                                            </label>
                                            <label class="btn bd_class_2 option-col age_btn" id="age_btn2"
                                                onclick="validate_all_fields(this.id)">
                                                <svg width="20" height="20" viewBox="0 0 38 38" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <rect width="38" height="38" fill="url(#pattern0)" />
                                                    <defs>
                                                        <pattern id="pattern0" patternContentUnits="objectBoundingBox"
                                                            width="1" height="1">
                                                            <use xlink:href="#image0_79_56" transform="scale(0.015625)" />
                                                        </pattern>
                                                        <image id="image0_79_56" width="64" height="64"
                                                            xlink:href="data:image/png;base64,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" />
                                                    </defs>
                                                </svg>
                                                <input type="radio" name="bd_class" value="71-75">
                                                <span>71-75</span>
                                            </label>
                                            <div class="btn bd_class_3 option-col age_btn" id="age_btn3"
                                                onclick="validate_all_fields(this.id)">
                                                <svg width="20" height="20" viewBox="0 0 38 38" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <rect width="38" height="38" fill="url(#pattern0)" />
                                                    <defs>
                                                        <pattern id="pattern0" patternContentUnits="objectBoundingBox"
                                                            width="1" height="1">
                                                            <use xlink:href="#image0_79_56" transform="scale(0.015625)" />
                                                        </pattern>
                                                        <image id="image0_79_56" width="64" height="64"
                                                            xlink:href="data:image/png;base64,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" />
                                                    </defs>
                                                </svg>
                                                <input type="radio" name="bd_class" value="76+" />
                                                <span>76+</span>
                                            </div>
                                        </div>
                                        <span class="style_age text-danger text-center mt-1" id="valid_age"
                                            style="margin-left:55px;">Select One Button </span>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 form_text">
                                        <p class="question_text_f1" style="text-align:center">Are you interested in a 2023
                                            Medicare plan with Flex Card benefits?</p>
                                    </div>
                                    <div class="col-8 mx-auto ">
                                        <div class="d-flex d-flex justify-content-around align-items-center mt-2"
                                            id="medcare_yes_no" onclick="validate_all_fields(this.id)">
                                            <label class="btn med_care_yes option-col med_care_yes_no">
                                                <svg width="9" height="9" viewBox="0 0 9 9" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M8.28959 0.174599C8.13095 0.0861669 7.95647 0.0299295 7.77612 0.00910303C7.59577 -0.0117234 7.4131 0.00326945 7.23854 0.0532244C7.06398 0.103179 6.90096 0.187117 6.75881 0.300236C6.61665 0.413355 6.49815 0.553437 6.41008 0.712472L3.84441 5.33804L2.37604 3.86702C2.24856 3.73479 2.09606 3.62932 1.92745 3.55676C1.75885 3.4842 1.5775 3.446 1.394 3.44441C1.2105 3.44281 1.02852 3.47784 0.858679 3.54745C0.688837 3.61707 0.534535 3.71987 0.404776 3.84986C0.275017 3.97985 0.1724 4.13443 0.102912 4.30458C0.0334244 4.47473 -0.00154239 4.65704 5.21795e-05 4.84087C0.00164674 5.0247 0.0397708 5.20637 0.1122 5.37529C0.184628 5.5442 0.289912 5.69697 0.421906 5.82468L3.18589 8.59365C3.44709 8.85601 3.79949 9 4.16296 9L4.35436 8.98615C4.56619 8.95647 4.76825 8.87793 4.94463 8.75673C5.12101 8.63553 5.2669 8.47497 5.37082 8.28768L8.8258 2.0575C8.91401 1.8986 8.97011 1.72384 8.9909 1.54322C9.01169 1.36259 8.99677 1.17963 8.94697 1.00479C8.89718 0.829944 8.8135 0.666637 8.7007 0.524192C8.58791 0.381747 8.44821 0.262955 8.28959 0.174599Z"
                                                        fill="#5FA900" />
                                                    <path
                                                        d="M8.28959 0.174599C8.13095 0.0861669 7.95647 0.0299295 7.77612 0.00910303C7.59577 -0.0117234 7.4131 0.00326945 7.23854 0.0532244C7.06398 0.103179 6.90096 0.187117 6.75881 0.300236C6.61665 0.413355 6.49815 0.553437 6.41008 0.712472L3.84441 5.33804L2.37604 3.86702C2.24856 3.73479 2.09606 3.62932 1.92745 3.55676C1.75885 3.4842 1.5775 3.446 1.394 3.44441C1.2105 3.44281 1.02852 3.47784 0.858679 3.54745C0.688837 3.61707 0.534535 3.71987 0.404776 3.84986C0.275017 3.97985 0.1724 4.13443 0.102912 4.30458C0.0334244 4.47473 -0.00154239 4.65704 5.21795e-05 4.84087C0.00164674 5.0247 0.0397708 5.20637 0.1122 5.37529C0.184628 5.5442 0.289912 5.69697 0.421906 5.82468L3.18589 8.59365C3.44709 8.85601 3.79949 9 4.16296 9L4.35436 8.98615C4.56619 8.95647 4.76825 8.87793 4.94463 8.75673C5.12101 8.63553 5.2669 8.47497 5.37082 8.28768L8.8258 2.0575C8.91401 1.8986 8.97011 1.72384 8.9909 1.54322C9.01169 1.36259 8.99677 1.17963 8.94697 1.00479C8.89718 0.829944 8.8135 0.666637 8.7007 0.524192C8.58791 0.381747 8.44821 0.262955 8.28959 0.174599Z"
                                                        stroke="black" />
                                                </svg>
                                                <input type="radio" name="med_care" value="1" />
                                                <span>Yes</span>
                                            </label>
                                            <label class="btn med_care_no option-col med_care_yes_no">
                                                <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M8.33334 8.33317L1.66667 1.6665M8.33334 1.6665L1.66667 8.33317"
                                                        stroke="#FA3333" stroke-width="2" stroke-linecap="round" />
                                                </svg>
                                                <input type="radio" name="med_care" value="0" />
                                                <span>No</span>
                                            </label>
                                        </div>
                                        <span class="style_yes_no text-danger text-center" id="valid_yes_no"
                                            style="margin-left:16px;margin-top: 2px;">Select One Button </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="">
                                    <div class="form-group">
                                        <label class="input_label" for="formGroupExampleInput">Name<span
                                                class="text-danger" style="font-size:18px">*</span></label>
                                        <input type="text" name="name" class="form-control"
                                            id="formGroupExampleInput" placeholder="Name"
                                            onkeyup="validate_all_fields(this.id)">
                                        <p class="style_name text-danger mt-1" id="valid_name">Enter Valid Name</p>
                                    </div>
                                    <div class="form-group">
                                        <label class="input_label" for="email">Email<span class="text-danger"
                                                style="font-size:18px">*</span></label>
                                        <input type="text" name="email" class="form-control" id="email"
                                            placeholder="email@address.com" onkeyup="validate_all_fields(this.id)">
                                        <p class="style_email text-danger mt-1" id="valid_email">Enter Valid Email</p>
                                    </div>
                                    <div class="form-group">
                                        <label class="input_label" for="formGroupExampleInput2">Phone<span
                                                class="text-danger" style="font-size:18px">*</span></label>
                                        <input type="text" name="phone" id="phone" class="form-control"
                                            placeholder="(__) __-____" onkeyup="validate_all_fields(this.id)">
                                        <p class="style_phone text-danger mt-1" id="valid_phone">Enter Valid Phone</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10 d-flex justify-content-center align-items-center mt-5 mb-5 mx-auto">
                            <button class="result_btn" type="button" onclick="validate_form()"
                                style="z-index:111;">View My Results</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.60/inputmask/jquery.inputmask.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script>
        $(function() {
            $('.btn').click(function() {
                if ($(this).hasClass('med_care_yes')) {
                    $('.med_care_no').removeClass('active');
                    $('.med_care_yes').addClass('active');
                    $('.med_care_yes').find("button").val("yes");
                    $('.med_care_yes').val("64-70");
                }
                if ($(this).hasClass('med_care_no')) {
                    $('.med_care_yes').removeClass('active');
                    $('.med_care_no').addClass('active');
                    $('.med_care_no').find("button").val("no");
                }
                if ($(this).hasClass('bd_class_1')) {
                    $('.bd_class_2').removeClass('active');
                    $('.bd_class_3').removeClass('active');
                    $('.bd_class_1').addClass('active');
                    $('.bd_class_1').find('button').val('71-75');
                }
                if ($(this).hasClass('bd_class_2')) {
                    $('.bd_class_1').removeClass('active');
                    $('.bd_class_3').removeClass('active');
                    $('.bd_class_2').addClass('active');
                    $('.bd_class_2').val(1);
                }
                if ($(this).hasClass('bd_class_3')) {
                    $('.bd_class_2').removeClass('active');
                    $('.bd_class_1').removeClass('active');
                    $('.bd_class_3').addClass('active');
                    $('.bd_class_3').val(1);
                }
            });
        });
        $(":input").inputmask();
        $("#phone").inputmask({
            "mask": "(999) 999-9999"
        });
    </script>
    <script>
        function validate_form() {
            btn_y_no = $('.med_care_yes_no').hasClass('active');
            age_btn = $('.age_btn').hasClass('active');
            name = $('#formGroupExampleInput').val();
            email = $('#email').val();
            phone = $('#phone').val();
            if (!btn_y_no) {
                $('#valid_yes_no').css('display', 'block');
            } else {
                $('#valid_yes_no').css('display', 'none');
            }
            if (!age_btn) {
                $('#valid_age').css('display', 'block');
            } else {
                $('#valid_age').css('display', 'none');
            }
            if (name.length >= 2) {
                $('#valid_name').css('display', 'none');
            } else {
                $('#valid_name').css('display', 'block');
            }
            if (/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/.test(email)) {
                $('#valid_email').css('display', 'none');
            } else {
                $('#valid_email').css('display', 'block');
            }
            if (/^\([0-9]{3}\) [0-9]{3}\-[0-9]{4}$/.test(phone)) {
                $('#valid_phone').css('display', 'none');
            } else {
                $('#valid_phone').css('display', 'block');
            }
        }
        function validate_all_fields(tab) {
            btn_y_no = $('.med_care_yes_no').hasClass('active');
            age_btn = $('.age_btn').hasClass('active');
            name = $('#formGroupExampleInput').val();
            email = $('#email').val();
            phone = $('#phone').val();
            if (tab == 'email') {
                if (/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/.test(email)) {
                    $('#valid_email').css('display', 'none');
                } else {
                    $('#valid_email').css('display', 'block');
                }
            } else if (tab == 'formGroupExampleInput') {
                if (name.length >= 2) {
                    $('#valid_name').css('display', 'none');
                } else {
                    $('#valid_name').css('display', 'block');
                }
            }
            else if (tab == 'phone'){
                if (/^\([0-9]{3}\) [0-9]{3}\-[0-9]{4}$/.test(phone)) {
                $('#valid_phone').css('display', 'none');
            } else {
                $('#valid_phone').css('display', 'block');
            }
            }
            else if (tab == 'medicare_yes_no'){
                if (!btn_y_no) {
                $('#valid_yes_no').css('display', 'block');
            } else {
                $('#valid_yes_no').css('display', 'none');
            }
            }
            else if (tab == 'age_btn0' || tab == 'age_btn1' || tab == 'age_btn2' || tab == 'age_btn3') {
                if (!age_btn) {
                $('#valid_age').css('display', 'block');
            } else {
                $('#valid_age').css('display', 'none');
            }
            } 
            if (btn_y_no == true && age_btn == true && name.length >= 2 && (/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/.test(
                    email)) && (/^\([0-9]{3}\) [0-9]{3}\-[0-9]{4}$/.test(phone))) {
                $('.result_btn').css('background', 'green');
                $('.result_btn').attr('type', 'submit');
            } else {
                $('.result_btn').css('background', 'lightgrey');
                $('.result_btn').attr('type', 'button');
            }
        }
    </script>
    </div>
    
   



</body>

</html>