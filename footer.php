<?php
    $firstFirst = esc_attr(get_option('left_first'));
    $firstSecond = esc_attr(get_option('left_second'));
    $firstThird = esc_attr(get_option('left_third'));
    $secondFirst = esc_attr(get_option('right_first'));
    $secondSecond = esc_attr(get_option('right_second'));
    $secondThird = esc_attr(get_option('right_third'));
?>
<footer class="codesavages-footer  page-footer font-small teal pt-4">

    <!--<div class="container-fluid text-center text-md-left">

        <div class="row">

            <div class="col-md-4 offset-md-1 mt-md-0 mt-3 text-center">

                <h5 class="text-uppercase font-weight-bold">Kontakt</h5>
                <p><?php /*echo $firstFirst */?></p>
                <p><?php /*echo $firstSecond */?></p>
                <p><?php /*echo $firstThird */?></p>

            </div>
            <div class="col-md-1"></div>
            <hr class="clearfix w-100 d-md-none pb-3">


            <div class="col-md-4 offset-md-1 mb-md-0 mb-3 text-center">

                <h5 class="text-uppercase font-weight-bold">Partners</h5>
                <p><?php /*echo $secondFirst */?></p>
                <p><?php /*echo $secondSecond */?></p>
                <p><?php /*echo $secondThird */?></p>

            </div>
            <div class="col-md-1"></div>
            <div class="footer-copyright">
                © CodeSavages 2019
            </div>
        </div>
    </div>-->

    <div id="footer-sidebar" class="secondary">
        <div id="footer-sidebar1">
            <?php
            if(is_active_sidebar('footer-sidebar-1')){
                dynamic_sidebar('footer-sidebar-1');
            }
            ?>
        </div>
        <div id="footer-sidebar2">
            <?php
            if(is_active_sidebar('footer-sidebar-2')){
                dynamic_sidebar('footer-sidebar-2');
            }
            ?>
        </div>
        <div id="footer-sidebar3">
            <?php
            if(is_active_sidebar('footer-sidebar-3')){
                dynamic_sidebar('footer-sidebar-3');
            }
            ?>
        </div>
    </div>



</footer>

<?php wp_footer(); ?>
</body>
</html>