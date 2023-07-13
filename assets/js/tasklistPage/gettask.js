getTask('incomplete');

function getTask(status){
    var user_id = localStorage.getItem('user_id');
    if(status == "incomplete"){
        $.ajax({
            url: "http://127.0.0.1/tasklist/api/task/getInCompleteTasksByUserId",
            method: "GET",
            data: { user_id: user_id
            },
            dataType: "json",
            success: function(data){
                
                returnAllTask(data);
                checkboxTask();
                popup();
                get_task_edit();
                edit_task();

            }
        })}
    else if(status == "done"){
        $.ajax({
            url: "http://127.0.0.1/tasklist/api/task/getDoneTasksByUserId",
            method: "GET",
            data: { user_id: user_id
            },
            dataType: "json",
            success: function(data){
                returnAllTask(data);
                checkboxTask();
                popup();
                get_task_edit();
                edit_task();

            }
        })
    }
    else if(status == "due_today"){
        $.ajax({
            url: "http://127.0.0.1/tasklist/api/task/getInCompleteTasksByUserId",
            method: "GET",
            data: { user_id: user_id
            },
            dataType: "json",
            success: function(data){
                data['data'] = sortTask(data);
                returnAllTask(data);
                checkboxTask();
                popup();
                get_task_edit();
                edit_task();

            }
        })
    }
    
}
    // sort task by due date in today
function sortTask(data){
    var task_today = []
    for (var i = 0 ;i<data['data'].length;i++){
        var taskData = data['data'][i];
        if (taskIsLate(taskData['due_date']) == "equal"){
            task_today.push(taskData);
        }
    }
    return task_today;
}


function returnAllTask(data){
    // get main element to append task list
    var tasklistContentElement = document.querySelector(".tasklist-content");
    // clear all task list
    tasklistContentElement.innerHTML = "";
    // loop to get all task

    for (var i = 0 ;i<data['data'].length;i++){
        var taskData = data['data'][i];
        var card_task = document.createElement("div");

        if(taskData['status'] == "incomplete"){
            if(taskIsLate(taskData['due_date']) == true){
                card_task.setAttribute("class","card-task late");
            }
            else{
                card_task.setAttribute("class","card-task in-progress");
            }
        }else if (taskData['status'] == 'complete') {
            card_task.setAttribute("class","card-task done");
        }

        var task = document.createElement("div");
        task.setAttribute("class","task");

            var head_task = document.createElement("div");
            head_task.setAttribute("class","head-task");
            head_task.setAttribute("id","clickShowDetail");

                var checkbox = document.createElement("input");
                checkbox.setAttribute("type","checkbox");
                checkbox.setAttribute("class","checkbox");
                checkbox.setAttribute("id","Task1");
                checkbox.setAttribute("value",taskData['id']);

                var test_h2 = document.createElement("h2");
                test_h2.setAttribute("id","task-"+(i+1));

                test_h2.innerHTML = taskData['title'];

            head_task.appendChild(checkbox);
            head_task.appendChild(test_h2);

            var tail_task = document.createElement("div");
            tail_task.setAttribute("class","tail-task");
                var duedate = document.createElement("div");
                duedate.setAttribute("class","duedate");
                    var calendar = document.createElement("i");
                    calendar.setAttribute("class","fa-solid fa-calendar");
                    var p_duedate = document.createElement("p");
                    p_duedate.innerHTML = "Due: "+taskData['due_date'];
                duedate.appendChild(calendar);
                duedate.appendChild(p_duedate);
                var btn_edit = document.createElement("button");
                btn_edit.setAttribute("class","btn-edit");
                btn_edit.setAttribute("value",taskData['id']);
                    var pen = document.createElement("i");
                    pen.setAttribute("class","fa-solid fa-pen-to-square");
                    var p_edit = document.createElement("p");
                    p_edit.innerHTML = "edit";
                btn_edit.appendChild(pen);
                btn_edit.appendChild(p_edit);
            tail_task.appendChild(duedate);
            tail_task.appendChild(btn_edit);
        task.appendChild(head_task);
        task.appendChild(tail_task);

        var showdetail = document.createElement("div");
        if(taskData['status'] == "incomplete"){
            if(taskIsLate(taskData['due_date']) == true){
                showdetail.setAttribute("class","showdetail late");
                btn_edit.setAttribute("class","btn-edit late");
            }
            else{
                showdetail.setAttribute("class","showdetail in-progress");
                btn_edit.setAttribute("class","btn-edit in-progress");
            }
        }else if (taskData['status'] == 'complete') {
            showdetail.setAttribute("class","showdetail done");
            btn_edit.setAttribute("class","btn-edit done");
        }
        showdetail.setAttribute("id","detail-"+(i+1));
            var h3 = document.createElement("h3");
            h3.innerHTML = "Description";
            var p = document.createElement("p");
            p.innerHTML = taskData['description'];
        showdetail.appendChild(h3);
        showdetail.appendChild(p);
        showdetail.setAttribute("style","display:none");
        card_task.appendChild(task);
        card_task.appendChild(showdetail);

        tasklistContentElement.appendChild(card_task);

    }

    //add event listener to show detail 
    const numCards = data['data'].length;
    const clickShowDetail = [];
    const showDetail = [];
    let display = [];

    for (let i = 1; i <= numCards; i++) {
        clickShowDetail[i] = document.getElementById(`task-${i}`);
        showDetail[i] = document.getElementById(`detail-${i}`);
        display[i] = 1;

        clickShowDetail[i].addEventListener('click', function(){
            if(display[i] == 1){
                showDetail[i].style.display = "block";
                display[i] = 0;
            }else{
                showDetail[i].style.display = "none";
                display[i] = 1;
            }
        });
}
}
// function to check if task is late
function taskIsLate(date){
    const date1 = new Date(date);
    const date2 = new Date();
    date2.setHours(0,0,0,0);
    if(date1.getTime()<date2.getTime()){
        return true;
    }else if (date1.getTime()==date2.getTime()){
        return "equal"
    }
    else{
        return false;
    }
}   


