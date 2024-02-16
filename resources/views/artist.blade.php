<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <title> Artist | ArtsyCollabs</title>

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
                <a href="{{ route('artist') }}" class="active">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Projects</h3>
                </a>
                
                <a href="{{ route('artist.projects') }}">
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3>My Projects</h3>
                </a>

                <a href="users.html">
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>profile</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        settings
                    </span>
                    <h3>Settings</h3>
                </a>
                <a href="{{ route('logout') }}">
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
            <!-- Analyses -->
            <div class="analyse">
               

                @foreach($projects as $project)
                <div class="sales">
                    <img src="image here" alt="project image" style="height: 130px;">
                    <br>
                    <h1>{{ $project->title }}</h1>
                    <p>{{ $project->description }}</p>
                    <h4>Requirements</h4>
                    <p>{{ $project->requirements }}</p>
                    <br>
                    <a href="{{ route('project.details', ['id' => $project->id]) }}">Explore Details <i class="fa-solid fa-link"></i></a>
                </div>
                @endforeach



                

                
               
                
                
                
            </div>
            <!-- End of Analyses -->

            

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
                        <p>Hey, <b>{{ auth()->user()->full_name }}</b></p>
                        <small class="text-muted">Artist</small>
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

    <script src="orders.js"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>

</html>