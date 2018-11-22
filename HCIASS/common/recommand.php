
<!DOCTYPE html>
<html>
<head>

        <style>
              html,body {

                background-image: url('image/bg/bg3.jpg');
                background-size: cover;
                background-repeat: no-repeat;
                overflow-y: auto;
            }

            body {
                height: 100%;
                width: 100%;
            }

            #recordBookList{
               
            }
            div.container {
                    background-color:white;
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
        <ul class="uk-breadcrumb" >
        <li><a href="index.php">Home</a></li>
        <li><span>Recommand</span></li>
        </ul>
        <h3>Recommand</h3>
        <table id="recordBookList" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Author</th>
                        <th>Recommand</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Image</th>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Author</th>
                        <th>Recommand</th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div id="modal-example" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

        <button class="uk-modal-close-default" type="button" uk-close></button>
        <p class="uk-modal-title">Do you want to recommand this book?</p>
         <div class="uk-modal-footer uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-primary" type="button">Yes</button>
        </div>

    </div>
    </div>
    
<script>
$(document).ready(function() {
    $("#recordBookList tr").attr("uk-toggle","#modal-center");
                $("#recordBookList tr").click(function(){
                    console.log("YERE");
      });
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
        var button = '<button class="uk-button uk-button-default uk-margin-small-right" type="button" uk-toggle="target: #modal-example">Recommand</button>';
        $.each(book,function(i,v){
                    var image = "<img src='../HUMASS/"+v.picture+"' hight:5 width:5>";
                  
             t.row.add( [
                    image,
                    "Book",
                    v.name,
                    v.author,
                    button
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
                    v.company,
                    button
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
                    v.company,
                    button
                ] ).draw(); 
        }); 
        

    });
   
} );
</script>

</body>
</html>