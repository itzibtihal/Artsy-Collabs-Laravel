<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <title> Dashboard | ArtsyCollabs</title>
</head>

<body>

    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="{{ asset('images/logo.png') }}" id="logo-image">
                    <h2>Artsy<span class="danger">Collabs</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="{{ route('dashboard') }}" >
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="{{ route('artists.index') }}" >
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>Artists</h3>
                </a>
                <a href="{{ route('partners.index') }}" class="active">
                    <span class="material-icons-sharp">
                        business
                    </span>
                    <h3>Partners</h3>
                </a>
                <a href="Requests.html">
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
                <a href="{{ route('projects.index') }}">
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3>Projects</h3>
                </a>
                <a href="pendingproject.html">
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
        </aside>
        <!-- End of Sidebar Section -->

        <!-- Main Content -->
        <main>
            <h1>Partner</h1>
            <!-- last 4 Users Section -->
            <div class="new-users">
    <h2>Recent Partners</h2>
    <div class="user-list">
        @foreach($recentPartners as $partner)
            <div class="user">
                <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}">
                <h2>{{ $partner->name }}</h2>
                <!-- You can add more details if needed -->
            </div>
        @endforeach
    </div>
</div>

            <!-- End of 4 Users Section -->
            
            <div class="recent-orders">
                <h2>All Partners</h2>
                <a href="{{route('partners.create')}}">Add new Partner</a>
                <table>
                    <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
    @foreach($partners as $partner)
        <tr>
            <td>
            <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" style="max-width: 50px; max-height: 50px;">
            </td>
            <td>{{ $partner->name }}</td>
            <td>{{ $partner->description }}</td>
            <td>
                <a href="{{ route('partners.edit', $partner->id) }}" class="btn btn-warning btn-sm">
                    <span class="material-icons">edit</span>
                </a>
                <!-- Delete Button -->
                <form action="{{ route('partners.destroy', $partner->id) }}" method="post" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this partner?')">
                        <span class="material-icons">delete</span>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>


                </table>
            </div>

        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>

                <div class="profile">
                    <div class="info">
                        <p>Hey, <b>Reza</b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="images/profile-1.jpg">
                    </div>
                </div>

            </div>
            <!-- End of Nav -->

            <div class="user-profile">
                <div class="logo">
                    <img src="{{ asset('images/logo.png') }}" id="logo-image">
                    <h2>ArtsyCollabs</h2>
                    <p>connexion artistes</p>
                </div>
            </div>

            <div class="reminders">
                <div class="header">
                    <h2>Reminders</h2>
                    <span class="material-icons-sharp">
                        notifications_none
                    </span>
                </div>

                <div class="notification">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            volume_up
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Workshop</h3>
                            <small class="text_muted">
                                08:00 AM - 12:00 PM
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>

                <div class="notification deactive">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            edit
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Workshop</h3>
                            <small class="text_muted">
                                08:00 AM - 12:00 PM
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>

                <div class="notification add-reminder">
                    <div>
                        <span class="material-icons-sharp">
                            add
                        </span>
                        <h3>Add Reminder</h3>
                    </div>
                </div>

            </div>

        </div>


    </div>

  
    <script src="{{ asset('js/admin.js') }}"></script>
</body>

</html>