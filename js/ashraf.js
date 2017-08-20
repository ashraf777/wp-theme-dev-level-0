// javascript functionality here
// jQuery.noConflict();
jQuery(document).ready(function($){
  $(document).on('click', '.container-fluid li:first-child', function(e){
    e.preventDefault();
    // alert('hello');
    $('.search-form-container').animate({width:'toggle'}, 300);

  });
});
