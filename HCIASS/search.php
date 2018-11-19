<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
</head>

<style>
    html,
    body {
        
        
        height: 100%;
        background-image: url('image/books-1246674_1920.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        font-family: Helvetica, Arial, sans-serif;
    }

    body {
        height: 100%;
        width: 100%;
    }

    #searchIcon {
        position: relative;
        right: 50px;
        width: 30px;
        height: 30px;
        cursor: pointer;
        background-image: url("UI/search.png");
        background-size: contain;
        background-repeat: no-repeat;
        display: inline-block;
        z-index: 2;
    }

    *,
    *:after,
    *:before {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }

    .wrapper-dropdown-5 {
        /* Size & position */
        position: relative;
        width: 150px;
        margin: 0 auto;
        padding: 13px 15px;
        display: inline-block;
        left: 5px;
        border: 1px solid black;
        /* Styles */
        background: #fff;
        border-radius: 5px 0px 0px 5px;
        box-shadow: 0 1px 0 rgba(0, 0, 0, 0.2);
        cursor: pointer;
        outline: none;
        z-index: 2;
        -webkit-transition: all 0.3s ease-out;
        -moz-transition: all 0.3s ease-out;
        -ms-transition: all 0.3s ease-out;
        -o-transition: all 0.3s ease-out;
        transition: all 0.3s ease-out;
    }

    .wrapper-dropdown-5:after {
        /* Little arrow */
        content: "";
        width: 0;
        height: 0;
        position: absolute;
        top: 50%;
        right: 15px;
        margin-top: -3px;
        border-width: 6px 6px 0 6px;
        border-style: solid;
        border-color: #4cbeff transparent;
    }

    .wrapper-dropdown-5 .dropdown {
        /* Size & position */
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;

        /* Styles */
        background: #fff;
        border-radius: 0 0 5px 5px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-top: none;
        border-bottom: none;
        list-style: none;
        -webkit-transition: all 0.3s ease-out;
        -moz-transition: all 0.3s ease-out;
        -ms-transition: all 0.3s ease-out;
        -o-transition: all 0.3s ease-out;
        transition: all 0.3s ease-out;

        /* Hiding */
        max-height: 0;
        overflow: hidden;
    }

    .wrapper-dropdown-5 .dropdown li {
        padding: 0 10px;
    }

    .wrapper-dropdown-5 .dropdown li a {
        display: block;
        text-decoration: none;
        color: #333;
        padding: 10px 0;
        transition: all 0.3s ease-out;
        border-bottom: 1px solid #e6e8ea;
    }

    .wrapper-dropdown-5 .dropdown li:last-of-type a {
        border: none;
    }

    .wrapper-dropdown-5 .dropdown li i {
        margin-right: 5px;
        color: inherit;
        vertical-align: middle;
    }

    /* Hover state */

    .wrapper-dropdown-5 .dropdown li:hover a {
        color: #57a9d9;
    }

    /* Active state */

    .wrapper-dropdown-5.active {
        border-radius: 5px 0px 0px 0px;
        background: #4cbeff;
        box-shadow: none;
        border-bottom: none;
        color: white;
    }

    .wrapper-dropdown-5.active:after {
        border-color: #82d1ff transparent;
    }

    .wrapper-dropdown-5.active .dropdown {
        border-bottom: 1px solid rgba(0, 0, 0, 0.2);
        max-height: 400px;
    }

    @media only screen and (max-width: 560px) {
        #search {
            padding: 10px 10px 10px 130px;
        }
        /* #searchIcon {
            right: 0px;
        } */
    }
</style>
<script src="js/jquery-3.3.1.js"></script>
<script type="text/javascript">


    function DropDown(el) {
        this.dd = el;
        this.initEvents();
    }
    DropDown.prototype = {
        initEvents: function () {
            var obj = this;

            obj.dd.on('click', function (event) {
                $(this).toggleClass('active');
                event.stopPropagation();
            });
        }
    }

    $(function () {

        var dd = new DropDown($('#dd'));

        $(document).click(function () {
            // all dropdowns
            $('.wrapper-dropdown-5').removeClass('active');
        });

    });

    $(document).ready(function() {

        $(".dropdown a").click(function() {
            $("#dd p").text($(this).text().trim());
            $("#attribute").val($("#dd p").text());
            console.log($("#attribute").val());
        });

        $("#searchIcon").click(function() {
            $("#searchForm").submit();
        });

        $("#searchForm").submit(function(e) {

            var attribute = $("#attribute").val();
            var keyword = $("#search").val();
            console.log(attribute);
            if (keyword.trim().length != 0) {
                getResult(keyword, attribute);
            }
        });
    });


</script>

<body>
   
    <div style="height: 100%; width: 100%;">
        <form id="searchForm" method="get" action="#" onsubmit="return false" style="position: relative; width: inherit; height: inherit;display: flex; align-items: center; justify-content:center;">
            <div class="wrapper-demo" style="z-index: 2;">
                <div id="dd" class="wrapper-dropdown-5" tabindex="1">
                    <p>Book</p>
                    <ul class="dropdown">
                        <li>
                            <a href="#">
                            <i class="icon-user"></i>Book</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-cog"></i>Software</a>
                        </li>
                        <li>
                            <a href="#"><i class="icon-remove"></i>Magazine</a>
                        </li>
                    </ul>
                </div>
                ​</div>
            <input id="search" type="text" style="position: relative; margin: 0px; padding: 10px 50px 10px 50px; width: 40%;border-radius: 0px 5px 5px 0px; font-size: 20px; outline: none; z-index: 1;"
            />
            <input id="attribute" type="hidden" name="attribute" value="Book"/>
            <div id="searchIcon"></div>
        </form>
    </div>

</body>

</html>

<script type="text/javascript">
   function getResult(keyword, attribute) {
       
        $("#searchForm").css('align-items', 'flex-start');
        $("#searchForm").css('padding-top', '100px');
        $("#searchIcon").css('top', '10px');

        console.log(attribute + " " + keyword);
        var search = {
            attribute : attribute,
            keyword : keyword
        };
        search = JSON.stringify(search);
        console.log(search);
        $.ajax({
            type:"GET",
            url:"api/?action=search-handler",
            data: search,
            contentType:"application/json",
            dataType:"json",
            complete:function(req,status){
                var result =  req.responseText;
                console.log(result);
                
                //login success
                if(status == 'success'){
                    alert(result.search + " " +result.stat);
                    if(result.stat == "SUCCESS")
                        alert(result.search);
                    //if the user is first login
                    else{
                            $(".message-box").addClass("message-box-error")
                                .removeClass("message-box-alert")
                        .text("Not Found")
                            .show(300)
                            .delay(2000)
                            .hide(300);
                            return;
                    }
                    
                }
            }
        });
    }
</script>
