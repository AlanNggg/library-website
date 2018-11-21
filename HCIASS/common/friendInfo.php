<!DOCTYPE html>
<html>
<head>
    <style>
          address, dl, fieldset, figure, ol, p, pre, ul {
                margin: 0 0 0px 0;
            }
    html,body {
        height: 100%;
        background-image: url('image/bg/bg1.jpg');
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
<body>
    
        <div class=" uk-padding uk-panel">
                
                <div class="uk-flex uk-flex-center uk-margin-medium-top">
                <div class="uk-card uk-card-default uk-width-1-2@m ">
                    <div class="uk-card-header">
                           
                        <div class="uk-grid-small uk-flex-middle" uk-grid>
                            
                            <div class="uk-width-auto">
                                
                                <img class="uk-comment-avatar" width="200" height="200" src="./image/user/user3.jpeg">
                            </div>
                            <div class="uk-width-expand">
                                <h3 class="uk-card-title uk-margin-remove-bottom">Terry Fung</h3>
                                <p class="uk-text-meta uk-margin-remove-top">Student</p>
                                <a href="" class="uk-icon-button  uk-margin-small-right" uk-icon="google"></a>
                                <a href="" class="uk-icon-button" uk-icon="instagram"></a>
                            </div>
                        </div>
                    </div>
                    <div class="uk-card-body">
                           
                        <article class="uk-article">
                            <div class="" uk-scrollspy="cls: uk-animation-slide-left; repeat: true">
                                <h1 class="uk-article-title">About ME!</h1>
                                <p class="uk-article-meta">Written on 31 May 2018.  </p>
                            </div>
            
                            <p class="uk-text-lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                        
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p>經政的面望整，人意頭通河半，帶動節，了朋出父可似現歌日高克晚這醫與了又式定公活是友，天於國臉南天界電東人、不樣媽單就全國示嗎定人然價部何死現半、精認者準是拿華體人些地民我往衣業外商讀嗎前說！家靈們：覺謝金：會來地說能本與發安第五認在皮有不許兩以紅行錢以才望點白容蘭出總和，的說院種朋三父錯主且工且學世要自士區無稱康英節個，禮遊居。遠至大臉媽低公等發，民羅明時使天轉不大記客在黑確，世受滿今不廣方奇口。來保作意學教一說面身好代身魚所定些許一自的否半因企下說們其。</p>
                           
                        
                        </article>
                    </div>
                   
            
                    
                </div>
            </div>
            
            </div>

            <div class=" uk-padding uk-panel">
                
                <div class="uk-flex uk-flex-center uk-margin-medium-top">
                    <div class="uk-card uk-card-default uk-width-1-2@m ">
                        <div class="uk-card-header">
                                <h3 >What your friend reading</h3>
                                
                            <div class="uk-grid-small uk-flex-middle" >                                
                                <div class=".uk-width-1-5">
                                    
                                        <img onclick="bookInfo()" class="uk-comment-avatar uk-margin-medium-right" width="200" height="200" src="./img/books/B01.jpg">
                                        <img class="uk-comment-avatar uk-margin-medium-right" width="200" height="200" src="./img/books/B02.jpg">
                                        <img class="uk-comment-avatar uk-margin-medium-right" width="200" height="200" src="./img/books/B03.jpg">
                                        <img class="uk-comment-avatar uk-margin-medium-right" width="200" height="200" src="./img/books/B04.jpg">
                                    
                                </div>
                                
                            </div>
                        </div>
                       
                      
                
                </div>
            </div>
        </div>
    

         
      

       

        <!-- This is the modal -->
        <div id="modal-Into" uk-modal>
            <div class="uk-modal-dialog uk-modal-body">
                <h2 class="uk-modal-title">Intro.</h2>
                <form>
                        <fieldset class="uk-fieldset">
                    
                            <legend class="uk-legend">Modify</legend>
                    
                            <div class="uk-margin">
                                <input class="uk-input" type="text" placeholder="Input the title">
                            </div>
                    
                            
                    
                            <div class="uk-margin">
                                <textarea class="uk-textarea" rows="5" placeholder="Textarea"></textarea>
                            </div>
                    
                            <p class="uk-text-right">
                                    <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                                    <button class="uk-button uk-button-primary" type="button">Save</button>
                                </p>
                    
                        </fieldset>
                    </form>
            </div>
        </div>

        <div id="modal-cahngePwd" uk-modal>
                <div class="uk-modal-dialog uk-modal-body">
    
                    <form>
                            <fieldset class="uk-fieldset">
                        
                                <legend class="uk-legend">Change Password</legend>
                        
                                <div class="uk-margin">
                                    <input class="uk-input" type="password" placeholder="Input the password">
                                </div>
                        
                                <div class="uk-margin">
                                        <input class="uk-input" type="password" placeholder="Input the password again">
                                </div>
                                    
                        
                        
                                <p class="uk-text-right">
                                        <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                                        <button class="uk-button uk-button-primary" type="button">Save</button>
                                    </p>
                        
                            </fieldset>
                        </form>
                </div>
            </div>
    <script>
        function bookInfo(){
            window.location = "./?boofInfo=true";
        }
    </script>
</body>
</html>