<!DOCTYPE html>
<html>
    <head>
        <style>
            body {
                color: #444;
                font-family: "Poppins", sans-serif;
                position: relative;
            }
            .heading {
                text-align: center;
                font-size: 20px;
                margin: 0 0 20px;
            }
            .float-right {
                float: right;
            }
            .float-left {
                float: left;
            }
            .clear-both {
                clear: both;
            }
            .text {
                font-size: 15px;
                margin: 0 0 15px 0;
                padding-right: 5px;
                float: left;
                width: 100%;
            }
            .text span {
                font-weight: 400;
            }
            /* .text span.span {
                width: 100%;
                position: relative;
                display: block;
            }
            .text span.span::after {
                content: "";
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                height: 1px;
                background-color: black;
            } */
            .avatar {
                width: 70px;
                border-radius: 7px;
                object-fit: cover;
            }
            .position-heading {
                position: absolute;
                top: 30px;
                left: 50%;
                transform: translateX(-50%);
            }
        </style>
    </head>
    <body>
        <h1 class="heading position-heading">Application Form</h1>
        <div>
            <img src="{{ asset('assets/images/logo.png') }}" alt="" class="float-left" width="65px">
            <img src="{{ isset($form) ? (!empty($form->image) ? asset($form->image) : asset('assets/images/avatar3.png')) : asset('assets/images/avatar3.png') }}" alt="" class="float-right avatar">
        </div>
        <div class="clear-both"></div>
        <div style="padding-top: 30px;">
            <div class="float-left" style="width:18%;">
                <h2 class="text">App No. <span>00</span></h2>
            </div>
            <div class="float-left" style="width:18%;">
                <h2 class="text">Reg No. <span>0000</span></h2>
            </div>
            <div class="float-right" style="width:18%;">
                <h2 class="text">Form No. <span>00</span></h2>
            </div>
        </div>
        <div class="clear-both"></div>
        <div>
            <div class="float-left" style="width:18%;">
                <h2 class="text">App No. <span>00</span></h2>
            </div>
            <div class="float-left" style="width:18%;">
                <h2 class="text">Reg No. <span>0000</span></h2>
            </div>
            <div class="float-right" style="width:18%;">
                <h2 class="text">Form No. <span>00</span></h2>
            </div>
        </div>
    </body>
</html>