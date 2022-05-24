<div class="row header shadow-sm">
    <div class="col-sm-2 pl-0 text-center header-logo">
        <div class="bg-theme pt-3 pb-2 mb-0">
            <h3 class="logo"><a href="#" class="text-secondary logo">{! $_ENV['APP_NAME']; !} </a></h3>
        </div>
    </div>
    <div class="col-sm-10 header-menu pt-2 pb-0" style="height: 50px !important;">
        <div class="row">
            <div class="col-sm-4 col-8 pl-0">
                    <span class="menu-icon" onclick="toggle_sidebar()">
                        <span id="sidebar-toggle-btn"></span>
                    </span>
                <div class="menu-icon">
                    <a href="#" onclick="toggle_dropdown(this); return false" role="button" class="dropdown-toggle">
                        <i class="fa fa-bell"></i>
                        <span class="badge badge-danger">5</span>
                    </a>
                    <div class="dropdown dropdown-left bg-white shadow border">
                        <a class="dropdown-item" href="#"><strong>Notifications</strong></a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <div class="media">
                                <div class="align-self-center mr-3 rounded-circle notify-icon bg-primary">
                                    <i class="fa fa-bookmark"></i>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0"><strong>Meeting</strong></h6>
                                    <p>You have a meeting by 8:00</p>
                                    <small class="text-success">09:23am</small>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <div class="media">
                                <div class="align-self-center mr-3 rounded-circle notify-icon bg-secondary">
                                    <i class="fa fa-link"></i>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0"><strong>Events</strong></h6>
                                    <p>Launching new programme</p>
                                    <small class="text-success">09:23am</small>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <div class="media">
                                <div class="align-self-center mr-3 rounded-circle notify-icon bg-warning">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0"><strong>Personnel</strong></h6>
                                    <p>New employee arrival</p>
                                    <small class="text-success">09:23am</small>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-center link-all" href="#">See all notifications ></a>
                    </div>
                </div>
            </div>

            <div class="col-sm-8 col-4 text-right flex-header-menu justify-content-end">
                <div class="search-rounded mr-3">
                    <input type="text" class="form-control search-box" placeholder="Enter keywords.." />
                </div>
                <div class="mr-4">
                    <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{! assets('public/admin/img/profile.jpg'); !}" alt="Adam" class="rounded-circle" width="40px" height="40px">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mt-13" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#"><i class="fa fa-user pr-2"></i> Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i class="fa fa-th-list pr-2"></i> Tasks</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i class="fa fa-book pr-2"></i> Projects</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i class="fa fa-power-off pr-2"></i> Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
