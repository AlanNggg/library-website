<?php
    extract($_GET);
    $table = array("All", "Book", "Magazine", "Software");
    if (isset($keyword, $attribute) && !in_array($attribute, $table)) {
        header('Location: ./search.php');
    } else {
        session_start();
        $user = $_SESSION["user"]; 
        include 'header.php';
    }
    
?>
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
    
   

    #searchIcon {
        position: relative;
        top: 10px;
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
        z-index: 2;
        position: relative;
        width: 150px;
        font-size: 19px;
        margin: 0 auto;
        padding: 13px 15px;
        display: inline-block;
        top: 1px;
        left: 6px;
        border: 1px solid black;
        /* Styles */
        background: #fff;
        border-radius: 5px 0px 0px 5px;
        box-shadow: 0 1px 0 rgba(0, 0, 0, 0.2);
        cursor: pointer;
        outline: none;
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

    #bookshelf div img {
        /* max-width: 100%;
        max-height: 100%; */
        width: 150px;
        height: 200px;
        object-fit: cover;
    }

    .demo {
        position: relative;
        float: left;
        width: 150px;
        height: 200px;
        background-color: white;
        margin: 30px 40px;
        left: 10px;
        text-align: center;
        cursor: pointer;
    }

    #arrow {
        display: block;
        position: relative;
        width: 150px;
        height: 70px;
        opacity: 0.9;
    }

    #forwardArrow {
        float: right;
        width: 50%;
        height: 100%;
        background-image: url('UI/arrow.png');
        background-size: 50px;
        background-position: center;
        background-color: #B7B5B9;
        background-repeat: no-repeat;
        cursor: pointer;
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
    }

    #forwardArrow:hover {
        background-color: #9C9A9E;
    }

    #backArrow {
        float: left;
        width: 50%;
        height: 100%;
        background-image: url('UI/arrow.png');
        background-size: 50px;
        background-position: center;
        background-color: #B7B5B9;
        background-repeat: no-repeat;
        transform: rotate(180deg);
        cursor: pointer;
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
    }

    #backArrow:hover {
        background-color: #9C9A9E;
    }

    .tooltip {
        display:inline-block;
        position:relative;
        border-bottom:1px dotted #666;
        text-align:left;
    }

    .tooltip .left {
        z-index: 3;
        min-width:300px; 
        top:50%;
        right:100%;
        margin-right:20px;
        transform:translate(0, -50%);
        
        color:#888888;
        background-color:#FFCC66;
        font-weight:normal;
        font-size:15px;
        border-radius:8px;
        position:absolute;
        z-index:99999999;
        box-sizing:border-box;
        box-shadow:0 1px 8px rgba(0,0,0,0.5);
        visibility:hidden; opacity:0; transition:opacity 0.8s;
    }

    .tooltip:hover .left {
        visibility:visible; opacity:1;
    }

    .tooltip .left i {
        position:absolute;
        top:50%;
        left:100%;
        margin-top:-12px;
        width:12px;
        height:24px;
        overflow:hidden;
    }

    .tooltip .left i::after {
        content:'';
        position:absolute;
        width:12px;
        height:12px;
        left:0;
        top:50%;
        transform:translate(-50%,-50%) rotate(-45deg);
        background-color:#FFCC66;
        box-shadow:0 1px 8px rgba(0,0,0,0.5);
    }

    .tooltip h3 {
        padding: 15px 30px 5px 30px;
    }

    .tooltip .title {
        font-size: 20px;
        background-color: black; 
        color: white;
        padding: 15px 30px;
    }

    .tooltip p {
        padding: 5px 30px 5px 30px;
    }

    aside {
        display: inline-block;
        background: white;
        color: black;
        font-family: sans-serif;
        box-shadow: 1px 3px 5px 2px rgba(131, 131, 131, 0.4);
    }

    #top_menu {
        list-style-type: none;
        position: relative;
        font-size: 20px;
        text-align: center;
        padding: 5px;
    }

    #top_menu li {
        text-align: center;
        position:relative;
        float: left;
        padding-right: 20px;
        cursor: pointer;
    }

    #top_menu li:hover {
        color: rgb(232, 87, 94);
    }

    #top_menu li.topClicked {
        font-weight: 550;
        color: rgb(232, 87, 94);
    }

    #container_menu {
        display: none;
        float: right;
        position: relative;
        left: -50%;
        text-align:left;
    }
    

    .left_menu {
        list-style-type: none;
        position: relative;
        font-size: 20px;
        left: 50%;
        top: 10px;
        text-align: center;
        padding: 0px;
    }

    .left_menu li {
        text-align: center;
        position:relative;
        float: left;
        padding: 14px 15px;
        cursor: pointer;
    }

    .left_menu li:after {
        content: '';
        display: block;
        height: 3px;
        width: 0;
        background: transparent;
        transition: width .5s ease, background-color .5s ease;
    }

    .left_menu li:hover:after {
        width: 100%;
        background: #019fb6;
    }


    .left_menu li.clicked:after {
        width: 100%;
        background: #019fb6;
    }

    .large-slick {
        margin: 0 auto;
        width: 80%;
        clear: both;
    }

    /* .large-slick img {
        width: 300px;
        height: 500px;
    } */

    .recommend {
        margin: 30px 50px;
        text-align: center;
        cursor: pointer;
    }
    .large-slick button {
        width: 50px;
        z-index: 1;
    }
    .large-slick div {
        padding: 20px;
        cursor: pointer;
        outline: none;
    }
    .large-slick .slick-prev:before,
    .large-slick .slick-next:before {
        font-size: 50px;
    }
    .slick-dotted .slick-current img {
        transform: scale(1.1);
    }

    #filterIcon {
        position: relative;
        float: right;
        width: 40px;
        height: 40px;
        cursor: pointer;
        background-image: url("UI/filter.png");
        background-size: contain;
    }

    .newCard {
        flex: 1;  
        display:block;
        position: relative;
        padding: 20px 20px;
        margin: 40px 10px;
        border-radius: 10px; 
        width: 460px; 
        height: 150px; 
        background-color: #3498db;
    }
    @media only screen and (max-width: 1275px) {
        #searchSection {
            height: 200px !important;

        }
        #container-arrow {
            clear: both !important;
        }
        #inputForm {
            
        }

    }

