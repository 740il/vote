<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>CodePen - A Pen by Reddy Prasad</title>
    {{--<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>--}}
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css'>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>
<body>
<!-- partial:index.partial.html -->
               <br>
               <br>
               <br>

<div class="container">
    <div class="poll-options">
        <ul>
            <li><span class="po-number">1</span><input type="text" class="form-control" id="pollOption-1" placeholder="Option 1"></li>
            <li><span class="po-number">2</span><input type="text" class="form-control" id="pollOption-2" placeholder="Option 2"></li>
        </ul>

    </div>
    <div class="text-center">
        <a href="#" class="btn btn-vote" id="addOption"><i class="glyphicon glyphicon-plus"></i> Add Option</a>

    </div>
</div>
<!-- /.container -->



<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>



<script>
    $("#addOption").click(function () {
        var id = $(".poll-options ul").children().length + 1;

        if (id > 5) {
            return; // 5 is maximum
        }
        var qOption = '<li><span class="po-number">'+ id +'</span><input type="text" class="form-control" id="pollOption-'+ id +'" placeholder="Option '+ id +' "><i class="fa fa-times remove-this"></i></li>';
        $(".poll-options ul").append(qOption);
    });

    $(".poll-options").on("click", ".remove-this", function() {
        $(this).closest("li").remove();
    });
</script>
</body>
</html>
