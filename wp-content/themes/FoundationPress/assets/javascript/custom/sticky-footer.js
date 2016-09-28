
$(window).bind(' load resize orientationChange ', function () {
   var flag = $(".fp-flag__wrapper");

   if(flag.length){
       stickySidebar(flag);
   } else {

       var footer = $("#footer-container");
       var pos = footer.position();
       var height = $(window).height();
       height = height - pos.top;
       height = height - footer.height() -1;

       if (height > 0) {
         stickyFooter(footer, height);
       }
   }
});

function stickyFooter(footer, height) {
  footer.css({
      'margin-top': height + 'px'
  });
}

function stickySidebar(flag){
    //var flag = $(".fp-flag__wrapper");
    var flagpos = flag.position();
    var flagpostop = flagpos.top;

    var footer = $("#footer-container");
    var footerpos = footer.position();
    var footerpostop = footerpos.top;
    var footerheight = footer.height();

    var windowheight = $(window).height();
    var footercheck = windowheight - footerpostop -footerheight -1;
    var sidebarheight;

    if(footercheck > 0){

        //sidebar is tall enough, yo
        //sidebarheight = windowheight - flagpostop - footerheight;

    }else{

        sidebarheight = footerpostop - flagpostop;

    }

    flag.css({
       'height' : sidebarheight + 'px'
    });

}
/*
$(window).bind(' load resize orientationChange ', function () {
    var flag = $(".fp-flag__wrapper");
    var flagpos = flag.position();
    var flagpostop = flagpos.top;

    var footer = $("#footer-container");
    var footerpos = footer.position();
    var footerpostop = footerpos.top;
    var footerheight = footer.height();

    var windowheight = $(window).height();
    var footercheck = windowheight - footerpostop -footerheight -1;
    var sidebarheight;

    if(footercheck > 0){

        sidebarheight = windowheight - flagpostop - footerheight;

    }else{

        sidebarheight = footerpostop - flagpostop;
    }

    flag.css({
       'height' : sidebarheight + 'px'
    });
});
*/
