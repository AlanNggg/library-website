
<!DOCTYPE html>
<html>
<head>

        <style>

            #recordBookList{
               
            }
            div.container {
                        margin-left:100px;
                    padding:50px;
                    width: 80%;
                    height:50%;
                    box-shadow: 1px 3px 5px 2px rgba(131, 131, 131, 0.4);
            }
            td{
                text-align: center;
            }   
        </style>
       
 
       
       
        
       

        
</head>
<body>
    <div class="container">
        <h3>History</h3>
        <table id="recordBookList" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Author</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Image</th>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Author</th>
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
    $.post("api/?action=get_history",user,function(e){

        var book = e.book;
        console.log(book);
        $.each(book,function(i,v){
                    var image = "<img src='../HUMASS/"+v.picture+"' hight:5 width:5>";
              
             t.row.add( [
                    image,
                    "Book",
                    v.name,
                    v.author
                ] ).draw(); 
        }); 

         var maga = e.magazine;
        console.log(maga);
        $.each(maga,function(i,v){
                    var image = "<img src='../HUMASS/"+v.picture+"' hight:5 width:5>";
              
             t.row.add( [
                    image,
                    "Magazine",
                    v.name,
                    v.company
                ] ).draw(); 
        }); 

         var soft = e.software;
        console.log(soft);
        $.each(soft,function(i,v){
                    var image = "<img src='../HUMASS/"+v.picture+"' hight:5 width:5>";
              
             t.row.add( [
                    image,
                    "Software",
                    v.name,
                    v.company
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