function popup(){
    var popups = document.querySelectorAll(".popup");
    var cancelBtns = document.querySelectorAll(".btn-cancel");

    // checking if any popup is activated

    function isPopupActive() {
    for (let i = 0; i < popups.length; i++) {   
        if (popups[i].classList.contains('active')) {
            return true;
        };
    };
    return false;
    }

    // adding popups

    function addPopupEvent(btn, popup) {
    var btns = document.querySelectorAll(btn);
    var popupElement = document.querySelector(popup);

    btns.forEach(function(element) {
        element.addEventListener('click', function() {
        if (!isPopupActive()) {
            popupElement.classList.add('active');
        };
        });
    });
    }
    
        
    // removing popups

    cancelBtns.forEach(function(element) {
    element.addEventListener('click', function() {
        popups.forEach(function(e) {
        e.classList.remove('active');
        });
    });
    });

    addPopupEvent('.show-done', '.done-popup');
    addPopupEvent('.show-delete', '.delete-popup');
    addPopupEvent('.show-add', '.add-popup');
    addPopupEvent('.btn-edit', '.edit-popup');

}

function checkboxTask(){
    const valueList = document.getElementsByClassName("valueList");

    const checkboxes = document.querySelectorAll('.checkbox');

    let listTask =[];

    $('#confirm-delete').on('click', function () {deleteTaskElement(listTask)});
    $('#confirm-done').on('click', function () {doneTaskElement(listTask)});
    for(let checkbox of checkboxes) {
        checkbox.addEventListener('click', function() {
            if(this.checked == true) {
                listTask.push(this.value);
            } else {
                //Remove the value from the array
                listTask = listTask.filter(e => e !== this.value);
            }

        })
    }
}



// delete tasks function
function deleteTaskElement(idList) {
    document.querySelector('.delete-popup').classList.remove('active');
    if (idList.length > 0) {
        for (let i in idList) {
            $.ajax({ 
                type: 'GET', 
                url: 'http://127.0.0.1/tasklist/api/task/deleteTaskById', 
                data: { task_id: idList[i] }, 
                dataType: 'json',
                success: function () {
                    idList.shift();
                    location.reload();
                },
                error: function() {
                    location.reload();
                }
            });
        }
    } else {
    }
};



// done tasks function
function doneTaskElement(idList) {
    document.querySelector('.edit-popup').classList.remove('active');
    if (idList.length > 0) {
        for (let i in idList) {
            $.ajax({ 
                type: 'GET', 
                url: 'http://127.0.0.1/tasklist/api/task/doneTaskById', 
                data: { task_id: idList[i] }, 
                dataType: 'json',
                success: function () {
                    idList.shift();
                    location.reload();
                },
                error: function() {
                    location.reload();
                }
            });
        }
    } else {
    }
};


function get_task_edit(){
    $(document).on('click', '.btn-edit', function(){
        var task_id = $(this).val();
        $.ajax({
            url: "http://127.0.0.1/tasklist/api/task/getTaskById/",
            method: "GET",
            data:{task_id: task_id},
            dataType: "json",
            success: function(data){
                $('#task-title-edit').val(data.data.title);
                $('#description-edit').val(data.data.description);
                $('#deadline-edit').val(data.data.due_date);
                $('.confirm-edit').val(data.data.id);
            }
        })
        
    })
    
}

function edit_task(){
    $(document).on('click', '.confirm-edit', function(){
        var title = $('#task-title-edit').val();
        var description = $('#description-edit').val();
        var due_date = $('#deadline-edit').val();
        var task_id = $(this).val();

        var data = {
            title:title,
            description:description,
            due_date:due_date,
            task_id:task_id
        }
        
        if(title == "" || description == "" || due_date == ""){
            alert("Please fill in all the fields");
        }else{
            $.ajax({
                url: "http://127.0.0.1/tasklist/api/task/updateTaskById/",
                method: "POST",
                data:data,
                dataType: "json",
                success: function(data){
                    alert("Task updated successfully");
                    location.reload();
                }
            })
        }
    })

}
