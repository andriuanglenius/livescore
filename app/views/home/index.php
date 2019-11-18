<!-- Data array from link -->
<?php //echo $data['jsn']; 
?>


<!DOCTYPE html>
<html>

<head>
    <title>Match</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>



    <div class="container text-center mt-3 pb-3">
        <h1 class="text-center">Data Match</h1>
    </div>
    <div class="container" id="daftar-json">
        <div class="row">
            <div class="col">
                <table border="1" id="table-json" class="table-json table-striped text-center" width="100%">
                    <thead>
                        <tr>
                            <th class="time">Time</th>
                            <th class="tanggal">Tanggal</th>
                            <th class="home" id="home">Home</th>
                            <th class="score">Score</th>
                            <th class="away">Away</th>
                        </tr>
                    </thead>
                    <tbody id="table-body-json">

                    </tbody>



                </table>

            </div>
        </div>

    </div>

    <script>
        function ambilDataJson() {
            var html = "";
            //var dataJson = 
            //console.log(dataJson);
            $.ajax({
                url: 'Home/getData',

                //data: dataJson,
                type: 'GET',
                dataType: 'JSON',

                success: function(result, i) {
                    //console.log(result);
                    result.sort(sortFunction);

                    for (var i in result) {
                        //var homee = result[i].home;
                        //console.log(result[i]);
                        //var title = result[i].title;
                        //console.log(homee);
                        var homee = result[i].home;
                        // html += "<tr><td>" + result[i].userId + "</td><td>" + result[i].id + "</td><td>" + title + "</td><td>" + result[i].body + "</td></tr>";
                        html += "<tr><td>" + result[i].time + "</td><td>" + result[i].tanggal + "</td><td>" + homee + "</td><td>" + result[i].score + "</td><td>" + result[i].away + "</td></tr>";
                    }
                    document.getElementById("table-body-json").innerHTML = html;
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        ambilDataJson();


        function sortFunction(a, b) {

            if (a.tanggal == b.tanggal) {

                if (a.time == b.time) {

                    return (a.home < b.home) ? -1 : 1;
                } else {
                    return (a.time < b.time) ? -1 : 1;
                }
            } else {
                return (a.tanggal < b.tanggal) ? -1 : 1;
            }
        }
    </script>
</body>

</html>