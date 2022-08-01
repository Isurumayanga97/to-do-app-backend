<!DOCTYPE html>
<html>
<head>
    <title>Reminder</title>
    <style type="text/css">
        .logo {
            height: 75px;
        }

        .activate-btn {
            width: 150px;
            border: none;
            font-size: 25px;
            font-weight: 500;
            padding: 5px;
            border-radius: 5px;
            background: #ff8a6c;
            color: #ffffff;
            cursor: pointer;
            outline: none !important;
        }

        .activate-btn:hover {
            background: #e76f51;
        }

        .text-center {
            text-align: center;
            text-align: -moz-center;
            text-align: -webkit-center
        }

        .text-right {
            text-align: right;
            text-align: -moz-right;
            text-align: -webkit-right;
        }

        @media only screen and (max-width: 365px) {
            .logo {
                width: 100%;
                height: auto;
            }

            .activate-btn {
                width: 100px;
                font-size: 18px;
                font-weight: 500;
            }
        }
    </style>
</head>
<body style="margin: 0; font-family: 'Open Sans',sans-serif; ">
<div style="background: #ffe2db; max-width: 400px; padding: 25px 15px; position: relative;">

    <div style="padding-top: 15px;">Dear <b>{{$mail_data['name']}}</b>,</div>
    <br>
    <div style="text-align: center;">Your have to task In another hour!
    </div>
    <br>

    <div style="width: 100%" class="text-center">Thank You!</div>
    <br>
</div>
</body>
</html>
