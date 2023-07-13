<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasklist</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    
    <!-- CSS -->
    <link rel="stylesheet" href="assets/styles/navbar.css">
    <link rel="stylesheet" href="assets/styles/tasklist.css">

</head>

<body>
    <main class="container">
        <nav class="sidebar">
            <div class="logo">
                <img src="assets/img/logo.png" alt="logo" class="logoimg">
                <h1>Tasklist</h1>
            </div>
            <div class="menu">
                <a href="<?php echo base_url('overview')?>"><i class="fa fa-home"></i></a>
                <a href="<?php echo base_url('tasklist')?>" class="active"><i class="fa-solid fa-square-check"></i></a>
                <a href="<?php echo base_url('contact')?>"><i class="fa fa-user"></i></a>
                <a href="<?php echo base_url('home')?>"><i class="fa-solid fa-right-from-bracket"></i></a>
            </div>
        </nav>
        <div class="content">
            <div class="header">
                <img src="assets/img/logo.png" alt="logo" class="logoimg">
                <h1>Tasklist</h1>
                <div class="openMenu" id="menuIcon">
                    <i class="fa-solid fa-bars"></i>
                    <ul class="nav-list">
                        <li><a href="<?php echo base_url('overview')?>"><i class="fa fa-home"></i></a></li>
                        <li><a href="<?php echo base_url('tasklist')?>" class="active"><i class="fa-solid fa-square-check"></i></a></li>
                        <li><a href="<?php echo base_url('contact')?>"><i class="fa fa-user"></i></a></li>
                        <li><a href="<?php echo base_url('home')?>"><i class="fa-solid fa-right-from-bracket"></i></a></li>
                    </ul>
                </div>
                
                
                <div class="btn-tasklist">
                    <button class="btn show-done"><i class="fa-solid fa-square-check"></i>Done</button>
                    <button class="btn show-delete"><i class="fa-sharp fa-solid fa-trash"></i>Delete</button>
                    <button class="btn show-add"><i class="fa-solid fa-square-plus"></i>Add</button>

                </div>
            </div>
            <hr/>

            <div class="tasklist">
                <div class="btn-content" id="btnPage">
                    <button onclick="getTask('incomplete',1)" class="btn active">All task </button>
                    <button onclick="getTask('due_today',1)" class="btn">Due today</button>
                    <button onclick="getTask('done',1)" class="btn">Done</button>
                </div>
                <div class="btn-incontent">
                    <button onclick="showDropdown()" class="dropbtn">All Task</button>
                        <div id="myDropdown" class="dropdown-content">
                            <button onclick="getTask('incomplete',1)">All Task</button>
                            <button onclick="getTask('due_today',1)" >Due Today</button>
                            <button onclick="getTask('done',1)">Done</button>
                        </div>
                </div>
                <div class="btn-fnTasklist">
                    <button class="btn show-done"><i class="fa-solid fa-square-check"></i>Done</button>
                    <button class="btn show-delete"><i class="fa-sharp fa-solid fa-trash"></i>Delete</button>
                    <button class="btn show-add"><i class="fa-solid fa-square-plus"></i>Add</button>
                </div>


            </div>
            <div class="tasklist-content">
                
            </div>

            <!-- popups -->
            <!-- done tasks -->
            <section class="popup done-popup">
                <div class="alert-box">
                    <i class="fa-regular fa-circle-question"></i>
                    <h1>Are you sure?</h1>
                    <div class="alert-text">
                        <p>Make sure that you really done the task.</p>
                        <p>You can't make change when your task is done.</p>
                    </div>
                </div>
                <div class="popup-btn">
                    <button class="btn" id="confirm-done">Yes</button>
                    <button class="btn btn-cancel">Cancel</button>
                </div>
            </section>
            
            <!-- delete tasks -->
            <section class="popup delete-popup">
                <div class="alert-box">
                    <i class="fa-regular fa-circle-question"></i>
                    <h1>Are you sure?</h1>
                    <div class="alert-text">
                        <p>You will not able to access this task again.</p>
                    </div>
                </div>
                <div class="popup-btn">
                    <button class="btn" id="confirm-delete"><i class="fa-sharp fa-solid fa-trash"></i>Delete</button>
                    <button class="btn btn-cancel">Cancel</button>
                </div>
            </section>

            <!-- add tasks -->
            <section class="popup add-popup">
                <div class="form">
                    <div class="form-element">
                        <label for="task-title">Task Title:</label>
                        <input type="text" name="title1" id="task-title" placeholder="Enter your task title">
                    </div>
                    <div class="form-element">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" placeholder="Enter your task description"></textarea>
                    </div>
                    <div class="form-element">
                        <label for="deadline">Deadline:</label>
                        <input type="text" id="deadline" placeholder="Enter your task deadline">
                    </div>
                </div>
                <div class="popup-btn">
                    <button class="btn" id="btn-add" onclick="addTaskElement()"><i class="fa-solid fa-square-plus"></i>Add</button>
                    <button class="btn btn-cancel">Cancel</button>
                </div> 
            </section>

            <!-- edit tasks -->
            <section class="popup edit-popup">
                <div class="form">
                    <div class="form-element">
                        <label for="task-title">Task Title:</label>
                        <input type="text" name="title" id="task-title-edit" placeholder="Enter your task title">
                    </div>
                    <div class="form-element">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description-edit" placeholder="Enter your task description"></textarea>
                    </div>
                    <div class="form-element">
                        <label for="deadline">Deadline:</label>
                        <input type="text" id="deadline-edit" placeholder="Enter your task deadline">
                    </div>
                </div>
                <div class="popup-btn">
                    <button class="btn confirm-edit"><i class="fa-solid fa-pen-to-square"></i>Edit</button>
                    <button class="btn btn-cancel">Cancel</button>
                </div> 
            </section>

        </div>
    </main>


    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="assets/js/tasklistPage/gettask.js"></script>
    <script src="assets/js/tasklistPage/onpage_tasklist.js"></script>
    <script src="assets/js/tasklistPage/dropdown.js"></script>
    <script src="assets/js/sidebar.js"></script>

    <!-- CRUD JS -->
    <script src="assets/js/tasklistPage/crud/add_tasks.js"></script>
    
</body>

</html>
