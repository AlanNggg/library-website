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

    #bookshelf div img {
        /* max-width: 100%;
        max-height: 100%; */
        width: 120px;
        height: 170px;
        object-fit: cover;
    }

    .demo {
        position: relative;
        float: left;
        width: 120px;
        height: 170px;
        background-color: white;
        margin: 30px 50px;
        text-align: center;
        cursor: pointer;
    }

    #arrow {
        display: none;
        position: absolute;
        left: 4%;
        top: 16%;
        width: 150px;
        height: 70px;
        opacity: 0.9;
        z-index: 2;
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

            getResult(keyword, attribute);
        });
    });

    function getResult(keyword, attribute) {

       $("#bookshelf").empty();
       $("#searchForm").css('align-items', 'flex-start');
       $("#searchForm").css('padding-top', '100px');
       $("#searchIcon").css('top', '10px');
       $("#searchSection").css('height', '30%');
       $("#arrow").css('display', 'block');

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

<body>
    
    <div id="searchSection" style="height: 100%; width: 100%;">
        <div id="arrow">
            <div id="forwardArrow"></div>
            <div id="backArrow"></div>
        </div>
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
            <div class="message-box" style="clear: left"></div>
        </form>
    </div>
    <section style="position: relative; width: 100%; height: 70%;">
        <div id="bookshelf" style="position: absolute; width: 100%; height: 100%; z-index: 1;">

            
        </div>

    </section>
    

</body>

</html>

<script type="text/javascript">
    var stop = false;
    var stuffOnPage = 0;

    $(document).ready(function() {
        var onPageStuff = 0;
        var previousPageStuff = 0;
        $("input[type='checkbox']").each(function () {
            this.setAttribute("checked", "checked");
        });

        $("input[type='checkbox']").change(function () {
            onPageStuff = 0;
            previousPageStuff = 0;
            var DOM = this;

            if ($('input:checkbox:checked').length == 3) {
                location.reload();
            } else if (DOM.checked) {
                if (DOM.value == "book") {
                    showSelected("book");
                } else if (DOM.value == "magazine") {
                    showSelected("magazine");
                } else if (DOM.value == "software") {
                    showSelected("software");
                }

            } else {
                $(".demo").each(function () {
                    if ($(this).hasClass(DOM.value)) {
                        $(this).css("display", "none");
                        $(this).addClass("notshow");
                        $(this).removeClass("previouspage");
                        $(this).removeClass("nextpage");
                    }
                });
                $(".demo").each(function () {
                    if ($(this).css("display") == "block") {
                        onPageStuff++;
                    }
                });
                $(".demo").each(function () {
                    console.log("ON Page : " + onPageStuff);
                    if (!$(this).hasClass("notshow") && !$(this).hasClass(DOM.value) && $(this).hasClass("nextpage") && onPageStuff < stuffOnPage) {
                        $(this).css("display", "block");
                        $(this).removeClass("nextpage");
                        onPageStuff++;
                    }
                });

                $(".demo").each(function () {
                    if ($(this).hasClass("previouspage") && !$(this).hasClass("notshow")) {
                        previousPageStuff++;
                        console.log(previousPageStuff);
                    }
                });

                //以下implementation 作用一樣

                //如果在 中間頁 移除 DEMO, 檢查 前頁 DEMO 數量, 並移 當前頁 DEMO 到 前頁
                if (previousPageStuff < stuffOnPage) {

                    $(".demo").each(function () {
                        if ($(this).css("display") == "block") {
                            $(this).css("display", "none");
                            $(this).addClass("previouspage");

                            previousPageStuff++;
                            onPageStuff = 0;
                            $(".demo").each(function () {
                                if ($(this).css("display") == "block") {
                                    onPageStuff++;
                                }
                            });
                            console.log(" 1 :: " + onPageStuff);
                            $(".demo").each(function () {
                                console.log("ON Page : " + onPageStuff);
                                if (!$(this).hasClass("notshow") && !$(this).hasClass(DOM.value) && $(this).hasClass("nextpage") && onPageStuff < stuffOnPage) {
                                    $(this).css("display", "block");
                                    $(this).removeClass("nextpage");
                                    onPageStuff++;
                                }
                            });
                        }
                    });
                }
                $("#backArrow").trigger("click");

                previousPageStuff = 0;
                $(".demo").each(function () {
                    if ($(this).hasClass("previouspage") && !$(this).hasClass("notshow")) {
                        previousPageStuff++;
                    }
                });
                console.log("Previous Page Stuff : " + previousPageStuff);
                //如果在 中間頁 移除 DEMO, 檢查 前頁 DEMO 數量, 並移 當前頁 DEMO 到 前頁
                if (previousPageStuff < stuffOnPage) {
                    var shiftNum = stuffOnPage - previousPageStuff;

                    console.log("New " + shiftNum);
                    $(".demo").each(function (index, value) {
                        console.log(index);
                        if ($(this).css("display") == "block") {
                            if (shiftNum <= 0) {
                                return;
                            } else {
                                console.log("YESYES");
                                $(this).css("display", "none");
                                $(this).addClass("previouspage");
                                shiftNum--;
                            }
                            console.log("shiftNUMMM " + shiftNum);
                        }
                    });
                }

                $("#backArrow").trigger("click");
            }
        });

        $("#forwardArrow").click(function () {
            stop = false;
            var nextPageStuff = 0;
            $(".demo").each(function () {
                if ($(this).hasClass("nextpage") && !$(this).hasClass("notshow")) {
                    nextPageStuff++;
                }
            });
            if (nextPageStuff > 0) {
                $(".demo").each(function () {
                    if ($(this).css("display") != "none" && !$(this).hasClass("nextpage")) {
                        $(this).addClass("previouspage");
                        $(this).css("display", "none");
                    }
                });
                $(".demo").each(function () {
                    if ($(this).css("display") == "none" && $(this).hasClass("nextpage") && !$(this).hasClass("notshow") && !stop) {
                        $(this).css("display", "block");
                        $(this).removeClass("nextpage");
                    }
                    var picture = $(this).offset();
                    var arrow = $("#backArrow").offset();
                    if (((arrow.top - picture.top) < 200) && ((arrow.left - picture.left) < 350)) {
                        stop = true;
                        console.log("yes");
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
                        $(this).css("display", "none");
                    }
                });
                $($(".demo").get().reverse()).each(function () {
                    if ($(this).css("display") == "none" && $(this).hasClass("previouspage") && !$(this).hasClass("notshow") && onPageStuff < stuffOnPage) {
                        $(this).css("display", "block");
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
        var i = 0; 
        var search = result.search;
        $.each(search, function (index, value) {
            console.log("yoyoyoyoyoyoyoyo");
            if ($(".demo").length > 7) {
                $(".demo").each(function () {
                    var picture = $(this).offset();
                    var arrow = $("#backArrow").offset();

                    // console.log("Picture TOP " + picture.top + "Picture LEFT " + picture.left);
                    // console.log("Arrow TOP " + arrow.top + "Arrow LEFT " + arrow.left);

                    // if (((arrow.top - picture.top) < 200) && ((arrow.left - picture.left) < 350)) {
                    //     // console.log(i + " : Picture TOP " + picture.top + "Picture LEFT " + picture.left);
                    //     // console.log("Arrow TOP " + arrow.top + "Arrow LEFT " + arrow.left);

                        // i++;
                        stop = true;
                        $("#bookshelf").append("<div class=\"demo nextpage\" onclick=\"showInfo(this)\" style=\"display: none;\"><img src=\"" + value.picture + "\" alt=\"" + value.name + "\"></div>");
                    //}
                });
            }
            if (!stop) {
                $("#bookshelf").append("<div class=\"demo\" onclick=\"showInfo(this)\" style=\"display: block;\"><img src=\"" + value.picture + "\" alt=\"" + value.name + "\"></div>");
                stuffOnPage++;
            }
        });
    }

</script>
