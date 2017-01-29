<?php
/*
Template Name: Feedback-form
*/
get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="wrap-contact-us">
                        <div class="app-block-feedback">
                           <h2 class="responsive-heading">Contact Us</h2>
                        </div>

                <div class="contact-form-block">
                    <div class="address-block">
                        <h3><?php bloginfo('name') ?></h3>


                        <p><?php echo $mytheme['address']; ?></p>

                        <p class="phone-block">

                                Phone: <a href="tel:<?php echo $mytheme['phone']; ?>"><?php echo $mytheme['phone']; ?></a>
                           <br>
                        </p>
                        <div class="team-member">
                            <div class="social-icons">

                                <ul>

                                    <li><a href="<?php echo $mytheme['facebook']; ?>" target="_blank" title="facebook"><i class="fa fa-facebook fa-2x"></i></a></li>

                                    <li><a href="<?php echo $mytheme['twitter']; ?>" target="_blank" title="twitter"><i class="fa fa-twitter fa-2x"></i></a></li>

                                    <li><a href="<?php echo $mytheme['youtube']; ?>" target="_blank" title="youtube"><i class="fa fa-youtube fa-2x"></i></a></li>

                                    <li><a href="<?php echo $mytheme['instagram']; ?>" target="_blank" title="instagram"><i class="fa fa-instagram fa-2x"></i></a></li>

                                </ul>

                            </div>
                        </div>

                    </div>






                    <div class="form-block">
                        <h4>Contact form:</h4>
                        <form id='form-contact-us' action="<?php bloginfo(template_url); ?>/send1.php" method="POST" accept-charset="utf-8"  enctype="multipart/form-data">
                            <div class="field contact-us">
                                <div class="input-block">
                                    <input name="name" type="text" required="required" placeholder="*Your Name"  minlength="2" maxlength="30" title="Your Name">
                                </div>
                                <div class="input-block">
                                    <input name="phone" type="tel"  placeholder="*Phone" minlength="5" pattern="(\+?\d[- .]*){7,13}" required="required" title="International, national or local telephone number">
                                </div>
                                <div class="input-block">
                                    <input name="company" type="text" placeholder="*Your Company" minlength="2" maxlength="30" required="required" title="Your Company">
                                </div>
                                <div class="input-block">
                                    <input name="email" type="text" required="required" placeholder="*example@email.com" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" maxlength="30"  title="Your E-mail" >
                                </div>
                            </div>

                            <div class="form-group contact-us">
                                <label for="">File input:</label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control  filename-block" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                    <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input id="file" class="file" type="file" name ="mail_file"  ></span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                                <p class="help-file">Optional field to attach one file. Acceptable file types must be: jpg, jpeg or pdf. Max size of one file must be 512kb.</p>
                            </div>
                            <div class="form-group contact-us message">
                                <label>* Message/order details: </label>
                                        <textarea class="form-control"  rows="5" name="comment" minlength="20" title="Required field for your message  minimum 20 symbols"></textarea>
                                        <textarea class="form-control"  rows="5" name="message" minlength="20" title="Required field for your message  minimum 20 symbols"></textarea>
                                        <textarea class="form-control"  rows="5" name="wrapf2" minlength="20" title="Required field for your message  minimum 20 symbols"></textarea>

                            </div>

                            <!--</div>-->




                            <div class="security-question">

                                    <?php
                                    /*
                                     * Тут мы будем обрабатывать ошибки и выводить соответствующие сообщения
                                     */
                                    if( isset( $_GET['msg'] ) ) {
                                        // в случае успеха
                                        if( $_GET['msg'] == 'success' )
                                            echo '<span  class="msg-appear">Your message was sent successfully</span>';

                                        // в случае ошибки
                                        if( $_GET['msg'] == 'error' )
                                            echo '<span class="msg-appear"><strong>Required fields* are not filled corectly or the file type or size is forbidden<strong></span>';
                                        // вы сами можете добавить различные другие сообщения об ошибках

                                    }

                                    /*
                                     * Антиспам-трюк
                                     * у нас есть два фейковых поля, при заполнении которых прерывается выполнение скрипта
                                     * сделаем так, чтобы они были скрыты для пользователей при помощи CSS
                                     */
                                    echo '<style>textarea[name="comment"],textarea[name="message"]{display:none}</style>';
                                    ?>
                                    <div class="div-checkbox-agree">
                                        <input type="checkbox" name="formAgree" class="agree" value=""><span>I agree to process my personal data</span>
                                    </div>
                                    <button  id="submit" disabled type="submit" class="btn btn-default send btn-contact-us">Send</button>

                            </div>
                        </form>
                    </div>
                </div>





                        <div class="app-block contact-us">
                            <a href="<?php echo $mytheme['googlemaps']; ?>" title="Google Maps">

                            </a>
                        </div>

            </div>
        </main>
    </div>

<?php
get_footer();
	?>