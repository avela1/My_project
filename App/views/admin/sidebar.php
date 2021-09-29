

<div class="sidebar sidebar-style-2 mt-10" data-background-color="blue">			
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
                <li class="nav-item">
                    <a href="./index" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Home Page</p>
                    </a>	
                </li>

                <li class="nav-item">
                    <a data-toggle="collapse" href="#users">
                        <i class="fas fa-users"></i>
                        <p>Manage User</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="users">
                        <ul class="nav nav-collapse ">
                            <li class="nav-item">
                                <a href="<?= ROOT ?>admin/student_list">
                                    <p>Students List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= ROOT ?>admin/instructor_list">
                                    <p>Instructor List</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                
                <li class="nav-item">
                    <a href="<?= ROOT ?>admin/course_list">
                        <i class="fas fa-book-reader"></i>
                        <p>Manage Courses</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>