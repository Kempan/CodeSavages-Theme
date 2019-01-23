<form id="codesavagesContactForm" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">

    <div class="form-group">
        <input type="text" class="form-control" placeholder="Your Name" id="name" name="name" required="required">
    </div>

    <div class="form-group">
        <input type="email" class="form-control" placeholder="Your Email" id="email" name="email" required="required">
    </div>

    <div class="form-group">
       <textarea name="message" id="message" class="form-control" placeholder="Your Message" required="required"></textarea>
    </div>

    <button type="submit" class="btn btn-dark">Submit</button>

</form>   