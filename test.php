
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Untitled Document</title>
        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js"></script>
        <?php
//        $url = 'http://www.anothersite.com';
//        $htm = file_get_contents($url);
//        echo $htm;
        ?>
        <script>
            $(document).ready(function () {
//                $('#head').load("http://www.w3schools.com/jquery/default.asp .header");

                $.ajax({
                    type: 'GET',
                    xhrFields: {
                        withCredentials: true
                    },
                    url: 'http://blog.jaxxfitness.com/',
                    success: function (response) {
                        alert(response);
//                        var article = $(response).find('.header').html();
//                        $('#head').html(article);
                    }
                });
            });
        </script>

<!--        <script type="text/javascript">
            // Using jQuery
            $.get("http://www.w3schools.com/jquery/default.asp").done(function (data) {
                console.log(data);
            });

            // Using XMLHttpRequest
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "http://www.w3schools.com/jquery/default.asp", true);
            xhr.onload = function () {
                console.log(xhr.responseText);
            };
            xhr.send();
        </script>-->

    </head>

    <body>
        <div id="head">

        </div>

    </body>
</html>
