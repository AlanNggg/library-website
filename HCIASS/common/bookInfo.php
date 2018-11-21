<!DOCTYPE html>
<html>
<head>
    <style>
          address, dl, fieldset, figure, ol, p, pre, ul {
                margin: 0 0 0px 0;
            }
    html,body {
        height: 100%;
        background-image: url('./img/books/B01.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        overflow-y: auto;
        background-color: hsla(0,0%,100%,0.70);
    }

    body {
        height: 100%;
        width: 100%;
    }
    </style>
   
</head>
<body>
    
        <div class=" uk-padding uk-panel">
                
                <div class="uk-flex uk-flex-center uk-margin-medium-top">
                <div class="uk-card uk-card-default uk-width-1-2@m ">
                    <div class="uk-card-header">
                           
                        <div class="uk-grid-small uk-flex-middle" uk-grid>
                            
                            <div class="uk-width-auto">
                                
                                <img class="uk-comment-avatar" width="200" height="200" src="./img/books/B01.jpg">
                            </div>
                            <div class="uk-width-expand">
                                <h3 id="book_title" class="uk-card-title uk-margin-remove-bottom">Terry Fung</h3>
                                <p id="book_author" class="uk-text-meta uk-margin-remove-top">Student</p>
                                <p id="book_ISBN" class="uk-text-meta uk-margin-remove-top">BF001</p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="uk-card-body">
                           
                        <article class="uk-article">
                            <div class="" uk-scrollspy="cls: uk-animation-slide-left; repeat: true">
                                <h1 class="uk-article-title">Description</h1>
    
                            </div>
            
                            <p class="uk-text-lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                        
                           
                           
                        
                        </article>
                        <div class="uk-modal-footer uk-text-center uk-margin-large-top">
                            <button class="uk-button uk-button-primary uk-width-1-2" type="button">Book</button>
                    </div>
                    </div>
                   
            
                    
                </div>
            </div>
            
            </div>

    

         
      <script>
          var bookInfo;
          $(document).ready(function() {
            $.post("api/?action=get_book_info",function(e){
                var book = e.book[0];
                bookInfo = book;
                console.log(bookInfo);
                $("#book_title").html(bookInfo.name);
                $("#book_author").html(book.author);
            });
           
        });
       
      </script>


        
</body>
</html>