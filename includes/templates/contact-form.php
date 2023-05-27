<?php if(get_plugin_options('contanct_plugin_active') ): ;?>
<div id="form_success" style="background: green, color: white"></div>
<div id="form_error" style="background: red, color: white"></div>

<form id="enquiry_form">

<?php wp_nonce_field('wp_rest'); ?>

<label>Name</label></br>
<input type="text" name="name"><br /><br />

<label>Email</label></br>
<input type="text" name="email"><br /><br />

<label>Phone</label></br>
<input type="text" name="phone"><br /><br />

<label>Your Message</label></br>
<textarea name="message"></textarea><br /><br />

<button type="submit">Submit form</button>

</form>

<script>

    jQuery(document).ready(function($){

        $("#enquiry_form").submit(function(event){

            event.preventDefault();

            var form = $(this);

            $.ajax({
                type: "POST",
                url: "<?php echo get_rest_url(null, 'v1/contact-form/submit'); ?>",
                data: form.serialize(),
                success: function() {
                    form.hide();

                    $("#form_success").html("Your message was send").fadeIn();
                },
                error: function() {

                    $("#form_error").html("There was an error submitting your form").fadeIn();

                }
            })

        });

    });

</script>
<?php endif; ?>