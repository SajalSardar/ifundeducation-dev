<div class="mb-3">
    <a href="{{ route('dashboard.fundraiser.campaign.campaign.all') }}"
        class="btn btn-sm btn-success  {{ request()->routeIs('dashboard.fundraiser.campaign.campaign.all') ? 'active' : '' }}">Running</a>
    <a href="{{ route('dashboard.fundraiser.campaign.campaign.pending') }}"
        class="btn btn-sm btn-warning {{ request()->routeIs('dashboard.fundraiser.campaign.campaign.pending') ? 'active' : '' }}">Pending</a>
    <a href="{{ route('dashboard.fundraiser.campaign.campaign.completed') }}" class="btn btn-sm btn-primary">Completed</a>
    <a href="{{ route('dashboard.fundraiser.campaign.campaign.block') }}" class="btn btn-sm btn-danger">Block</a>
    <a href="{{ route('dashboard.fundraiser.campaign.campaign.stop') }}" class="btn btn-sm btn-secondary">Stop by
        fundraiser</a>
    <a href="{{ route('dashboard.fundraiser.campaign.campaign.reviewed') }}" class="btn btn-sm btn-info">Reviewed</a>

</div>
