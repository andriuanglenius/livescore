<!-- Data array from link -->
<?php //echo $data['jsn']; 
?>


<!DOCTYPE html>
<html>

<head>
    <title>JSON</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>



    <div class="container text-center mt-3 pb-3">
        <h1 class="text-center">Data JSON</h1>
    </div>
    <div class="container" id="daftar-json">
        <div class="row">
            <div class="col">
                <table border="1" id="table-json" class="table-json table-striped text-center" width="100%">
                    <thead>
                        <tr>
                            <th class="time">User Id</th>
                            <th class="tanggal">Id</th>
                            <th class="home" id="home">Title</th>
                            <th class="score">Body</th>
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
                    //url: 'http://localhost/mvc/app/home/index',
                    //url: '../app/models/Json_model.php',
                    //url: '../app/views/home/index.php',
                    //url: 'http://localhost/mvc/app/controllers/home',
                    //url: 'http:localhost/mvc/controllers/home/index',

                    //data: dataJson,
                    type: 'GET',
                    dataType: 'JSON',

                    success: function(result, i) {
                        console.log(result);
                        result.sort(sortFunction);

                        for (var i in result) {
                            //var homee = result[i].home;
                            //console.log(result[i]);
                            var title = result[i].title;
                            //console.log(homee);

                            html += "<tr><td>" + result[i].userId + "</td><td>" + result[i].id + "</td><td>" + title + "</td><td>" + result[i].body + "</td></tr>";

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

                if (a.userId == b.userId) {

                    if (a.id == b.id) {

                        return (a.title < b.title) ? -1 : 1;
                    } else {
                        return (a.id < b.id) ? -1 : 1;
                    }
                } else {
                    return (a.userId < b.userId) ? -1 : 1;
                }
            }
    </script>
</body>

</html>