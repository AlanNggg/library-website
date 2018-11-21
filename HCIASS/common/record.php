
<!DOCTYPE html>
<html>
<head>

        <style>
            #container{
                padding-left: 20px;
                position:absolute;
                background: red;
                margin:10px;
                height:80%;
                width:80%;
            }
            #recordBookList{
               
            }
            div.container {
            padding:50px;
            width: 80%;
            height:50%
            }
            td{
                text-align: center;
            }   
        </style>
       
 
       
       
        
       

        
</head>
<body>
    <div class="container">
        <table id="recordBookList" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Brow Day</th>
                        <th>Last Day</th>
                        <th></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Brow Day</th>
                            <th>Last Day</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    
<script>
$(document).ready(function() {
    var t = $('#recordBookList').DataTable();
    var user = {
                    id :<?php echo "'".$user["role"]."'" ?>,
                    email:<?php echo  "'".$user["email"]."'" ?>,
                    pwd:<?php echo "'".$user["password"]."'" ?>
                };
                user = JSON.stringify(user);
    $.post("api/?action=get_record_num",user,function(e){

        var list = e.recode;
        console.log(list);
        $.each(list,function(i,v){
            console.log(v);
        });

   

    // Automatically add row of data
    var de_btn = "<button id='removeBtn' type='button'>Remove</button>";
            $.each(list,function(i,v){
                var image = "<img src='../HUMASS/"+v.picture+"' hight:5 width:5>";
              
                t.row.add( [
                    image,
                    v.name,
                    v.start_date,
                    v.end_date,
                    de_btn
                ] ).draw(); 
            }); 
          

 
   

    });
    $('#recordBookList').on('click','button',function(){
        var r = confirm("Do you want to cancel this book of appointment");
        if (r == true) 
            t.row($(this).parents('tr')).remove().draw();
          
           
    
      
    });
} );
</script>

</body>
</html>