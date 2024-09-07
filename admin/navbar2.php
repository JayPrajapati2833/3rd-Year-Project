</div>
    </section>

    

    <script>
        <?php
            include "config.php";
            $query = "SELECT * FROM category";
            $result=mysqli_query($conn,$query) or die("Query Failed");
            $row = mysqli_fetch_array($result,MYSQLI_NUM);
            printf ("%s (%s)\n", $row[1], $row[2]);
        ?>
        new Chart("myChart", {
            type: "bar",
            data: {
                labels: <?php echo $row['categoryName']; ?>,
                datasets: [{
                    backgroundColor: barColors,
                    data: <?php echo $row['totalNews']; ?>
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "News"
                }
            }
        });
    </script>

</body>

</html>