<?php global $mytheme; ?>
	<footer>
	<div class="copyrights">
		<div class="left">
			<p><?php bloginfo('name') ?> <?php the_time('Y'); ?>&nbsp;&nbsp;&nbsp;All right Reserved</p>
		</div>
		<span class="code-footer"><?php echo $mytheme['metrika']; ?></span>
		<div class="right"><a href="#">Design Company</a> </div>
	</div>
</footer>




<!-- Modal Form-->

<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="row">

			<div class="panel panel-info">
				<div class="panel-heading inqure-modal">
					<h3 class="panel-title">Request a Quote</h3>
				</div>
				<div class="panel-body">
					<div class="alert alert-success hidden" role="alert" id="successMessage">
						<strong>Внимание!</strong> Ваше сообщение успешно отправлено.
					</div>
					<form id="contactForm" action="<?php bloginfo(template_url); ?>/send1.php" method="POST" accept-charset="utf-8"  enctype="multipart/form-data">
						<div class="row">
							<div id="error" class="col-sm-12" style="color: #ff0000; margin-top: 5px; margin-bottom: 5px;"></div>
							<div class="col-sm-6">
								<div class="form-group has-feedback">
									<label for="name" class="control-label">*Your name:</label>
									<input type="text" id="name" name="name" class="form-control" required="required" value="" placeholder="Your Name" minlength="2" maxlength="30" title="Your Name">
									<span class="glyphicon form-control-feedback"></span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group has-feedback">
									<label for="name" class="control-label">*Your Phone Number:</label>
									<input type="tel"  id="tel" name="phone" title="International, national or local telephone number" placeholder="Phone" minlength="5" pattern="(\+?\d[- .]*){7,13}" class="form-control" required="required" value="" />
									<span class="glyphicon form-control-feedback"></span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group has-feedback">
									<label for="name" class="control-label">*Your Company:</label>
									<input name="company" type="text" id="company"  class="form-control" required="required" value="" placeholder="Your company" minlength="2" maxlength="30" title="Your Company">
									<span class="glyphicon form-control-feedback"></span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group has-feedback">
									<label for="email" class="control-label">*Your email:</label>
									<input name="email" type="email" id="email"  class="form-control" required="required"  value="" placeholder="example@email.com" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" maxlength="30" title="Your E-mail">
									<span class="glyphicon form-control-feedback"></span>
								</div>
							</div>
						</div>
                        <!-- File input -->
                        <div class="form-group ">
                            <label>File input:</label>
                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                <div class="form-control filename-block" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input id="file-modal" class="file" type="file" name ="mail_file"></span>
                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                            <p class="help-file-modal">Optional field to attach one file. Acceptable file types are: jpg, jpeg or pdf. Max size of one file must be 512kb.</p>
                        </div>
						<!-- End File input -->
						<div class="form-group  has-feedback">
							<label for="message" class="control-label">* Message/order details:</label>
							<textarea name="comment" class="form-control" rows="3" minlength="20" title="Required field for your message  minimum 20 symbols"></textarea>
							<textarea name="message" class="form-control" rows="3" minlength="20" title="Required field for your message  minimum 20 symbols"></textarea>
							<textarea id="message"  name="wrapf2" class="form-control" rows="3" minlength="20" title="Required field for your message  minimum 20 symbols"></textarea>
						</div>

                        <div class="security-question footer">
                            <div>
                                <?php
                                if( isset( $_GET['msg'] ) ) {

                                    if( $_GET['msg'] == 'success' )
                                        echo '<span class="msg-appear">Your message was sent successfully</span>';

                                    if( $_GET['msg'] == 'error' )
                                        echo '<span class="msg-appear"><strong>Required fields* are not filled corectly<strong></span>';
                                }
                                ?>

								<div class="div-checkbox-agree">
									<label><input type="checkbox" name="formAgree" class="agree-modal" value=""><span>I agree to process my personal data</span></label>
								</div>
							</div>
							<button  disabled type="submit" class="btn btn-default send btn-modal">Send</button>
                        </div>
					</form>

				</div>

			</div>
		</div>
	</div>
</div>
<!-- /.Modal Form -->
			<?php wp_footer(); ?>

		</body>
	</html>