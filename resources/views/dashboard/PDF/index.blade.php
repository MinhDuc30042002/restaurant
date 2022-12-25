<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @font-face {
            font-family: 'BeVietnamPro';
            font-weight: normal;
            font-style: italic;
            font-variant: normal;
            src: url({{ storage_path('fonts/BeVietnamPro-Italic.ttf') }});
        }

        @font-face {
            font-family: 'BeVietnamPro';
            font-weight: normal;
            font-style: Bold;
            font-variant: normal;
            src: url({{ storage_path('fonts/BeVietnamPro-Bold.ttf') }});
        }

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5D6975;
            text-decoration: underline;
        }

        body {
            position: relative;
            width: 21cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;
            font-family: 'BeVietnamPro';
            font-size: 12px;
            width: 100%;
        }

        header {
            padding: 10px 0;
            margin-bottom: 30px;
        }

        #logo {
            text-align: center;
            margin-bottom: 10px;
        }

        #logo img {
            width: 90px;
        }

        h1 {
            border-top: 1px solid #5D6975;
            border-bottom: 1px solid #5D6975;
            color: #5D6975;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 20px 0;
            background: url(dimension.png);
        }

        #project {
            float: left;
        }

        #project span {
            color: #5D6975;
            text-align: right;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;
        }

        #company {
            float: right;
            text-align: right;
        }

        #project div,
        #company div {
            white-space: nowrap;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #F5F5F5;
        }

        table th,
        table td {
            text-align: center;
        }

        table th {
            padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;
            font-weight: normal;
        }

        table .service,
        table .desc {
            text-align: left;
        }

        table td {
            padding: 20px;
            text-align: right;
        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
            text-align: center;
        }

        table td.grand {
            border-top: 1px solid #5D6975;
            ;
        }

        #notices .notice {
            color: #5D6975;
            font-size: 1.2em;
        }

        footer {
            color: #5D6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #C1CED9;
            padding: 8px 0;
            text-align: center;
        }
    </style>
</head>

<body>

    <body>
        <header class="clearfix">
            <div id="logo">
                <img src="https://ap.poly.edu.vn/images/logo.png">
            </div>

            <h1>Hóa đơn #{{ $order1->id }}</h1>

            <div id="company" class="clearfix">
                @foreach ($partner2 as $partner)
                    <div><strong>Bill to:</strong></div>
                    <div>{{ $partner->name }}</div>
                    <div>{{ $partner->phone }}</div>
                    <div>{{ $partner->email }}</div>
                @endforeach
            </div>
            <div id="project">
                <div><span>Nhà hàng:</span> Fpoly Restaurant</div>
                <div><span>Địa chỉ</span> Toà nhà Innovation, lô 24, <br />&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;Công viên phần mềm
                    Quang Trung, <br />&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;Quận 12, Hồ Chí Minh</div>
                <div><span>Email</span> <a href="mailto:CSKH.hcm@gmail.com">CSKH.hcm@gmail.com</a></div>
            </div>
        </header>
        <main>
            <table>
                <thead>
                    <tr>
                        <th class="service">STT</th>
                        <th class="desc">Tên món ăn</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detaiOrder as $detail)
                        <tr>
                            <td class="service">{{ $detail->id }}</td>
                            <td class="desc">{{ $detail->food_name }}</td>
                            <td class="unit">{{ $detail->food_price }}</td>
                            <td class="qty">{{ $detail->quantity }}</td>
                            <td class="total">{{ $detail->amount }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4">Tổng tạm:</td>
                        <td class="total">{{ $sub_total }}</td>
                    </tr>
                    <tr>
                        <td colspan="4">Thuế:</td>
                        <td class="total">10%</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="grand total" style="text-align: right">Tổng tất cả:</td>
                        <td class="grand total">{{ $total }}</td>
                    </tr>
                </tbody>
            </table>
        </main>
    </body>
</body>

</html>
