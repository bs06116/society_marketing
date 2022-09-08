<!DOCTYPE html>
<html>
    <head>
        <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet"> -->
        <style>
            body {
                color: #444;
                font-family: "Poppins", sans-serif;
            }
            .heading {
                text-align: center;
                font-size: 20px;
                margin: 0 0 20px;
            }
            .golden-heading {
                padding: 7px;
                border-radius: 10px;
                font-size: 16px;
                color: white;
                background-color: #e2a324;
                margin: 0 auto 50px;
                text-align: center;
                width: 230px;
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
            .text span.span {
                border-bottom: 1px solid;
                width: 100%;
                display: inline-block;
            }
        </style>
    </head>
    <body>
        <h2 class="heading">CASH RECEIPT</h2>
        <h3 class="golden-heading">ACCOUNT DEPARTMENT</h3>
        <div>
            <div class="float-left">
                <h2 class="text">Date: <span>9/6/2022</span></h2>
            </div>
            <div class="float-right">
                <h2 class="text">Receipt No. <span>125</span></h2>
            </div>
        </div>
        <div class="clear-both" style="padding-top:20px;"></div>
        <h2 class="text">Customer's Name: <span class="span">Asim Riaz</span></h2>
        <div class="clear-both"></div>
        <div>
            <div class="float-left" style="width:48%;">
                <h2 class="text">Plot No. <span class="span">A - 69</span></h2>
            </div>
            <div class="float-right" style="width:48%; text-align:left;">
                <h2 class="text">Amount received: <span class="span">120,000</span></h2>
            </div>
        </div>
        <div class="clear-both"></div>
        <h2 class="text">Amount in word: <span class="span">one Lac and Twenty Thousand</span></h2>
        <div class="clear-both"></div>
        <div>
            <div class="float-left" style="width:48%;">
                <h2 class="text">Remaining Amount: <span class="span">85,000</span></h2>
            </div>
            <div class="float-right" style="width:48%; text-align:left;">
                <h2 class="text">Installment No. <span class="span">Downpayment</span></h2>
            </div>
        </div>
        <div class="clear-both"></div>
    </body>
</html>
