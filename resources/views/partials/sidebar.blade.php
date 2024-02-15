<div class="sidebar">
    <a href="{{ url('/dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">
        <span class="material-icons-sharp">
            dashboard
        </span>
        <h3>Dashboard</h3>
    </a>
    <a href="{{ url('/users') }}" class="{{ request()->is('users') ? 'active' : '' }}">
        <span class="material-icons-sharp">
            person_outline
        </span>
        <h3>Artists</h3>
    </a>
    <a href="{{ url('/partners') }}" class="{{ request()->is('partners') ? 'active' : '' }}">
        <span class="material-icons-sharp">
            business
        </span>
        <h3>Partners</h3>
    </a>
    <a href="{{ url('/requests') }}" class="{{ request()->is('requests') ? 'active' : '' }}">
        <span class="material-icons-sharp">
            receipt_long
        </span>
        <h3>Requests</h3>
    </a>
    <a href="#">
        <span class="material-icons-sharp">
            mail_outline
        </span>
        <h3>Notif</h3>
        <span class="message-count">27</span>
    </a>
    <a href="{{ url('/projects') }}" class="{{ request()->is('projects') ? 'active' : '' }}">
        <span class="material-icons-sharp">
            inventory
        </span>
        <h3>Projects</h3>
    </a>
    <a href="{{ url('/pendingproject') }}" class="{{ request()->is('pendingproject') ? 'active' : '' }}">
        <span class="material-icons-sharp">
            report_gmailerrorred
        </span>
        <h3>Pending Proj</h3>
    </a>
    <a href="#">
        <span class="material-icons-sharp">
            settings
        </span>
        <h3>Settings</h3>
    </a>
    <a href="#">
        <span class="material-icons-sharp">
            logout
        </span>
        <h3>Logout</h3>
    </a>
</div>
