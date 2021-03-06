<!DOCTYPE html>
<html lang="en">
<head>
   <style>
       #dataTable{
           display: none;
       }
       address, dl, fieldset, figure, ol, p, pre, ul {
    margin: 0 0 0px 0;
    }

      html,body {
        height: 100%;
        background-image: url('image/books-1246674_1920.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        overflow-y: auto;
    }

    body {
        height: 100%;
        width: 100%;
    }
   </style>
</head>
<body style="background-image:url(./image/123.jpg);height:100%;">
   
   
    <div id='payment1' class="uk-flex uk-height-medium uk-margin-large-top">        
            <div class="uk-margin-auto uk-margin-auto-vertical uk-width-1-2@s uk-card uk-card-default uk-card-body">
                    <div class="uk-margin">
                        <ul class="uk-breadcrumb" >
                        <li><a href="index.php">Home</a></li>
                        <li><span>Payment</span></li>
                        </ul>
                    </div>
                    <div class="uk-text-right uk-margin">
                            <button id='detail'class="uk-button uk-button-default " type="button">Detail</button>
                    </div>
                    <div class="uk-grid-small uk-text-lead"uk-grid>
                            PayMent
                    </div>
                    <div class="uk-grid-small" uk-grid>
                            <div class="uk-width-expand" uk-leader="fill: -">Harry Petter - Holiday</div>
                            <div>$0.5 x 10</div>
                        </div>
                    <div class="uk-grid-small" uk-grid>
                                <div class="uk-width-expand" uk-leader="fill: -">Some time is good</div>
                                <div>$0.5 x 30</div>
                    </div>
                    <div class="uk-grid-small" uk-grid>
                            <div class="uk-width-expand" uk-leader="fill: -">Just follow your heart</div>
                            <div>$0.5 x 11</div>
                        </div>
                    <div class="uk-grid-small" uk-grid>
                                <div class="uk-width-expand" uk-leader="fill: -">Cooking MAMA</div>
                                <div>$0.5 x 9</div>
                    </div>
                    <div class="uk-grid-small" uk-grid></div>
                    <div class="uk-grid-small uk-text-right uk-text-lead">
                            Total : $1250
                    </div>
                    <div class="uk-modal-footer uk-text-center uk-margin-large-top">
                            <button class="uk-button uk-button-primary uk-width-1-2" type="button">Pay</button>
                    </div>
            
            </div>
    </div>

    <div id='dataTable' class="uk-flex uk-height-medium  uk-margin-large-top">        
            <div class="uk-margin-auto uk-margin-auto-vertical uk-width-1-2@s uk-card uk-card-default uk-card-body">
                <div id='back'class="uk-text-left uk-margin">
                            <button id='detail'class="uk-button uk-button-default " type="button">Back</button>
                </div>
                <div class="uk-grid-small uk-text-lead"uk-grid>
                            Detail
                    </div>
                    <table class="uk-table uk-table-hover uk-table-divider">
                            <thead>
                                <tr>
                                    <th>Book Name</th>
                                    <th>Type</th>
                                    <th>Book Date</th>
                                    <th>Return Day</th>
                                    <th>Total Day</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Harry Petter - Holiday</td>
                                    <td>Book</td>
                                    <td>2018-10-01</td>
                                    <td><span style="color:red">2018-10-09</span></td>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <td>Some time is good</td>
                                    <td>Magazine</td>
                                    <td>2018-09-01</td>
                                    <td><span style="color:red">2018-10-01</span></td>
                                    <td>30</td>
                                </tr>
                                <tr>
                                    <td>Cooking MAMA</td>
                                    <td>Book</td>
                                    <td>2018-09-21</td>
                                    <td><span style="color:red">2018-10-18</span></td>
                                    <td>11</td>
                                    </tr>
                                    <tr>
                                            <td>Just follow your heart</td>
                                            <td>Magazine</td>
                                            <td>2018-09-21</td>
                                            <td><span style="color:red">2018-10-18</span></td>
                                            <td>9</td>
                                            </tr>
                            </tbody>
                        </table>
            
            </div>
    </div>
    
    
    <script>
        $('#detail').click(function(){
            var x = $('#payment1');
            x.hide();
            x = $('#dataTable').show(); 
        });

        $('#back').click(function(){
             $('#payment1').show();

            $('#dataTable').hide(); 
        });
    </script>
   
  
</body>
</html>