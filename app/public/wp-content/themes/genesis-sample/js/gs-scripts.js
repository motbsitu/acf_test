
jQuery(document).ready(function($){

 $('#div1').show();
 $('#div2, #div3').hide();

 $('.showSingle').click(function(){
       $('.targetDiv').hide();
       $('#div'+$(this).attr('target')).show();
 });
});
