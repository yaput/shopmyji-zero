<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>

<body>
    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
    <script>
        var xValues = [];
        var yValues = [];
        var total_per_product = @json($total_incoming_stocks);
        for (const [key, value] of Object.entries(total_per_product)) {
            xValues.push(key);
            yValues.push(value);
        }

        var barColors = ["red", "green"];

        new Chart("myChart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "Current Stock"
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            min: 0,
                            max: 200
                        }
                    }]
                }
            }
        });
    </script>
</body>

</html>
