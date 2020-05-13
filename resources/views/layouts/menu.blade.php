<li class="{{ Request::is('orders*') ? 'active' : '' }}">
    <a href="{{ route('orders.index') }}"><i class="fa fa-edit"></i><span>Orders</span></a>
</li>

<li class="{{ Request::is('vouchers*') ? 'active' : '' }}">
    <a href="{{ route('vouchers.index') }}"><i class="fa fa-edit"></i><span>Vouchers</span></a>
</li>

