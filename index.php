<html>

<head>
    <title>TODO LIST </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/bootstrp/bootstrap.min.css" />
    <link rel="stylesheet" href="asset/css/style.min.css" />
    <link rel="stylesheet" href="asset/css/fontawesome/css/font-awesome.css" />
    <script src="asset/js/jquery.js"></script>
    <script src="asset/js/bootstrap/bootstrap.min.js"></script>
    <script src="asset/js/js.min.js"></script>
</head>
<script>
    $(document).ready(function(){
        get_events('ajax.php','.events-border');
    })
</script>
<body>
    <div class="container">
        <div class="row justify-content-center margin-top-50">
            <div class="col-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="input">title</label>
                                    <input type="text" class="form-control add-event" id="input"/>
                                </div>
                            </div>
                            <div class="col-sm">
                               <button type="button" class="btn btn-success btn-submit" onclick="send_input('.add-event','ajax.php','.submit','.events-border')" style="margin-top: 20px"><i class="fa fa-check"></i></button>
                            </div>
                        </div>
                        <div class="row margin-top-50">
                            <div class="events-border">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>