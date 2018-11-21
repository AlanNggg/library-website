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
    html,
    body {
        height: 100%;
        background-image: url('image/books-1246674_1920.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        font-family: Helvetica, Arial, sans-serif;
        overflow-y: auto;
    }

    body {
        height: 100%;
        width: 100%;
    }

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
        background: rgb(116, 180, 212);
        color: white;
        font-family: sans-serif;
    }

    #container_menu {
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

    @media only screen and (max-width: 1275px) {
        #searchSection {
            height: 200px !important;

        }
        #container-arrow {
            clear: both !important;
        }
        #inputForm {
            clear: left;
        }

    }

</style>
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
        console.log(attribute);

        getResult(keyword, attribute);
        
        //getRecommend();
        $(".dropdown a").click(function() {
            $("#dd p").text($(this).text().trim());
            $("#attribute").val($("#dd p").text());
            console.log($("#attribute").val());
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
           data: {search: search},
           contentType:"application/json",
           dataType:"json",
           complete:function(req,status){
               var result =  req.responseText;
               result = JSON.parse(result);

               //console.log(result.search[0]);
               //login success
               if(status == 'success') {
                   if(result.stat == "SUCCESS") {
                       showAll(result);
                       console.log(result);
                       
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

   function getRecommend() {
        $("#bookshelf").empty();

        var search = {
            attribute : "All",
            keyword : "high rate"
        };
        search = JSON.stringify(search);
        console.log(search);
        $.ajax({
            type:"GET",
            url:"api/?action=search-handler",
            data: {search: search},
            contentType:"application/json",
            dataType:"json",
            complete:function(req,status){
                var result =  req.responseText;
                result = JSON.parse(result);

                //console.log(result.search[0]);
                //login success
                if(status == 'success') {
                    if(result.stat == "SUCCESS") {
                        showAll(result);
                        console.log(result);
                        
                    //if the user is first login
                    } else {
                            $(".message-box").addClass("message-box-error")
                                .removeClass("message-box-alert")
                        .text("Not Found")
                            .show(300)
                            .delay(2000)
                            .hide(300);
                            return;
                            console.log(result.table);
                    }
                    
                }
            }
        });
}

</script>
 <!--background-color: rgb(126, 195, 230);-->
<body>
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
    <div style="position: relative; float: left; padding-top: 40px; display: flex; align-items: flex-start; width: 30%; height: 100%; margin: 0px;">
        <aside style="float: left; width: 100%; height: 600px; border-radius: 10px; margin: 10px;">
            
            <h1 style="background-color: rgba(52, 87, 94, 0.8); border-radius: 10px 10px 0px 0px; padding: 15px; font-size: 30px;">Recommend</h1>
            <div id="container_menu">
                <ul class="left_menu">    
                    <li id="recommend_book">Book</li>
                    <li id="recommend_magazine">Magazine</li>
                    <li id="recommend_software">Software</li>
                </ul>
            </div>
            <div class="Book large-slick" style="display: none">
                <div><image src="./img/books/B01.jpg" alt=""/></div>
                <div><image src="./img/books/B02.jpg" alt=""/></div>
                <div><image src="./img/books/B03.jpg" alt=""/></div>
            </div>
            <div class="Magazine large-slick" style="display: none">
                <div><image src="./img/magazines/M01.jpg" alt=""/></div>
                <div><image src="./img/magazines/M02.jpg" alt=""/></div>
                <div><image src="./img/magazines/M03.jpg" alt=""/></div>
            </div>
            <div class="Software large-slick" style="display: none">
                <div><image src="./img/software/S01.jpg" alt=""/></div>
                <div><image src="./img/software/S02.jpg" alt=""/></div>
                <div><image src="./img/software/S03.jpg" alt=""/></div>
            </div>

        </aside>
    </div>
    <section style="position: relative; float: right; width: 70%; height: 50%;">
        <div id="bookshelf" style="position: absolute; width: 100%; height: 100%;">

            
        </div>

    </section>
    
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

    function showInfo(DOM) {
        
    }
    $(document).ready(function() {
        var onPageStuff = 0;
        var previousPageStuff = 0;
     

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

        $('#recommend_book').trigger('click'); 

        $("#forwardArrow").click(function () {
            stop = false;
            var nextPageStuff = 0;
            var onPageStuff = 0;
            console.log(stop);
            $(".demo").each(function () {
                if ($(this).hasClass("nextpage") && !$(this).hasClass("notshow")) {
                    nextPageStuff++;
                }
            });
            console.log(nextPageStuff);
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
                        console.log("remove next");
                        onPageStuff++;
                    }
                    
                    console.log(stuffOnPage);
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
                    $("#bookshelf").append("<div class=\"demo nextpage tooltip\" onclick=\"showInfo(this)\" style=\"display: none;\"><img src=\"" + value.picture + "\" alt=\"" + value.name + "\"><div class=\"left\"><p class=\"title\">" + value.name + "</p><p style=\"margin: 0px; font-weight: bold;\">Author : " + value.author + "</p><p style=\"margin: 0px; font-weight: bold;\">Availability : " + value.availability + "</p><p>" + value.description + "</p><i></i></div></div>");
                else 
                    $("#bookshelf").append("<div class=\"demo nextpage tooltip\" onclick=\"showInfo(this)\" style=\"display: none;\"><img src=\"" + value.picture + "\" alt=\"" + value.name + "\"><div class=\"left\"><p class=\"title\">" + value.name + "</p><p style=\"margin: 0px; font-weight: bold;\">Company : " + value.company + "</p><p style=\"margin: 0px; font-weight: bold;\">Availability : " + value.availability + "</p><p>" + value.description + "</p><i></i></div></div>");
            }
            if (!stop) {
                if (value.author != null)
                    $("#bookshelf").append("<div class=\"demo tooltip\" onclick=\"showInfo(this)\" style=\"display: block;\"><img src=\"" + value.picture + "\" alt=\"" + value.name + "\"><div class=\"left\"><p class=\"title\">" + value.name + "</p><p style=\"margin: 0px; font-weight: bold;\">Author : " + value.author + "</p><p style=\"margin: 0px; font-weight: bold;\">Availability : " + value.availability + "</p><p>" + value.description + "</p><i></i></div></div>");
                else 
                    $("#bookshelf").append("<div class=\"demo tooltip\" onclick=\"showInfo(this)\" style=\"display: block;\"><img src=\"" + value.picture + "\" alt=\"" + value.name + "\"><div class=\"left\"><p class=\"title\">" + value.name + "</p><p style=\"margin: 0px; font-weight: bold;\">Company : " + value.company + "</p><p style=\"margin: 0px; font-weight: bold;\">Availability : " + value.availability + "</p><p>" + value.description + "</p><i></i></div></div>");
                stuffOnPage++;
            }
        });
    }

</script>
