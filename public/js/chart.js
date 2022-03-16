$(document).ready(function(){
    $.ajax({
        url: "json.php",
        dataType: "json",
    }).done(function(response){
        let data = JSON.stringify(data);
        alert("success");
    }).fail(function(error){
        alert("error");
    })
});


const canvasElement = document.getElementById('myChart');

const config = {
    type: "bar",
    data: {
        labels: ["Bill", "Jeff", "Michael", "Tim", "Zack"],
        datasets: [
            {
                label: "Number of Cookies",
                data: [5, 2, 12, 19, 3],
                backgroundColor: [
                    "rgba(255, 159, 64, 0.2)",
                    "rgba(255, 99, 132, 0.2)",
                    "rgba(54, 162, 235, 0.2)",
                    "rgba(75, 192, 192, 0.2)",
                    "rgba(153, 102, 255, 0.2)",
                ],
                borderColor: [
                    "rgba(255, 159, 64, 1)",
                    "rgba(255, 99, 132, 1)",
                    "rgba(54, 162, 235, 1)",
                    "rgba(75, 192, 192, 1)",
                    "rgba(153, 102, 255, 1)",
                ],
                borderWidth: 1,
            } ,      
        ],
    },
    options: {
        indexAxis: 'y',
    },
};

const myChart = new Chart(canvasElement, config);