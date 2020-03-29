<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invoice #</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
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
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="<?= base_url('assets/'); ?>img/logo.png" alt="Logo" style="width:100%; max-width:300px;">
                            </td>

                            <td>
                                Invoice #: <?= $detail['invoice_number']; ?><br>
                                Order #: <?= $detail['order_number']; ?><br>
                                Created: <?= date('d F Y',$detail['invoice_date']); ?><br>
                                Due: <?= date('F d, Y',$detail['due_date']); ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Flower Shop, Inc.<br>
                                203 Fake St. Mountain View<br>
                                San Francisco, CA 12345<br>
                                USA
                            </td>
                            <td>
                                <!-- Acme Corp.<br> -->
                                <?= $detail['name']; ?><br>
                                <?= $detail['email']; ?><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>
                    Payment Method
                </td>
                <td></td>
                <td></td>

                <td>
                    Status
                </td>
            </tr>

            <tr class="details">
                <td>
                    <?= $detail['payment_method']; ?>
                </td>
                <td></td>
                <td></td>
                <td>
                    <?= $detail['payment_status']; ?>
                </td>
            </tr>

            <tr class="heading">
                <td>
                    Item
                </td>

                <td>
                    Price
                </td>

                <td>
                    Qty
                </td>

                <td>
                    Subtotal
                </td>
            </tr>
            <?php foreach($items as $i): ?>
            <tr class="item">
                <td><?= $i['items'] ?></td>
                <td><?= $i['price']; ?></td>
                <td><?= $i['quantity']; ?></td>
                <td><?= $i['subtotal']; ?></td>
            </tr>
            <?php endforeach; ?>
            <tr class="">
                <td colspan="2" align="right"><strong>Total :</strong></td>
                <td></td>
                <td colspan="" align=""><strong><?= $detail['total']; ?></strong></td>
            </tr>
            <tr class="heading">
                <td>Delivery Method</td>
                <td></td>
                <td></td>
                <td>Cost</td>
            </tr>
            <tr class="item">
                <td>Free Shipping</td>
                <td></td>
                <td></td>
                <td>Free</td>
            </tr>
            <tr class="heading">
                <td colspan="4" align="left">Ship To</td>
            </tr>
        <tr class="item">
            <td colspan="" align="">
                <?= $detail['shipping_address']; ?><br>
                <?= $detail['shipping_city']; ?>, 
                <?= $detail['shipping_state']; ?>, 
                <?= $detail['shipping_zipcode']; ?><br>
                <?= $detail['shipping_country']; ?>
            </td>
        </tr>
        </table>
    </div>

</body>

</html>