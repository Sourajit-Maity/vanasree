$(document).ready(function() {
            $(".togglenavbar").click(function() {
                $(".sidenav").toggleClass("sidenav-open");
            });
            $(".togglenavbar").click(function(){
                $('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').toggleClass('open');
            });
            var media = $(window).width();
            if (media < 760){
                    $(".navbar-secondary").parent().hover(function() {
                        $(".navbar-secondary").hide();
                        $(this).children(".navbar-secondary").show();
                    });

            } else {
                $(".navbar-secondary").parent().mouseenter(function() {
                    $(".secondlevelmenu").empty();
                    $(this).children(".navbar-secondary").clone().appendTo(".secondlevelmenu");
                    $(".secondlevelmenu").children(".navbar-secondary").show();
                    $(".secondlevelmenu").children(".navbar-secondary").css("height", "50px");
                    $(".secondlevelmenu").children(".navbar-secondary").css("opacity", "1");

                });
                // $(".infolink").attr("href", "introduction.html");
                //  $(".premiumlink").attr("href", "festival.html");
                //  $(".roomlink").attr("href", "26mroom.html");
                //  $(".businesslink").attr("href", "brand.html");
                //  $(".communitylink").attr("href", "gallery.html");
            } 
        });