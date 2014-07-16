jQuery(document).ready(function ($) {

  // Responsive iframes and embed
  $('main').fitVids();

  // show/hide sidebar and set it's height
  $('.show_menu').click(function(){
    $('body').toggleClass('sidebar');

    var docHeight = $(document).height();
    var asideHeight = $('aside').innerHeight();

    if(asideHeight > docHeight){
      $('body')
        .css('min-height', asideHeight)
        .addClass('expanded_body');
      $('.expanded_body .show_menu').click(function(){
        $('.expanded_body').removeAttr('style');
      });
    }
    else{
      $('aside').height(docHeight);
    }
  });



});