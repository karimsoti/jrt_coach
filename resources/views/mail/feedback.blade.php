<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" >


        <style>

            .main p{
                line-height: 50px;
                position: relative;
                left:10%;
            }

            .container h1{
                text-align: center;
            }
            .jumbotron{
                border: 3px solid #007bff;
            }
        </style>
    </head>


    <body>

        <div class="container">

            <h1> JRT Feedback </h1>
            <hr>
            <div class=" jumbotron">
                <div class="main">

                    <p><strong>Agent:</strong> {{$data->agent}}</p>
                    <p><strong>JIRA Number: </strong>{{$data->jira_number}}</p>
                    <p><strong>JIRA Status:</strong> {{$data->jira_status}}</p>
                    <p><strong>Feedback:</strong> {{$data->jrt_feedback}}</p>
                </div>
            </div>
        </div>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>

    </body>
</html>
