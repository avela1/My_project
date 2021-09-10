

<div class="sidebar sidebar-style-2" data-background-color="blue" style="margin-top: 110px">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner ">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="<?= ASSETS ?>/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <?php if(isset($data['user_data'])) : ?>
                        <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                            <span>
                                <span class="user-level"> <?= $data['user_data'][0] -> Name ?></span>
                                <span class="caret"></span>
                            </span>
                        </a>
                    <?php endif; ?>

                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="../login">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=ROOT?>logout">
                                    <span class="link-collapse">LogOut</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item ">
                    <a href="teacher/index" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Home Page</p>
                    </a>	
                </li>
                <li class="nav-item active">
                    <a href="<?= ROOT ?>teacher/course_material">
                        <i class="fas fa-book-reader"></i>
                        <p>Manage Course Material</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=ROOT?>teacher/enr_student" class="collapsed" aria-expanded="false">
                    <i class="fas fa-list-ol"></i>
                        <p>Enrolled Student</p>
                    </a>	
                </li>

                <li class="nav-item">
                    <a href="<?= ROOT ?>teacher/sched_online">
                        <i class="fas fa-video"></i>
                        <p>Manage Online Lecturing</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= ROOT ?>teacher/message">
                        <i class="far fa-envelope"></i>
                        <p>Messages</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a data-toggle="" href="<?= ROOT ?>teacher/forum" class="collapsed" aria-expanded="false">
                        <i class="fas fa-comments"></i>
                        <p>Forums</p>
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
</div>