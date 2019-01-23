<!--  Contact Form   -->

<form id="codesavagesContactForm" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">

    <div class="form-group">
        <input type="text" class="form-control" placeholder="Your Name" id="name" name="name" required>
        <small class="text-danger form-control-msg">Your Name is required</small>
    </div>

    <div class="form-group">
        <input type="email" class="form-control" placeholder="Your Email" id="email" name="email" required>
        <small class="text-danger form-control-msg">Your Email is required</small>
    </div>

    <div class="form-group">
       <textarea name="message" id="message" class="form-control" placeholder="Your Message" required></textarea>
       <small class="text-danger form-control-msg">Your Message is required</small>
    </div>

    <button type="submit" class="btn btn-dark">Submit</button>
    <small class="text-info form-control-msg js-form-submission">Submission in process..</small>
    <small class="text-success form-control-msg js-form-success">Message Successfully submitted..</small>
    <small class="text-danger form-control-msg js-form-error">There was a problem, Pls try again..</small>
</form>   