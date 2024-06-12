<!-- resources/views/pdf_view.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>PDF Report</title>
    <style>
        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 100 900;
            src: url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
        }

        body {
            font-family: 'Inter', sans-serif;
            /* background-image: url('image/inspire.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center; */
        }

        .address {
            margin-top: -25px;
            font-size: 13px;
            width: 35%;
            line-height: 2;
        }

        h1 {
            font-size: 48px;
        }

        .bills-table {
            border-collapse: collapse;
            width: 100%;
            border: 0px;
        }

        .bills-table th {
            color: #697183;
            border-top: 2px solid rgb(0, 0, 0);
            border-bottom: 2px solid rgba(0, 0, 0, 0.842);
            padding: 8px 20px 8px 100px;
        }

        .bills-table td {
            padding: 8px 20px 8px 100px;
            font-weight: 700;
        }

        .bills-table th,
        .bills-table td {
            text-align: left;
        }

        .stamp-div .stamp {
            border: 1px solid black;
            width: 200px;
            margin-left: 480px;
            margin-top: 70px;
            padding: 5px 10px
        }

        .stamp-div .stamp h1 {
            font-size: 15px;
        }

        .total {
            color: black;
            margin-left: 50px
        }

        .total-title {
            font-size: 30px;
            margin: 50px 30px 0px 210px;
            color: #697183;
        }

        .info-table {
            width: 100%;
            margin-bottom: 40px;
            margin-top: 30px;
        }

        .info-table td:nth-child(3) {
            font-weight: 700;
        }

        .info-table td {
            padding: 5px 10px
        }

        .bill-to {
            color: #697183;
            font-weight: 400;
            font-size: 20px;
        }

        .inspiresign {
            width: ;
            border-top: 1px solid black;
            margin-right: 270px;
            padding: 5px 30px;
        }

        .tenantsign {
            padding: 5px 30px;
            border-top: 1px solid black;
        }

        .sign {
            margin-top: 200px;
        }
    </style>
</head>

<body>
    <h1>BILLS DUE</h1>
    <p class="address">National University – Laguna
        Km.53, Pan Philippine Highway,
        Brgy. Milagrosa, Calamba City,
        Laguna 4027
    </p>
    <table class="info-table">
        <tr>
            <td class="bill-to">BILL TO:</td>
            <td>RECEIPT NO:</td>
            <td>ID-{{ $data->receipt }}</td>
        </tr>
        <tr>
            <td>{{ $tenant->name }}</td>
            <td>RECEIPT DATE:</td>
            <td>{{ $data->receiptdate }}</td>
        </tr>
        <tr>
            <td>{{ $tenant->unit }}</td>
            <td>DUE DATE:</td>
            <td>{{ $data->due }}</td>
        </tr>
    </table>

    <table class="bills-table">
        <thead>
            <tr>
                <th>BILLS</th>
                <th>AMOUNT</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>RENT</td>
                <td>{{ $data->rent }}.00</td>
            </tr>
            <tr>
                <td>WATER</td>
                <td>{{ $data->water }}.00</td>
            </tr>
            <tr>
                <td>INTERNET</td>
                <td>{{ $data->internet }}.00</td>
            </tr>
            <tr>
                <td>ELECTRICITY</td>
                <td>{{ $data->electricity }}.00</td>
            </tr>
        </tbody>
    </table>

    <div class="total-div">
        <h1 class="total-title">TOTAL: <span class="total">{{ $data->total }}.00</span></h1>
    </div>

    @php
        $date = date('m-d-y');
        $time = date('g:i a');
    @endphp
    <div class="stamp-div">
        <div class="stamp">
            <h1>DATE ISSUED: {{ $date }}</h1>
            <h1>TIME PRINTED: {{ $time }}</h2>
        </div>
    </div>
    <div class="sign d-flex" style="display: flex">
        <p> <span class="inspiresign">InspireManagement</span> <span class="tenantsign">{{ $tenant->name }}</span></p>
    </div>
</body>

</html>
