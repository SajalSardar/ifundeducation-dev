<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Donation List</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        p {
            padding: 0;
            margin: 0;
            font-size: 14px;
        }

        @page {
            header: page-header;
            footer: page-footer;
            margin-top: 130px;
        }

        .page-break {
            page-break-after: always;
        }

        body {
            font-family: sans-serif;
        }
    </style>
</head>

<body>
    <main>
        <htmlpageheader name="page-header">
            <div style="text-align: center">
                <img width="150" src="{{ asset('frontend/images/theme_options/' . $themeOption->site_logo) }}"
                    alt="">
                <p>{{ @$themeOption->footer_about_title }}</p>
                <p>Mail:{{ @$themeOption->header_email }}</p>
            </div>
        </htmlpageheader>
        <table style="width: 100%" border="1" cellspacing="0" cellpadding="5">
            <thead>
                <tr height="50">
                    <th align="left">#</th>
                    <th align="left">Campaign</th>
                    <th align="left">Donor</th>
                    <th align="left">Date</th>
                    <th align="right">Amount</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach ($all_donars as $all_donar)
                    @php
                        $total += $all_donar->net_balance;
                    @endphp
                    <tr>
                        <td>{{ @$all_donar->id }}</td>
                        <td>
                            <p>{{ @$all_donar->title }}</p>
                        </td>
                        <td>
                            <p>{{ @$all_donar->donar_name ?? 'Guest' }}</p>
                        </td>
                        <td>
                            <p>{{ @$all_donar->created_at->format('M d, Y') }}</p>
                        </td>
                        <td align="right">
                            <p>${{ @$all_donar->net_balance }}</p>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4" align="center"><strong>Total</strong></td>
                    <td align="right"><strong>${{ @$total }}</strong></td>
                </tr>
            </tbody>
        </table>
    </main>
    <htmlpagefooter name="page-footer">
        <div style="text-align: center">
            <p>{{ @$themeOption->copyright_text }}</p>
        </div>
    </htmlpagefooter>
</body>

</html>
