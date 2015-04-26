
<?php
include('login/seguridad.php');
 
$SaveJSONPath = '../Json/'.$_SESSION['Dept'].'_'.$_REQUEST['revision'].'.json';
$LoadJSONpath = 'Json/'.$_SESSION['Dept'].'_'.$_REQUEST['revision'].'.json'; 
$edit = 0;       //0 view and 1 edit
$copy = false;
$delete = false;
$approve = false;
$send = false;
if ($_SESSION['role'] == 'approver' and $_REQUEST['status'] == 'toapprove'){$approve = true;}
if ($_SESSION['role'] == 'admin'){$copy = true; $edit = 1;}
if ($_REQUEST['status'] == 'approved' or $_REQUEST['status'] == 'toapprove') $edit = 0;
if ($_SESSION['role'] == 'admin' and $_REQUEST['status'] != 'approved')$delete = true;
if ($_SESSION['role'] == 'admin' and $_REQUEST['status'] == 'draft')$send = true;


 

?>
<!DOCTYPE html> 
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Foxconn Org Chart</title>
    <link rel="stylesheet" href="js/jquery/ui-lightness/jquery-ui-1.10.2.custom.css" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="js/jquery/jquery-ui-1.10.2.custom.min.js"></script>
    <script  type="text/javascript" src="js/primitives.min.js?219"></script>
    <link href="css/primitives.latest.css?219" media="screen" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/bporgeditor.min.js?2020"></script>
    <script type='text/javascript'>//<![CDATA[ 
        $(window).load(function () {
			$('#msg').html("");
            var chartDiv = $("#basicdiagram"),
                viewButton = $("#view"),
                editorButton = $("#editor"),
                saveButton = $("#save"),
                editor = new primitives.orgeditor.Config();
            
            editor.editMode = <?php echo $edit; ?>; 
			console.log(<?php echo $edit; ?>);
            editor.onSave = function () {
                chartDiv.bpOrgEditor("option");
            }; 

            $.getJSON(<?php echo "'$LoadJSONpath'" ?>, function(data) {
                editor.items = data;
                editorInstance = chartDiv.bpOrgEditor(editor);
                $('div[name=json-button]').css("display","none");
                $('input[name=search]').css({
                    "margin-right":"60px",
                    "height":"35px",
                    "width": "200px"
                });

            });


		saveButton.click(function(){
			var flg = 1;
			a = (JSON.stringify(editor.items));
		$.ajax({
				type:"POST",
				url:"code/create.php",
				data:{"a":a,"revision":<?php echo "'$SaveJSONPath'" ?>},
				success:function(data){
					alert('Se guardo el archivo');
				//$('#msg').html("Exito");
				console.log('Se creo el archivo');
			}
			});
			
		});
			
			
        });//]]>  
    </script>
</head>
<body>
      <div class="container">
        <?php if ($edit == 1 )echo '<a class="btn btn-primary" href="#" id="save" role="button">Save</a>'; ?>
        <?php if ($copy)echo '<a class="btn btn-primary" href="#" id="copy" role="button">Create copy</a>'; ?>
        <?php if ($delete)echo '<a class="btn btn-primary" href="#" id="delete" role="button">Delete</a>'; ?>
        <?php if ($approve)echo '<a class="btn btn-primary" href="#" id="approve" role="button">Approve</a>'; ?>
        <?php if ($send)echo '<a class="btn btn-primary" href="#" id="Send" role="button">Send</a>'; ?>
        <div id='msg'></div>
      </div>
<div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div id="basicdiagram" class="col-md-10" style="height: 600px;" /> 
      </div>    
</div> <!-- /container -->
<?php if ($approve)echo '<!--div id="divcomments" class="container">"<label for="Comment">Commets</label><textarea name="Comment" cols="250" rows="10" id="Comment"></textarea></div-->'; ?>     
</body>
</html>
