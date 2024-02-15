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
                <a href="{{ route('partners.index') }}" >
                    <span class="material-icons-sharp">
                        business
                    </span>
                    <h3>Partners</h3>
                </a>
                <a href="">
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
                <a href="{{ route('projects.index') }}"  class="active">
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
            <h1>Projects</h1>
         
            <div class="recent-orders">
                <h2>All Projects</h2>
                <a href="{{route('projects.create')}}">Add new Project</a>
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                           
                            <th>Partener(s)</th>
                            <th>Artist(s)</th>
                            <th>Requirements</th>
                            <th>budget</th>
                            <th>Starting Date</th>
                            <th>Ending Date</th>
                            <th>Status</th>
                            <th>Action</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
        @foreach($projects as $project)
            <tr>
                <td>{{ $project->title }}</td>
                <td>
                    @foreach($project->partners as $partner)
                        {{ $partner->name }}
                        @unless($loop->last)
                            <br>
                        @endunless
                    @endforeach
                </td>
                <td>
                    @foreach($project->artists as $artist)
                        {{ $artist->full_name }}
                        @unless($loop->last)
                            <br>
                        @endunless
                    @endforeach
                </td>
                <td>{{ $project->requirements }}</td>
                <td>{{ $project->budget }}</td>
                <td>{{ $project->start_date }}</td>
                <td>{{ $project->end_date }}</td>
                <td>
                    @if(array_key_exists($project->status, $project::STATUS_RADIO))
                        {{ $project::STATUS_RADIO[$project->status] }}
                    @else
                        Unknown
                    @endif
                </td>
                <td><a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                    </form></td>
                <td><!-- Add your additional column here --></td>
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

    <!-- <script src="orders.js"></script> -->
    <script src="{{ asset('js/admin.js') }}"></script>
</body>

</html>