<form id="enquiry_form" action="">

    <?php wp_nonce_field('wp_rest'); ?>

    <label for="">Name</label><br>
    <input type="text" name="name"> <br>

    <label for="">Email</label><br>
    <input type="text" name="email"> <br>

    <label for="">Phone</label><br>
    <input type="text" name="phone"> <br>

    <label for="">Your Message</label><br>
    <textarea name="message" id="" cols="10" rows="4"></textarea>

    <button type="submit">Submit</button>
</form>


<script>
    jQuery(document).ready(function($) {

        $("#enquiry_form").submit(function(event) {

            event.preventDefault();

            var form = $(this);

            console.log(form.serialize());

            $.ajax({

                type: "POST",
                url: "<?php echo get_rest_url(null, 'v1/submission-form/submit'); ?>",
                data: form.serialize()



            })
        });



    });
</script>