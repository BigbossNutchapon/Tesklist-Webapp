getAllTask()
function buildChart(data){

var count_done = 0;
var count_inprogress = 0;
var count_today = 0;

for (var i = 0; i < data.length; i++) {
    var taskData = data[i];
    if (taskData['status'] == "incomplete"){
        count_inprogress += 1;
    }
    else{
        count_done += 1;
    }
    if(todayTask(taskData['due_date'])){
        count_today +=1;
    }
}

// doughnut chart's data
var xValues = ["Done", "In progress"];
var yValues = [count_done,count_inprogress];
var total = 0;
var percentages = new Array();

// calculate total
yValues.forEach(sum);
function sum(num) {
    total += num;
};

// calculate percentage for each data
yValues.forEach(percent);
function percent(num) {
    var percentage = Math.round(num / total * 100);
    percentages.push(percentage);
};

var barColors = [
   '#CBE3B3',
   '#95B8F3'
];

// initiate doughnut chart
var doughnutChart = new Chart('myDoughnut', {
    type: 'doughnut',
    data: {
        labels: xValues,
        datasets: [{
            backgroundColor: barColors,
            data: yValues
        }]
    },
    options: {
        title: {
            display: true
        }
    }
});

// send data to the html element
document.getElementById("pending").innerHTML = `${yValues[1]}`;
document.getElementById("done").innerHTML = `${yValues[0]}`;
document.getElementById("tasks").innerHTML = `In progress - ${percentages[1]}%`;
document.getElementById("finished").innerHTML = `Done - ${percentages[0]}%`;
document.getElementById("today").innerHTML = `${count_today}`;
}

function getAllTask(){
    var user_id = localStorage.getItem('user_id');
    $.ajax({
        url: "http://127.0.0.1/tasklist/api/task/getAllTasksByUserId",
        method: "GET",
        data: { user_id: user_id
        },
        dataType: "json",
        success: function(data){
            data = data['data'];

            buildChart(data);
        }
    })
}

function todayTask(date){
    const date1 = new Date(date);
    const date2 = new Date();
    date2.setHours(0,0,0,0);
    if (date1.getTime()==date2.getTime()){
        return true;
    }
    else{
        return false;
    }
}
