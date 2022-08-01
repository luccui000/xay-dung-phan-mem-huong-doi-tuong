<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Thông tin đơn hàng</title>
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            /*font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;*/
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
        .last {
            text-align: right;
        }
        .invoice-box table tr td:nth-child(2) {
            text-align: left;
        }
        .invoice-box table tr td:nth-child(3) {
            text-align: center;
        }
        .total {
            text-align: right;
        }
        .total.final {
            font-size: 20px;
            color: red;
        }
        .invoice-info {
            text-align: right;
        }
    </style>
</head>

<body>
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="4">
                <table>
                    <tr>
                        <td class="title">
                            <img src="<?php echo $logo; ?>" style="width: 100%; max-width: 300px" />
                        </td>
                        <td></td>
                        <td></td>
                        <td class="invoice-info">
                            Mã đơn hàng #<?php echo $invoice->ma_don_hang; ?><br />
                            Ngày tạo: <?php echo date('d/m/Y', strtotime($invoice->ngay_dat)); ?><br />
                            Ngày  hạn: <?php echo \Carbon\Carbon::createFromDate($invoice->ngay_dat)->addDay(7)->format('d/m/Y') ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="4">
                <table>
                    <tr>
                        <td>
                            <?php echo $seller->name; ?><br />
                            <?php echo $seller->address; ?><br />
                            <?php echo $seller->phone; ?><br />
                        </td>
                        <td></td>
                        <td></td>
                        <td class="invoice-info">
                            <?php echo sprintf("%s %s", $invoice->ho_nguoi_dat, $invoice->ten_nguoi_dat);  ?><br />
                            <?php echo $invoice->dia_chi; ?><br />
                            <?php echo $invoice->so_dien_thoai; ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td>Phương thức thanh toán</td>
            <td></td>
            <td></td>
            <td class="last">#</td>
        </tr>

        <tr class="details">
            <td>Loại thanh toán</td>
            <td></td>
            <td></td>
            <td><?php echo $invoice->phuong_thuc_thanh_toan; ?></td>
        </tr>

        <tr class="heading">
            <td>Tên sản phẩm</td>
            <td>Đơn giá</td>
            <td>Số lượng</td>
            <td class="last">Thành tiền</td>
        </tr>
        <?php foreach ($detail as $item) { ?>
            <tr class="item">
                <td><?php echo $item->ten_san_pham; ?></td>
                <td><?php echo vnmoney($item->gia); ?></td>
                <td><?php echo $item->so_luong; ?></td>
                <td class="last"><?php echo vnmoney($item->thanh_tien); ?></td>
            </tr>
        <?php } ?>
        <tr class="sub-total">
            <td class="total" colspan="4">Thành tiền: <?php echo vnmoney($invoice->thanh_tien); ?></td>
        </tr>
        <tr>
            <td class="total" colspan="4">Phí vận chuyển: <?php echo vnmoney($invoice->phi_giao_hang); ?></td>
        </tr>
        <tr>
            <td class="total final" colspan="4">Tổng tiền: <?php echo vnmoney($invoice->tong_tien); ?></td>
        </tr>
    </table>
</div>
</body>
</html>
