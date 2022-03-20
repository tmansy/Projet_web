var datas = function(){
        var tmp = null;
        $.ajax({
            async: false,
            url: "/json",
            dataType: "json",
        }).done(function(data){
            tmp = data;
            }).fail(function(error){
            console.log("Erreur lors de la requête ajax");
        });
    return tmp;
}();

const canvasElement = document.getElementById('myChart');

const config = {
    type: "bar",
    data: {
        labels: [datas[0]["nomProduit"], datas[1]["nomProduit"], datas[2]["nomProduit"], datas[3]["nomProduit"], datas[4]["nomProduit"]],
        datasets: [
            {
                label: "Produit le plus vendu",
                data: [datas[0]["quantiteProduit"], datas[1]["quantiteProduit"], datas[2]["quantiteProduit"], datas[3]["quantiteProduit"], datas[4]["quantiteProduit"]],
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