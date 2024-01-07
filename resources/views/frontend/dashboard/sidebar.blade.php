<div class="col-md-4 col-lg-3 side_menu_bg">
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
                        A Fundraiser</a>
                </li>
                <li
                    class="{{ request()->routeIs(['fundraiser.post.index', 'fundraiser.post.edit', 'fundraiser.post.show']) ? 'active' : '' }}">
                    <a href="{{ route('fundraiser.post.index') }}"><i class="fa-solid fa-envelopes-bulk"></i>My
                        Fundraisers</a>
                </li>
                <li class="{{ request()->routeIs('fundraiser.post.message.*') ? 'active' : '' }}">
                    <a href="{{ route('fundraiser.post.message.index') }}"><i class="fa-regular fa-envelope"></i>Updates</a>
                </li>
                <li class="{{ request()->routeIs('fundraiser.comment.*') ? 'active' : '' }}">
                    <a href="{{ route('fundraiser.comment.index') }}"><i class="fas fa-comments"></i>Comments</a>
                </li>
                <li class="{{ request()->routeIs('donate.index') ? 'active' : '' }}">
                    <a href="{{ route('donate.index') }}"><i class="fa-solid fa-table-list"></i>Donations I Made</a>
                </li>
                <li class="{{ request()->routeIs('withdrawals.*') ? 'active' : '' }}">
                    <a href="{{ route('withdrawals.index') }}">
                        <i class="fas fa-money-bill-trend-up"></i>Payouts</a>
                </li>
            @endrole

            <li class="{{ request()->routeIs('wishlist.index') ? 'active' : '' }}">
                <a href="{{ route('wishlist.index') }}"><i class="fas fa-heart"></i>Saved Fundraisers</a>
            </li>

            <li class="{{ request()->routeIs('user.profile.edit') ? 'active' : '' }}">
                <a href="{{ route('user.profile.edit') }}"><i class="fas fa-user"></i>My Profile</a>
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
            <li class="px-2 mt-2">

                @if (auth()->user()->hasRole('donor'))
                    @if (auth()->user()->hasRole('fundraiser') &&
                            auth()->user()->hasRole('donor'))
                    @else
                        <a href="{{ route('make.role.fundraiser') }}" class="btn btn-success btn-sm text-white"><i
                                class="fa-regular fa-square-plus"></i> Become a
                            Fundraiser</a>
                    @endif

                @endif
                @if (auth()->user()->hasRole('fundraiser'))
                    @if (auth()->user()->hasRole('fundraiser') &&
                            auth()->user()->hasRole('donor'))
                    @else
                        <a href="{{ route('make.role.donor') }}" class="btn btn-success btn-sm text-white"><i
                                class="fa-regular fa-square-plus"></i> Become a Donor</a>
                    @endif

                @endif
            </li>
        </ul>

    </div>
</div>
