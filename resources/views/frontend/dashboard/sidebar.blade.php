<div class="col-md-4 col-lg-3">
    <div class="mobile_menu_icon d-md-none">
        <i class="fa-solid fa-gear fa-spin"></i>
    </div>
    <div class="account_menu">
        <div class="close_icon d-md-none">&#10007;</div>
        <ul>
            <li class="{{ request()->routeIs('user.dashboard.index') ? 'active' : '' }}">
                <a href="{{ route('user.dashboard.index') }}"><i class="fas fa-dashboard"></i>Dashboard</a>
            </li>
            @role('fundraiser')
                <li class="{{ request()->routeIs('fundraiser.post.create') ? 'active' : '' }}">
                    <a href="{{ route('fundraiser.post.create') }}"><i class="fas fa-hand-holding-heart"></i>Start
                        Fundraising</a>
                </li>
                <li class="{{ request()->routeIs(['fundraiser.post.index', 'fundraiser.post.edit']) ? 'active' : '' }}">
                    <a href="{{ route('fundraiser.post.index') }}"><i class="fas fa-hand-holding-heart"></i>Funding
                        Posts</a>
                </li>
                <li class="{{ request()->routeIs('fundraiser.post.message.*') ? 'active' : '' }}">
                    <a href="{{ route('fundraiser.post.message.index') }}"><i
                            class="fas fa-hand-holding-heart"></i>Fundraiser
                        Message</a>
                </li>
                <li class="{{ request()->routeIs('fundraiser.comment.*') ? 'active' : '' }}">
                    <a href="{{ route('fundraiser.comment.index') }}"><i class="fas fa-comments"></i>Comments</a>
                </li>
            @endrole

            <li class="{{ request()->routeIs('wishlist.index') ? 'active' : '' }}">
                <a href="{{ route('wishlist.index') }}"><i class="fas fa-heart"></i>Wishlists</a>
            </li>
            <li>
                <a href="#"><i class="fas fa-hand-holding-heart"></i>Donar List</a>
            </li>
            <li>
                <a href="#"> <i class="fas fa-money-bill-1"></i> Donation List </a>
            </li>
            <li>
                <a href="withdraw.html">
                    <i class="fas fa-money-bill-trend-up"></i> Withdrawals</a>
            </li>
            <li class="{{ request()->routeIs('user.profile.edit') ? 'active' : '' }}">
                <a href="{{ route('user.profile.edit') }}"><i class="fas fa-user"></i>Profile</a>
            </li>
            <li class="{{ request()->routeIs('account.setting.*') ? 'active' : '' }}">
                <a href="{{ route('account.setting.edit') }}">
                    <i class="fas fa-cog"></i>Account Setting</a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                      this.closest('form').submit();"><i
                            class="fas fa-sign-out"></i> Sign Out</a>

                </form>
            </li>
        </ul>

    </div>
</div>
