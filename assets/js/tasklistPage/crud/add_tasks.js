function addTaskElement(){
    var title = document.getElementById("task-title").value; 
    var description = document.getElementById("description").value;
    var due_date = document.getElementById("deadline").value;
    var user_id = localStorage.getItem('user_id');
    var addPopupElement = document.querySelector('.add-popup');
    
    if(title == ""){
        alert("Title is required");
        return;
    }
    if(description == ""){
        alert("Description is required");
        return;
    }
    if(due_date == ""){
        alert("Deadline is required");
        return;
    }
    if(validateDate(due_date) == false){
        alert("Invalid date format");
        return;
    }

    var data = {
        title:title,
        description:description,
        due_date:due_date,
        user_id:user_id
    }

    $.ajax({
        url: "http://127.0.0.1/tasklist/api/task/addTask",
        method:"POST",
        data: data,
        dataType:"json",
        success: function(data){
            document.getElementById("task-title").value = "";
            document.getElementById("description").value = "";
            document.getElementById("deadline").value = "";
            addPopupElement.classList.remove('active');
            location.reload();
        },
        error: function(err){
            console.log(err.responseJSON.message);
            addPopupElement.classList.remove('active');
            location.reload();
        },
    })
}

function validateDate(dateString) {
    var pattern = /^(0[1-9]|1[0-2]|[1-9])-(0[1-9]|1\d|2\d|3[01]|1-9)-(19|20)\d{2}$/;
    return pattern.test(dateString);
}