</style>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="http://kenwheeler.github.io/slick/slick/slick.css" rel="stylesheet"/>
<link href="http://kenwheeler.github.io/slick/slick/slick-theme.css" rel="stylesheet"/>
<script src="js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
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
        var attribute = $("#attribute").val();
        var keyword = $("#search").val();

        getResult(keyword, attribute);
        
        //getRecommend();
        $(".dropdown a").click(function() {
            $("#dd p").text($(this).text().trim());
            $("#attribute").val($("#dd p").text());
        });

         $("#searchIcon").click(function() {
            $("#searchForm").submit();
        });

        // $('.large-slick').slick({
        //     dots: true,
        //     centerMode: true,
        //     infinite: true,
        //     speed: 300,
        //     slidesToShow: 1,
        //     slidesToScroll: 1,
        //     arrows: true,
        // });
        $('.large-slick').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            centerMode: true,
            variableWidth: true
        });

    });

    function getResult(keyword, attribute) {
       var search = {
           attribute : attribute,
           keyword : keyword
       };
       search = JSON.stringify(search);
       $.ajax({
           type:"GET",
           url:"api/?action=search-handler",
           data: {search: search},
           contentType:"application/json",
           dataType:"json",
           complete:function(req,status){
               var result =  req.responseText;
               result = JSON.parse(result);

               //login success
               if(status == 'success') {
                   if(result.stat == "SUCCESS") {
                       showAll(result);
                       
                   //if the user is first login
                   } else {
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

   function reserve() {
       var code;
       var availability;
       var email;
       var category;
       $("#detail").each(function() {
            if ($(this).css("display") == "block") {
                code = $(this).find(".code span").text();
                availability = $(this).find(".availability span").text();
                category = $(this).find(".category span").text();
                email = <?php echo  "'".$user["email"]."'" ?>;
            }
       });
       
       var add = {
            code : code,
            availability : availability,
            email : email,
            category : category
       };
       add = JSON.stringify(add);

       $.ajax({
           type:"POST",
           url:"api/?action=update-handler",
           data: add,
           contentType:"application/json",
           dataType:"json",
           complete:function(req,status){
               var result =  req.responseText;
               result = JSON.parse(result);

               //login success
               if(status == 'success') {
                   if(result.stat == "SUCCESS") {
                       
                       alert("Success!");

                       location.reload();
                   //if the user is first login
                   } else {
                        alert("Failed!");
                   }
                   
               }
           }
       });
   }

   function getRecommend() {
        $("#bookshelf").empty();

        var search = {
            attribute : "All",
            keyword : "high rate"
        };
        search = JSON.stringify(search);

        $.ajax({
            type:"GET",
            url:"api/?action=search-handler",
            data: {search: search},
            contentType:"application/json",
            dataType:"json",
            complete:function(req,status){
                var result =  req.responseText;
                result = JSON.parse(result);

                //login success
                if(status == 'success') {
                    if(result.stat == "SUCCESS") {
                        showAll(result);
                        
                    //if the user is first login
                    } else {
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
 <!--background-color: rgb(126, 195, 230);-->
<body>
    <div style="position: fixed;  width: 100%; height: 100%; top: 63px;">
        <div id="searchSection" style="top: 58px; height: 150px; width: 70%; float: right;">  
            <form id="searchForm" method="get" action="result.php" style="position: relative; float: right; padding-top: 50px; width: 100%; height: inherit; display: flex; align-items:flex-start;">
                <div id="container-arrow" style="position: relative; left: 50px; width: 250px;">
                    <div id="arrow">
                        <div id="forwardArrow"></div>
                        <div id="backArrow"></div>
                    </div>
                </div>
                <div id="inputForm" style="position: relative; width: 70%;">
                    <div class="wrapper-demo" style="z-index: 2; float: left;">
                        <div id="dd" class="wrapper-dropdown-5" tabindex="1">
                            <p style="margin: 0; line-height: 1;"><?php echo $attribute; ?></p>
                            <ul class="dropdown" style="padding-left: 0px; margin-top: 0px;">
                                <li>
                                    <a href="#"><i class="icon-remove"></i>All</a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-user"></i>Book</a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-cog"></i>Software</a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-remove"></i>Magazine</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                
                    <input id="search" type="text" name="keyword" style="position: relative; margin: 0px; padding: 10px 50px 10px 30px; width: 70%;border-radius: 0px 5px 5px 0px; font-size: 20px; outline: none;"
                        value="<?php echo $keyword; ?>"/>
                    <input id="attribute" type="hidden" name="attribute" value="<?php echo $attribute; ?>"/>
                    <div id="searchIcon"></div>
                    <div class="message-box" style="color: black; width: 150px;"></div>
                </div>
            </form>
        </div>
        <!--<li><a href="#">home</a></li>-->
        <div id="recommandList" style="position: relative; float: left; padding-top: 40px; display: flex; align-items: flex-start; width: 30%; max-height: 100%; margin: 0px;">
            <aside style="float: left; max-width: 520px; min-height: 600px; border-radius: 10px; margin: 10px;">
                
                <div style="background-color: #2c3e50;color:white; border-radius: 10px 10px 0px 0px; padding: 15px; font-size: 20px; z-index: 2;">
                    <ul id="top_menu">    
                        <li id="recommend">Recommend</li>
                        <li id="new">News</li>
                        <button id="close-Recommend"type="button" uk-close style="float:right;color:white;"></button>
                    </ul>
                </div>
                <div id="container_menu">
                    <ul class="left_menu">    
                        <li id="recommend_book">Book</li>
                        <li id="recommend_magazine">Magazine</li>
                        <li id="recommend_software">Software</li>
                    </ul>
                </div>
                <div class="Book large-slick" style="display: none">
                    <div><img src="./img/books/B01.jpg" alt=""/></div>
                    <div><img src="./img/books/B02.jpg" alt=""/></div>
                    <div><img src="./img/books/B03.jpg" alt=""/></div>
                </div>
                <div class="Magazine large-slick" style="display: none">
                    <div><img src="./img/magazines/M01.jpg" alt=""/></div>
                    <div><img src="./img/magazines/M02.jpg" alt=""/></div>
                    <div><img src="./img/magazines/M03.jpg" alt=""/></div>
                </div>
                <div class="Software large-slick" style="display: none">
                    <div><img src="./img/software/S01.jpg" alt=""/></div>
                    <div><img src="./img/software/S02.jpg" alt=""/></div>
                    <div><img src="./img/software/S03.jpg" alt=""/></div>
                </div>
                
                <div id="news" style="position: relative; max-width: 520px; max-height: 600px; overflow: auto;">
                    <div class="newCard">
                    <h4 style="font-weight: bold">Wall street Journal<span style="float: right;">Nov 22th 2018</span></h4>
                    <p>
                    Wow, does that work?
                    She was too short to see over the fence.
                    The memory we used to share is no longer coherent.
                    Is it free?
                    </p>
                    </div>
                    <div class="newCard">
                    <h4 style="font-weight: bold">BBC News Magazine<span style="float: right;">Nov 22th 2018</span></h4>
                    <p>
                    Malls are great places to shop; I can find everything I need under one roof.
                    Italy is my favorite country; in fact, I plan to spend two weeks there next year.
                    </p>
                    </div>
                    <div class="newCard">
                    <h4 style="font-weight: bold">BBC News Magazine<span style="float: right;">Nov 21th 2018</span></h4>
                    <p>
                    I checked to make sure that he was still alive.
                    Hurry!
                    Wow, does that work?
                    They got there early, and they got really good seats.
                    I hear that Nancy is very pretty.
                    </p>
                    </div>
                    <div class="newCard">
                    <h4 style="font-weight: bold">Wall street Journal<span style="float: right;">Nov 21th 2018</span></h4>
                    <p>
                    Wow, does that work?
                    She was too short to see over the fence.
                    The memory we used to share is no longer coherent.
                    Is it free?
                    </p>
                    </div>
                    <div class="newCard">
                    <h4 style="font-weight: bold">Wall street Journal<span style="float: right;">Nov 20th 2018</span></h4>
                    <p>
                    Malls are great places to shop; I can find everything I need under one roof.
                    Italy is my favorite country; in fact, I plan to spend two weeks there next year.
                    </p>
                    </div>
                </div>

            </aside>
        </div>
        <section style="position: relative; float: right; width: 70%; height: 100%;">
            <div id="bookshelf" style="position: absolute; width: 100%; height: 100%;">

                
            </div>

        </section>
        <section>
            <div id="info" style="position: fixed; z-index: 3; top: 0px; display: none; width: 100%; height: 100%; overflow: auto; background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.4);">
                <div id="content" style="position: relative; display: table; background-color: #fefefe; margin: 5% auto; width: 50%; height: 70%; ">
                </div>
            </div>
        </section>
    <div>
</body>

</html>

<script type="text/javascript">

    var stop = false;
    var stuffOnPage = 0;

    window.onclick = function (event) {
        var panel = document.getElementById("info");
        var outside = document.getElementsByTagName("BODY")[0];
        if (event.target == panel) {
            panel.style.display = "none";
            outside.style.cursor = "";
        }
    }
    $("#close-Recommend").click(function(){
        $("#recommandList").css("display","none")
    });
    function showInfo(DOM) {
        var picture = $(DOM).find("img").attr("src");
        var category;
        if (picture.includes("book")) {
            var category = "book"
        } else if (picture.includes("magazine")) {
            var category = "magazine";
        } else {
            var category = "software";
        }
        var name = $(DOM).find(".title").text();
        var publish = $(DOM).find(".publish").text();
        var availability = $(DOM).find(".availability span").text();
        var description = $(DOM).find(".desc").text();
        var code = $(DOM).find("sup span").text();
        $("#content").html("<div style=\"font-size: 30px; height: 15%; width: 100%; background-color: rgb(112, 196, 204); color: white;\"><h3 style=\"margin: 0; padding: 3%; opacity: 0.7;\">" + name + "</h3></div>" +
            "<div style=\"position: relative; float: left; width: 250px; height: 85%;\"><img src=\"" + picture + "\" alt=\"" + name + "\" style=\"padding: 10%; max-width: 100%;\"></div>" +
            "<div id=\"detail\" style=\"position: relative; width: 700px; height: 85%; padding: 20px; margin: 0px;\">" +
            "<p class=\"code\">Code : <span>" + code + "</span></p>" +
            "<p class=\"category\">Category : <span>" + category.toUpperCase()  + "</span></p>" + 
            "<p class=\"publish\">Published By " + publish + "</p>" +
            "<p class=\"desc\">Description : <br/>" + description + "</p>" +
            "<p class=\"availability\">Availability : <span>" + availability + "</span></p>" +
            "<button onclick=\"reserve()\" class=\"uk-button uk-button-default uk-button-large\">Add For Reservation</button>" +
            "</div>");

        document.getElementById("info").style.display = "block";
    }

    $(document).ready(function() {
        var onPageStuff = 0;
        var previousPageStuff = 0;

        $("#new").on('click', function() {
            $("#news").fadeIn();
            $("#container_menu").hide();
            $(".Book").hide();
            $(".Magazine").hide();
            $(".Software").hide();
        });
        $("#recommend").on('click', function() {
            $("#container_menu").fadeIn();
            $(".Book").fadeIn();
            $(".Magazine").hide();
            $(".Software").hide();
            $("#news").hide();
        });

        $("#recommend_book").on('click', function() {
            $(".Book").fadeIn();
            $('.Book').slick('setPosition'); 
            $(".Magazine").hide();
            $(".Software").hide();
        });
        $("#recommend_magazine").on('click', function() {
            $(".Magazine").fadeIn();
            $('.Magazine').slick('setPosition'); 
            $(".Book").hide();
            $(".Software").hide();
        });
        $("#recommend_software").on('click', function() {
            $(".Software").fadeIn();
            $('.Software').slick('setPosition'); 
            $(".Book").hide();
            $(".Magazine").hide();
        });
      
        $(".left_menu li").click(function () {
            $("li").each(function(){
                if ($(this).hasClass("clicked")) {
                    $(this).removeClass("clicked");
                }
            });

            $(this).addClass("clicked");
        });

        $("#top_menu li").click(function () {
            $("li").each(function() {
                if ($(this).hasClass("topClicked")) {
                    $(this).removeClass("topClicked");
                }
            });

            $(this).addClass("topClicked");
        });
        $('#recommend').trigger('click'); 

        $('#recommend_book').trigger('click'); 



        $("#forwardArrow").click(function () {
            stop = false;
            var nextPageStuff = 0;
            var onPageStuff = 0;

            $(".demo").each(function () {
                if ($(this).hasClass("nextpage") && !$(this).hasClass("notshow")) {
                    nextPageStuff++;
                }
            });

            if (nextPageStuff > 0) {
                $(".demo").each(function () {
                    if ($(this).css("display") != "none" && !$(this).hasClass("nextpage")) {
                        $(this).addClass("previouspage");
                        $(this).fadeOut(1000);
                        $(this).css("display", "none");
                    }
                });
                $(".demo").each(function () {
                    if ($(this).css("display") == "none" && $(this).hasClass("nextpage") && !$(this).hasClass("notshow") && !stop) {
                        $(this).fadeIn(1000);
                        $(this).removeClass("nextpage");

                        onPageStuff++;
                    }
                    
                    if (onPageStuff == stuffOnPage) {
                        stop = true;
                        return;
                    }
                });
            }
        });

        $("#backArrow").click(function () {
            stop = false;
            var count = 0;
            onPageStuff = 0;
            $(".demo").each(function () {
                if ($(this).hasClass("previouspage") && !$(this).hasClass("notshow")) {
                    count++;
                }
            });
            if (count > 0) {
                $(".demo").each(function () {
                    if ($(this).css("display") != "none" && !$(this).hasClass("nextpage")) {
                        $(this).addClass("nextpage");
                        $(this).fadeOut(1000);
                        $(this).css("display", "none");
                    }
                });
                $($(".demo").get().reverse()).each(function () {
                    if ($(this).css("display") == "none" && $(this).hasClass("previouspage") && !$(this).hasClass("notshow") && onPageStuff < stuffOnPage) {
                        $(this).fadeIn(1000);
                        $(this).removeClass("previouspage");
                        onPageStuff++;
                    }
                });
            }
        });

        $("#search").focus(function () {
            $(this).css("background-color", "#EFEFEF");
        });
        $("#search").blur(function () {
            $(this).css("background-color", "#FFFFFF");
        });
    });

    
    function showAll(result) {
        stop = false;
        stuffOnPage = 0;
        var i = 0; 
        var search = result.search;
        $.each(search, function (index, value) {
            if ($(".demo").length > 7) {
                stop = true;
                if (value.author != null)
                    $("#bookshelf").append("<div class=\"demo nextpage tooltip\" onclick=\"showInfo(this)\" style=\"display: none;\"><img src=\"" + value.picture + "\" alt=\"" + value.name + "\"><div class=\"left\"><p class=\"title\">" + value.name + "</p><sup style=\"padding: 20px 20px 0px 0px; float: right;\">Code: <span>" + value.code + "</span></sup><p class=\"publish\" style=\"margin: 0px; font-weight: bold;\">Author : " + value.author + "</p><p class=\"availability\" style=\"margin: 0px; font-weight: bold;\">Availability : <span>" + value.availability + "</span></p><p class=\"desc\">" + value.description + "</p><i></i></div></div>");
                else 
                    $("#bookshelf").append("<div class=\"demo nextpage tooltip\" onclick=\"showInfo(this)\" style=\"display: none;\"><img src=\"" + value.picture + "\" alt=\"" + value.name + "\"><div class=\"left\"><p class=\"title\">" + value.name + "</p><sup style=\"padding: 20px 20px 0px 0px; float: right;\">Code: <span>" + value.code + "</span></sup><p class=\"publish\" style=\"margin: 0px; font-weight: bold;\">Company : " + value.company + "</p><p class=\"availability\" style=\"margin: 0px; font-weight: bold;\">Availability : <span>" + value.availability + "</span></p><p class=\"desc\">" + value.description + "</p><i></i></div></div>");
            }
            if (!stop) {
                if (value.author != null)
                    $("#bookshelf").append("<div class=\"demo tooltip\" onclick=\"showInfo(this)\" style=\"display: block;\"><img src=\"" + value.picture + "\" alt=\"" + value.name + "\"><div class=\"left\"><p class=\"title\">" + value.name + "</p><sup style=\"padding: 20px 20px 0px 0px; float: right;\">Code: <span>" + value.code + "</span></sup><p class=\"publish\" style=\"margin: 0px; font-weight: bold;\">Author : " + value.author + "</p><p class=\"availability\" style=\"margin: 0px; font-weight: bold;\">Availability : <span>" + value.availability + "</span></p><p class=\"desc\">" + value.description + "</p><i></i></div></div>");
                else 
                    $("#bookshelf").append("<div class=\"demo tooltip\" onclick=\"showInfo(this)\" style=\"display: block;\"><img src=\"" + value.picture + "\" alt=\"" + value.name + "\"><div class=\"left\"><p class=\"title\">" + value.name + "</p><sup style=\"padding: 20px 20px 0px 0px; float: right;\">Code: <span>" + value.code + "</span></sup><p class=\"publish\" style=\"margin: 0px; font-weight: bold;\">Company : " + value.company + "</p><p class=\"availability\" style=\"margin: 0px; font-weight: bold;\">Availability : <span>" + value.availability + "</span></p><p class=\"desc\">" + value.description + "</p><i></i></div></div>");
                stuffOnPage++;
            }
        });
    }

</script>
