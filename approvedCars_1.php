<?php

include("includes/header.php");
$testimonials = $get->get_all_data('tbl_testimonial', 'id', 'desc');
$makers = $get->get_all_data('tbl_maker', 'id', 'asc');
$bodyType = $get->get_all_data('tbl_body_type', 'id', 'asc');
$approved_cars = $get->get_all_approved_card();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript">
    _atrk_opts = {atrk_acct: "gQWwn1QolK10O7", domain: "alwakalat.com", dynamic: true};
    (function () {
        var as = document.createElement('script');
        as.type = 'text/javascript';
        as.async = true;
        as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js";
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(as, s);
    })();
</script>
<noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=gQWwn1QolK10O7" style="display:none" height="1" width="1" alt="" /></noscript>
<section>
    <div id="process">
        <?php
         for ($x = 0; $x <= 10; $x++) {  ?>
             <input type="button" class="addButton" value="test<?php echo $x ?>" >
            <?php } ?>
        
        <div id="textfield"></div>
    </div>
<script>
     $(document).ready(function(){
    $(".addButton").on("click", function(){ 
        var name = $(this).val(); 
    $.ajax({
        type: 'POST',
        url: 'http://www.alwakalat.com/wlscript.php',
        data: {
            service: name
        },
        function(results) { 
            alert(results);
    });
    $('#textfield').append(data);
     });     
     }); 
    </script>
</section>



<script>
//    $(document).ready(function(){
//    $(".addButton").on("click", function(event){ 
//        alert('Button click');
//        event.preventDefault();
//        var button = $(this);
//        var parent = button.parent();
//        var wlproducturl = parent.find("input[name$='.id']").val(); alert(wlproducturl);
//        var wlproduct = parent.find("input[name$='.name']").val();alert(wlproduct);
//
//            $.ajax({
//        type : "POST",
//        url : "wlscript.php",
//        data : { wlproduct : wlproduct, wlproducturl : wlproducturl }, 
//        success : function(data) { 
//        $('div#resultwish').html('<div class="alert alert-success in fade" ><button type="button" class="close" data-dismiss="alert">×</button>You added '+wlproducturl+' '+wlproduct+'\'s to your wishlist.</div>');
//        }
//    }); 
//
//        // alert("Add article with id = " + idArticle + " and name = " + nameArticle);
//    });
//}); 
</script>    
<?php include("includes/footer.php"); ?>
