<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<style>
</style>
<div style="max-width: 90mm; margin: 50px auto 0 auto;">
    <div class="row mb-3">
        <div class="col-6">
            <address>
                <strong>Receipt</strong><br>
            </address>
        </div>
        <div class="col-6 text-end">
            <p class="mb-2">
                <em>Date: {{date('m/d/Y')}}</em>
            </p>
            <p>
                <em>Receipt #: {{time()}}</em>
            </p>
        </div>
    </div>
    <div class="row">
        <table class="table table-hover" id="invoice_table">
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Currency</th>
                    <th>Paid</th>
                    <th>Received</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="customer_name"></td>
                    <td class="transactio_currency"></td>
                    <td class="transactio_paid"></td>
                    <td class="transactio_received"></td>
                </tr>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>
</div>