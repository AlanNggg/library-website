<?php

   
    $user = $_SESSION["user"];

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src='js/jquery-3.3.1.js'></script>


<!--DataTable plugin-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.4/js/dataTables.buttons.min.js"></script>



<!-- UIkit JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.23/css/uikit.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.23/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.23/js/uikit-icons.min.js"></script>


    <style>
        .header {
            list-style-type: none;
            
            padding: 0px;
            overflow: hidden;
            background-color: #34495e;
            font-size: 20px;
            
        }
        ddress, dl, fieldset, figure, ol, p, pre, ul {
         margin: 0 0 20px 0; 
        }

        .header li {
            float: left;
            padding-left:2px;
           
        }

        .header li:last-child {
            border-right: none;
        }

        .header li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        li .title {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
           
        }

        .header li a:hover:not(.active) {
            background-color: rgb(68, 201, 206);
        }

        .active {
            background-color: #4CAF50;
        }

        #circle {
        padding-top:2px;
            width: 45px;
            height: 45px;
            background: white;
            -moz-border-radius: 50px;
            -webkit-border-radius: 50px;
            border-radius: 50px;
            box-shadow: 0px 0px 8px 0px rgba(131, 131, 131, 0.4);
            z-index:0;
        }
        #userBox{
            margin-right:10px;
            width: 120px;
            height: 50px;
            background: white;
            border-radius: 10px;
            text-align: center;
            text-decoration: none;
            font-size:16px;
            text-align: center;
            vertical-align: middle;
            line-height: 50px; 
            z-index:2;
            box-shadow: 1px 3px 5px 2px rgba(131, 131, 131, 0.4);
        }

        ul#userCard{
            display: none;
            padding:10px;
            z-index:5;
            position:absolute;
            right:0px;
            top:0px;
            width:300px;
            height:100%;
            
            background-color:white;
            font-size: 20px;
        }
        li.cardList{
            margin-top:10px;
            text-align: center;
            float:none;
            cursor: pointer;
           
        }
        #shadow{
            display: none;
            position:absolute;
            top:0;
            left:0;
            z-index:4;
            background-color:grey;
            opacity: 0.5;
            height:100%;
            width:100%;
        }

        #userImg{
            
            margin-top:40px;
            width: 80px;
            height: 80px;
            background: white;
            -moz-border-radius: 50px;
            -webkit-border-radius: 50px;
            border-radius: 50px;
        }
        
        #cartImg{
            margin-top:40px;
            width: 45px;
            height: 45px;
            background: white;
     
         
        }
   
    </style>
</head> 
<body>
    <ul class="header">
        <li style="padding-right:11px"><div class="title">IVE Library</div></li>
        <li><a href="index.php" style="background-color:rgba(54, 162, 235, 0.8)">Home</a></li>
        
        <li style="float:right"  onclick='showUserCard()'><div id="userBox"><?php echo $user["name"]?></div></li>
        <li style="float:right;margin-right:-8px;" ><img id="circle" src="image/user.png" alt="Avatar"></li>
      </ul> 

    <div id="shadow" onclick="cancelUserCard()"></div>

    <ul  class="header" id="userCard">
    <li class="cardList" onclick="logout()"><a style="color:red;"><u>Logout</u></a></li>
         <li class="cardList" onclick='userInfo()'><img id="userImg" src="image/user.png" alt="Avatar"></li>
         <li class="cardList"><?php echo $user["name"]?></li>
         <li class="cardList"><?php echo $user["role"]?></li>
         <li  class="cardList" onclick="bookCart()"><img id="cartImg" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTguMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDU4IDU4IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1OCA1ODsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+CjxnPgoJPHJlY3QgeD0iMSIgc3R5bGU9ImZpbGw6I0NCQjI5MjsiIHdpZHRoPSI0NCIgaGVpZ2h0PSI1OCIvPgoJPHJlY3QgeD0iMSIgc3R5bGU9ImZpbGw6IzdGNkU1RDsiIHdpZHRoPSI4IiBoZWlnaHQ9IjU4Ii8+Cgk8cmVjdCB4PSIxNiIgeT0iMTAiIHN0eWxlPSJmaWxsOiNFRkVCREU7IiB3aWR0aD0iMjIiIGhlaWdodD0iMTIiLz4KCTxyZWN0IHg9IjIwIiB5PSIxMyIgc3R5bGU9ImZpbGw6I0Q1RDBCQjsiIHdpZHRoPSIxNCIgaGVpZ2h0PSIyIi8+Cgk8cmVjdCB4PSIyMCIgeT0iMTciIHN0eWxlPSJmaWxsOiNENUQwQkI7IiB3aWR0aD0iMTQiIGhlaWdodD0iMiIvPgoJPGc+CgkJPGNpcmNsZSBzdHlsZT0iZmlsbDojNzFDMzg2OyIgY3g9IjQ1IiBjeT0iNDYiIHI9IjEyIi8+CgkJPHBhdGggc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIGQ9Ik01MSw0NWgtNXYtNWMwLTAuNTUyLTAuNDQ4LTEtMS0xcy0xLDAuNDQ4LTEsMXY1aC01Yy0wLjU1MiwwLTEsMC40NDgtMSwxczAuNDQ4LDEsMSwxaDV2NSAgICBjMCwwLjU1MiwwLjQ0OCwxLDEsMXMxLTAuNDQ4LDEtMXYtNWg1YzAuNTUyLDAsMS0wLjQ0OCwxLTFTNTEuNTUyLDQ1LDUxLDQ1eiIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" alt="Avatar"><span class="uk-badge"><div id="leadBookCount"></div></span></li>
         <li  class="cardList"><div style="margin-top:50px;"></div></li>
         <?php
            if($user["role"] == "student"){
                echo " <li class='cardList' onclick='paymentFun()'><div style='width:100%;height:90px;border-radius:10px;background-color:#E74856;padding-top:25px;font-size:30px;color:white;' class='funCard'>Payment</div></li>";
                echo " <li class='cardList' onclick='history()'><div style='width:100%;height:90px;border-radius:10px;background-color:#0078D7;padding-top:25px;font-size:30px;color:white;' class='funCard'>History</div></li>";
            }
         ?>

        
    </ul>
        
    <script>
            var count;
            var result;
            function showUserCard(){
                document.getElementById('userCard').style.display = 'block';
                document.getElementById('shadow').style.display = 'block';
                var user = {
                    id :<?php echo "'".$user["role"]."'" ?>,
                    email:<?php echo  "'".$user["email"]."'" ?>,
                    pwd:<?php echo "'".$user["password"]."'" ?>
                };
                user = JSON.stringify(user);
                $.ajax({
                    type:"POST",
                    url:"api/?action=get_record_num",
                    data:user,
                    contentType:"application/json",
                    dataType:"json",
                    complete:function(req,status){
                        result =  req.responseText;
                        result = JSON.parse(result);
                        console.log(result);
                        document.getElementById("leadBookCount").innerHTML = result.total;

                       
                      
                    }
        });
            }
            function cancelUserCard(){
                document.getElementById('userCard').style.display = 'none';
                document.getElementById('shadow').style.display = 'none';
            }

            function bookCart(){
               window.location = "./?recordList=true";
            }

            function paymentFun(){
                window.location = "./?payment=true";
            }

            function logout(){
                var r = confirm("Do you want to logout?");
                 if (r == true) 
                    window.location = "./?logout=true";
            }
            function history(){
                window.location = "./?history=true";
            }
            function userInfo(){
                window.location = "./?userInfo=true"
            }

    </script>
</body>
</html>
