<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
        <link rel="stylesheet" href="css/bootstrap.min.css">

    <link href="css/main.css" rel="stylesheet" />
  </head>
  <body>
       <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="s004">
      <form id="insta-form" method="post">
        <fieldset>
          <legend>Movie API</legend>
          <div class="inner-form">
            <div class="input-field">
                <div class="choices" data-type="text" aria-haspopup="true" aria-expanded="false" dir="ltr">
          <div class="choices__inner">
              <input class="form-control input_el" name="search" type="text"  autofocus placeholder="Type to search..."/></div></div>
              <button class="btn-search" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                </svg>
              </button>
            </div>
          </div>
            
          <div class="suggestion-wrap">
            <span>Avengers</span>
            <span>Bloodshot</span>
            <span>The Mummy</span>
            <span>Merry Men</span>
            <span>Wedding Party</span>
          </div>
        </fieldset>
      </form>
    </div>
    <script src="js/extention/choices.js"></script>
   

    
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/fancybox.min.css">

    <link rel="stylesheet" href="css/style.css">
    
 

  <div class="site-wrap" >

 

  
  <main class="main-content">
    <div class="container-fluid photos">

      <div class="row pt-4 mb-5 text-center" style="padding-top:60px !important;">
        <div class="col-12">
          <h2 class="text-white mb-4 title_search"></h2>
        </div>
      </div>

      <div class=" elements row align-items-stretch  justify-content-center">
          
        <div class=" roler lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
              </div>
        </div>


      <div class="row justify-content-center">
        <div class="col-md-12 text-center py-5">
          <p>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This was created by <i class="icon-heart" aria-hidden="true"></i> by <a href="https://cognative.com.ng" target="_blank" >Cognative</a>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      </p>
        </div>
      </div>
    </div>
  </main>

</div> <!-- .site-wrap -->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/jquery.fancybox.min.js"></script>

  <script src="js/main%20(2).js"></script>
    <script>
						jQuery(document).ready(function(){
                            $('.input_el').focusin();
                          $('.site-wrap').hide();
                            $('.roler').hide();
                        
						jQuery("#insta-form").submit(function(e){
                            
                            $('.roler').show();
                           $('.title_search').html('Results for '+"'"+$('.input_el').val()+"'");
                            $('.site-wrap').show();
                            $('.elem').remove();
                               $('html, body').animate({
    scrollTop: $(".site-wrap").offset().top
}, 1000);
        		 

                                          
								e.preventDefault();
								var formData = jQuery(this).serialize();
                                      
                       $.ajax({
                           
									type:"POST",
									url:"process.php",
									data:formData,
                           
									success: function(response){
									if(response =='Could not resolve host: www.imdb.com')
									{	
                                        
             console.log(response);
									  
									}else
									{
                                   if(response==''){
                                       
    $(".elements").append('<div class=" elem col-6 col-md-6 col-lg-3" data-aos="fade-up">No results were found</div>');
                                   }
                              var arr = $.parseJSON(response);
                                        
                                        $('.roler').hide();//convert to javascript array
                                     if(arr.length==0){
                                         
                                     }
$.each(arr,function(key,value){
    var name=value['name'];
var link=value['link'];
var image=value['image'];
var date=value['date'];
  
    $(".elements").append('<div class=" elem col-6 col-md-6 col-lg-3" data-aos="fade-up"><a href="https://www.imdb.com'+link+'" target="_blank" class="d-block photo-item" ><img src="'+image+'" alt="Image" class="img-fluid"><div class="photo-text-more"><h3 class="heading">'+name+' ('+date+')</h3><span class="icon icon-search"></span></div> </a></div>');
    
});
                                        
                                        
                                        //alert(response);
                                         
									
									 }
									
                      }
								});
								return false;
							});
									
							
						});							
							
				
						</script>
  </body>
</html>