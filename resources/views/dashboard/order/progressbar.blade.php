<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-body">
                <ul class="progress-indicator m-4">
                    <li
                        class="{{ $uri == 'dashboard/order/create-identity' ? 'completed' : '' }} {{ $uri == 'dashboard/order/pickfromcustomer' ? 'completed' : '' }} {{ $uri == 'dashboard/order/viewcountperson' ? 'completed' : '' }} {{ $uri == 'dashboard/order/chooseroom' ? 'completed' : '' }} {{ $uri == 'dashboard/order/confirmation' ? 'completed' : '' }} {{ $uri == 'dashboard/order/paydownpayment' ? 'completed' : '' }}">
                        <span class="bubble"></span> Identity Card
                    </li>
                    <li
                        class="{{ $uri == 'dashboard/order/viewcountperson' ? 'completed' : '' }} {{ $uri == 'dashboard/order/chooseroom' ? 'completed' : '' }} {{ $uri == 'dashboard/order/confirmation' ? 'completed' : '' }} {{ $uri == 'dashboard/order/paydownpayment' ? 'completed' : '' }}">
                        <span class="bubble"></span> How many person?
                    </li>
                    <li
                        class="{{ $uri == 'dashboard/order/chooseroom' ? 'completed' : '' }} {{ $uri == 'dashboard/order/confirmation' ? 'completed' : '' }} {{ $uri == 'dashboard/order/paydownpayment' ? 'completed' : '' }}">
                        <span class="bubble"></span> Pick a room
                    </li>
                    <li
                        class="{{ $uri == 'dashboard/order/confirmation' ? 'completed' : '' }} {{ $uri == 'dashboard/order/paydownpayment' ? 'completed' : '' }}">
                        <span class="bubble"></span> Confirmation
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
