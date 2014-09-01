<?php	
/*
Template Name: Home Page
*/
?>

<?php get_header(); ?>
<?php 
$warning = get_option('AboutMe_warning'); 
?>
<!-- FALLBACK MESSAGE FOR OLDER BROWSERS  -->
<div class="<?php if (empty($warning)) { echo 'hide'; } else { echo 'fallback-message'; } ?>">
<?php echo $warning; ?>
</div>
<?php 
$homepage = get_option('AboutMe_homepage_text'); 
$aboutme = get_option('AboutMe_aboutme_text'); 
$resume = get_option('AboutMe_resume_text'); 
$skills = get_option('AboutMe_skills_text'); 
$portfolio = get_option('AboutMe_portfolio_text'); 
$blog = get_option('AboutMe_blog_text'); 
$bloglink = get_option('AboutMe_blog_link'); 
$contact = get_option('AboutMe_contact_text'); 
$hidehomepage2 = get_option('AboutMe_hide_homepage'); 
$hideabout2 = get_option('AboutMe_hide_about'); 
$hideresume2 = get_option('AboutMe_hide_resume'); 
$hideskills2 = get_option('AboutMe_hide_skills'); 
$hideportfolio2 = get_option('AboutMe_hide_portfolio');
$hideblog2 = get_option('AboutMe_hide_blog');
$hidecontact2 = get_option('AboutMe_hide_contact');
$subnav = get_option('AboutMe_hide_subnav');
?>  
<!-- OVRVIEW BUTTON  -->
<a href="#overview" class="overview-button"><img src="<?php echo get_template_directory_uri(); ?>/images/overview.png" alt="" /></a>
<div class="panel">
    <?php wp_nav_menu( array( 'theme_location' => 'sub-menu' )); ?>
    <div class="clr"></div>
</div>
<a class="<?php if ($subnav == "true") { echo 'hide'; } else { echo 'trigger'; } ?>" href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/menu.png" alt="" /></a> 
<!-- NAVIGATION  -->    
<ul id="navigation">
    <li <?php if ($hidehomepage2 == "true") { echo 'class="hide"'; } ?>><a href="#home"><img src="<?php echo get_template_directory_uri(); ?>/images/home.png" alt="" /><span><?php if (!empty($homepage)) { echo $homepage; } else { echo 'Home'; } ?></span></a></li>
    <li <?php if ($hideabout2 == "true") { echo 'class="hide"'; } ?>><a href="#about"><img src="<?php echo get_template_directory_uri(); ?>/images/about.png" alt="" /><span><?php if (!empty($aboutme)) { echo $aboutme; } else { echo 'About'; } ?></span></a></li>
    <li <?php if ($hideresume2 == "true") { echo 'class="hide"'; } ?>><a href="#resume"><img src="<?php echo get_template_directory_uri(); ?>/images/resume.png" alt="" /><span><?php if (!empty($resume)) { echo $resume; } else { echo 'Resume'; } ?></span></a></li>
    <li <?php if ($hideskills2 == "true") { echo 'class="hide"'; } ?>><a href="#skills"><img src="<?php echo get_template_directory_uri(); ?>/images/skills.png" alt="" /><span><?php if (!empty($skills)) { echo $skills; } else { echo 'Skills'; } ?></span></a></li>
    <li <?php if ($hideportfolio2 == "true") { echo 'class="hide"'; } ?>><a href="#portfolio"><img src="<?php echo get_template_directory_uri(); ?>/images/portfolio.png" alt="" /><span><?php if (!empty($portfolio)) { echo $portfolio; } else { echo 'Portfolio'; } ?></span></a></li>
    <li <?php if ($hidecontact2 == "true") { echo 'class="hide"'; } ?>><a href="#contact"><img src="<?php echo get_template_directory_uri(); ?>/images/contact.png" alt="" /><span><?php if (!empty($contact)) { echo $contact; } else { echo 'Contact'; } ?></span></a></li>
    <li <?php if ($hideblog2 != "true") { echo 'class="hide"'; } ?>><a href="<?php echo $bloglink ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/blog.png" alt="" /><span><?php if (!empty($blog)) { echo $blog; } else { echo 'My Blog'; } ?></span></a></li> 
</ul>    
<div id="impress">
    <!-- HOMEPAGE  -->
    <?php 
$hidehomepage = get_option('AboutMe_hide_homepage'); 
$hideabout = get_option('AboutMe_hide_about'); 
$hideresume = get_option('AboutMe_hide_resume'); 
$hideskills = get_option('AboutMe_hide_skills'); 
$hideportfolio = get_option('AboutMe_hide_portfolio'); 
$hidecontact = get_option('AboutMe_hide_contact'); 
    ?>
    <div id="home" class="<?php if ($hidehomepage == "true") { echo 'hide'; } else { echo 'step'; }?>" data-x="950" data-y="-700" data-scale="6">
        <div class="box effect">
            <div class="home-grid">
                <!-- SLIDER  -->
                <?php get_template_part( 'includes/slider', 'template'); ?>
            </div>
            <div class="home-grid2">
                <h1><?php echo get_option('AboutMe_your_name'); ?></h1>
                <h2><?php echo get_option('AboutMe_your_job'); ?></h2>
                <ul class="icons">
                    <?php
$facebook = get_option('AboutMe_facebook_uid');
$twitter = get_option('AboutMe_twitter_uid');
$flickr = get_option('AboutMe_flickr_uid');
$linkedin = get_option('AboutMe_linkedin_uid');
$delicious = get_option('AboutMe_delicious_uid');
$stumble = get_option('AboutMe_stumble_uid');
$youtube = get_option('AboutMe_youtube_uid');		
$devianart = get_option('AboutMe_devianart_uid');
$digg = get_option('AboutMe_digg_uid');
$techrohni = get_option('AboutMe_techrohni_uid');
$mailicon = get_option('AboutMe_mail_uid');
$rssicon = get_option('AboutMe_rss_uid');
$customicon = get_option('AboutMe_custom_uid');
$customiconicon = get_option('AboutMe_customicon_uid');
$secondcustomicon = get_option('AboutMe_secondcustom_uid');
$secondcustomiconicon = get_option('AboutMe_secondcustomicon_uid');
$thirdcustomicon = get_option('AboutMe_thirdcustom_uid');
$thirdcustomiconicon = get_option('AboutMe_thirdcustomicon_uid');

if (!empty($facebook)) { echo '<li class="icon"><a href="' . $facebook . '">' . '<img src="' . get_template_directory_uri() . '/images/social-icons/facebook.png" alt="">' . '</a></li>'; }
					
if (!empty($twitter)) { echo '<li class="icon"><a href="' . $twitter . '">' . '<img src="' . get_template_directory_uri() . '/images/social-icons/twitter.png" alt="">' . '</a></li>'; }
					
if (!empty($flickr)) { echo '<li class="icon"><a href="' . $flickr . '">' . '<img src="' . get_template_directory_uri() . '/images/social-icons/flickr.png" alt="">' . '</a></li>'; }

if (!empty($linkedin)) { echo '<li class="icon"><a href="' . $linkedin . '">' . '<img src="' . get_template_directory_uri() . '/images/social-icons/linkedin.png" alt="">' . '</a></li>'; }
					
if (!empty($delicious)) { echo '<li class="icon"><a href="' . $delicious . '">' . '<img src="' . get_template_directory_uri() . '/images/social-icons/delicious.png" alt="">' . '</a></li>'; }	
					
if (!empty($stumble)) { echo '<li class="icon"><a href="' . $stumble . '">' . '<img src="' . get_template_directory_uri() . '/images/social-icons/stumbleupon.png" alt="">' . '</a></li>'; }
					
if (!empty($devianart)) { echo '<li class="icon"><a href="' . $devianart . '">' . '<img src="' . get_template_directory_uri() . '/images/social-icons/devianart.png" alt="">' . '</a></li>'; }	
					
if (!empty($digg)) { echo '<li class="icon"><a href="' . $digg . '">' . '<img src="' . get_template_directory_uri() . '/images/social-icons/digg.png" alt="">' . '</a></li>'; }	
					
if (!empty($techrohni)) { echo '<li class="icon"><a href="' . $techrohni . '">' . '<img src="' . get_template_directory_uri() . '/images/social-icons/techrohni.png" alt="">' . '</a></li>'; }					
					
if (!empty($youtube)) { echo '<li class="icon"><a href="' . $youtube . '">' . '<img src="' . get_template_directory_uri() . '/images/social-icons/youtube.png" alt="">' . '</a></li>'; }
					
if (!empty($mailicon)) { echo '<li class="icon"><a href="' . $mailicon . '">' . '<img src="' . get_template_directory_uri() . '/images/social-icons/mail.png" alt="">' . '</a></li>'; }
					
if (!empty($rssicon)) { echo '<li class="icon"><a href="' . $rssicon . '">' . '<img src="' . get_template_directory_uri() . '/images/social-icons/rss.png" alt="">' . '</a></li>'; }

if (!empty($customicon)) { echo '<li class="icon"><a href="' . $customicon . '">' . '<img src="' . $customiconicon . '" alt="">' . '</a></li>'; }

if (!empty($secondcustomicon)) { echo '<li class="icon"><a href="' . $secondcustomicon . '">' . '<img src="' . $secondcustomiconicon . '" alt="">' . '</a></li>'; }

if (!empty($thirdcustomicon)) { echo '<li class="icon"><a href="' . $thirdcustomicon . '">' . '<img src="' . $thirdcustomiconicon . '" alt="">' . '</a></li>'; }

		?>
                </ul>
            </div>
        </div>
    </div>
    <!-- ABOUT ME  -->
    <div id="about" class="<?php if ($hideabout == "true") { echo 'hide'; } else { echo 'step'; } ?>" data-x="-800" data-y="2800" data-z="-1000" data-rotate="90" data-scale="4">
        <div class="map-effect">
            <div class="about-panel">
                <div class="page-info">
                    <?php $aboutdescription = wpautop(get_option('AboutMe_description')); ?>
                    <?php echo stripslashes(do_shortcode($aboutdescription)); ?>
                    <?php
$name = get_option('AboutMe_about_name');
$age = get_option('AboutMe_about_age');
$birth = get_option('AboutMe_about_birth');
$email = get_option('AboutMe_about_email');
$phone = get_option('AboutMe_about_phone');
$freelance = get_option('AboutMe_about_freelance');
$address = get_option('AboutMe_about_address');
                    ?>
                    <div class="about-grid-left">
                        <?php if (!empty($name)) { echo '<p><span class="label">' . __( 'Name', 'aboutme-wp' ) . ':</span>' . $name . '</p>'; } ?>
                        <?php if (!empty($age)) { echo '<p><span class="label">' . __( 'Age', 'aboutme-wp' ) . ':</span>' . $age . '</p>'; } ?>
                        <?php if (!empty($birth)) { echo '<p><span class="label">' . __( 'Birth Place', 'aboutme-wp' ) . ':</span>' . $birth . '</p>'; } ?>
                    </div>
                    <div class="about-grid-right">
                        <?php if (!empty($email)) { echo '<p><span class="label">' . __( 'Email', 'aboutme-wp' ) . ':</span>' . $email . '</p>'; } ?>
                        <?php if (!empty($phone)) { echo '<p><span class="label">' . __( 'Phone', 'aboutme-wp' ) . ':</span>' . $phone . '</p>'; } ?>
                        <?php if (!empty($freelance)) { echo '<p><span class="label">' . __( 'Freelance', 'aboutme-wp' ) . ':</span>' . $freelance . '</p>'; } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- RESUME  -->
    <div id="resume" class="<?php if ($hideresume == "true") { echo 'hide'; } else { echo 'step'; } ?> " data-x="2800" data-y="2700" data-rotate="180" data-scale="5">
        <div class="resume-panel">
            <div class="resume-info">
                <?php
$resume = wpautop(get_option('AboutMe_resume'));
$resume = str_replace('<p><p class="first">', '<p class="first">', $resume);
$resume = str_replace('</p></p>', '</p>', $resume);
if (!empty($resume)) echo do_shortcode( stripslashes ($resume));
                ?>
            </div>
        </div>
    </div>
    <!-- SKILLS  -->
    <?php		
$firstskill = get_option('AboutMe_first_skill');
$firstpercent = get_option('AboutMe_first_percent');
$secondskill = get_option('AboutMe_second_skill');
$secondpercent = get_option('AboutMe_second_percent');
$thirdskill = get_option('AboutMe_third_skill');
$thirdpercent = get_option('AboutMe_third_percent');
$fourthskill = get_option('AboutMe_fourth_skill');
$fourthpercent = get_option('AboutMe_fourth_percent');
$fifthskill = get_option('AboutMe_fifth_skill');
$fifthpercent = get_option('AboutMe_fifth_percent');
$skills = get_option('AboutMe_skills_text'); 
    ?>
    <div id="skills" class="<?php if ($hideskills == "true") { echo 'hide'; } else { echo 'step'; } ?>"  data-x="5800" data-y="-1700" data-z="-3600" data-rotate="300" data-scale="3">
        <div class="legend">
            <?php if (!empty($skills)) { echo '<h2>' . $skills . '</h2>'; } ?>
            <div class="skills">
                <ul>
                    <?php if (!empty($firstskill)) { echo '<li class="jq">' . $firstskill . '</li>'; } ?>
                    <?php if (!empty($secondskill)) { echo '<li class="css">' . $secondskill . '</li>'; } ?>
                    <?php if (!empty($thirdskill)) { echo '<li class="html">' . $thirdskill . '</li>'; } ?>
                    <?php if (!empty($fourthskill)) { echo '<li class="php">' . $fourthskill . '</li>'; } ?>
                    <?php if (!empty($fifthskill)) { echo '<li class="sql">' . $fifthskill . '</li>'; } ?>
                </ul>
            </div>
        </div>
        <div id="diagram"></div>
        <div class="get">
            <?php if (!empty($firstskill) && !empty($firstpercent)) { echo '<div class="arc"> <span class="text">' . get_option('AboutMe_first_skill') . '</span><input type="hidden" class="percent" value="' . get_option('AboutMe_first_percent') . '" /><input type="hidden" class="color" value="' . get_option('AboutMe_first_skill_color') . '" /></div>'; } ?>
            <?php if (!empty($secondskill) && !empty($secondpercent)) { echo '<div class="arc"> <span class="text">' . get_option('AboutMe_second_skill') . '</span><input type="hidden" class="percent" value="' . get_option('AboutMe_second_percent') . '" /><input type="hidden" class="color" value="' . get_option('AboutMe_second_skill_color') . '" /></div>'; } ?>
            <?php if (!empty($thirdskill) && !empty($thirdpercent)) { echo '<div class="arc"> <span class="text">' . get_option('AboutMe_third_skill') . '</span><input type="hidden" class="percent" value="' . get_option('AboutMe_third_percent') . '" /><input type="hidden" class="color" value="' . get_option('AboutMe_third_skill_color') . '" /></div>'; } ?> 
            <?php if (!empty($fourthskill) && !empty($fourthpercent)) { echo '<div class="arc"> <span class="text">' . get_option('AboutMe_fourth_skill') . '</span><input type="hidden" class="percent" value="' . get_option('AboutMe_fourth_percent') . '" /><input type="hidden" class="color" value="' . get_option('AboutMe_fourth_skill_color') . '" /></div>'; } ?>
            <?php if (!empty($fifthskill) && !empty($fifthpercent)) { echo '<div class="arc"> <span class="text">' . get_option('AboutMe_fifth_skill') . '</span><input type="hidden" class="percent" value="' . get_option('AboutMe_fifth_percent') . '" /><input type="hidden" class="color" value="' . get_option('AboutMe_fifth_skill_color') . '" /></div>'; } ?>   
        </div>
    </div>
    <!-- PORTFOLIO  -->
    <div id="portfolio" class="<?php if ($hideportfolio == "true") { echo 'hide'; } else { echo 'step'; } ?>" data-x="7000" data-y="250" data-rotate="270" data-scale="2">
        <?php get_template_part( 'includes/portfolio', 'template'); ?>
    </div>
    <!-- CONTACT  -->
    <?php		
$contactheader = get_option('AboutMe_contact_header');
$contactformheader = get_option('AboutMe_contactform_header');
$sendingmessage2 = get_option('AboutMe_sending_message');
$successmessage2 = get_option('AboutMe_success_message');
$failuremessage2 = get_option('AboutMe_failure_message');
$incompletemessage2 = get_option('AboutMe_incomplete_message');
$namefield = get_option('AboutMe_name_field');
$emailfield = get_option('AboutMe_email_field');
$messagefield = get_option('AboutMe_message_field');
$sendbutton = get_option('AboutMe_send_button');
$contactrecipient = get_option('AboutMe_contactform_recipient');
$contactsubject = get_option('AboutMe_contactform_subject');
$contactemail = get_option('AboutMe_contactform_email');
$sendingmessage = get_option('AboutMe_sending_message');
$successmessage = get_option('AboutMe_success_message');
$failuremessage = get_option('AboutMe_failure_message');
$incompletemessage = get_option('AboutMe_incomplete_message');
    ?>	
    <div id="contact" class="<?php if ($hidecontact == "true") { echo 'hide'; } else { echo 'step'; } ?>" data-x="6700" data-y="3000" data-z="-1000" data-rotate="340" data-scale="3">
        <div class="map-effect">
            <?php $map = get_option('AboutMe_contactform_map'); ?>
            <?php if (!empty($map)) { echo stripslashes ($map); } ?>
            <div class="contact-left">
                <?php if (!empty($contactheader)) { echo '<h4>' . $contactheader . '</h4>'; } ?>   
                <?php if (!empty($phone)) { echo '<p><span class="label">' . __( 'Phone', 'aboutme-wp' ) . ':</span>' . $phone . '</p>'; } ?>
                <?php if (!empty($email)) { echo '<p><span class="label">' . __( 'Email', 'aboutme-wp' ) . ':</span>' . $email . '</p>'; } ?>
                <?php if (!empty($address)) { echo '<p><span class="label">' . __( 'Address', 'aboutme-wp' ) . ':</span>' . $address . '</p>'; } ?>
            </div>
            <div class="contact-right">
                <!-- contact form -->
                <?php if (!empty($contactformheader)) { echo '<h4>' . $contactformheader . '</h4>'; } ?>
                <form id="contactForm" action="<?php echo get_template_directory_uri();?>/processform.php" method="post">
                    <div class="contact-form">
                        <input type="text" name="senderName" id="senderName" maxlength="40" placeholder="<?php if (!empty($namefield)) { echo $namefield; } else { echo 'Name'; } ?>" />
                        <input type="email" name="senderEmail" id="senderEmail" maxlength="50" placeholder="<?php if (!empty($emailfield)) { echo $emailfield; } else { echo 'Email'; } ?>"  />
                        <textarea name="message" id="message" placeholder="<?php if (!empty($messagefield)) { echo $messagefield; } else { echo 'Message'; } ?>" ></textarea>
                        <input name="recipientName" id="recipientName" type="hidden" value="<?php echo $contactrecipient ?>" />
                        <input name="recipientSubject" id="recipientSubject" type="hidden" value="<?php echo $contactsubject ?>" />
                        <input name="recipientMail" id="recipientMail" type="hidden" value="<?php echo $contactemail ?>" />
                        <input type="submit" id="sendMessage" name="sendMessage" value="<?php if (!empty($sendbutton)) { echo $sendbutton; } else { echo 'Send Message'; } ?>" />
                    </div>
                </form>
                <div id="sendingMessage" class="statusMessage"><p><?php echo $sendingmessage ?></p></div>
                <div id="successMessage" class="statusMessage"><p><?php echo $successmessage ?></p></div>
                <div id="failureMessage" class="statusMessage"><p><?php echo $failuremessage ?></p></div>
                <div id="incompleteMessage" class="statusMessage"><p><?php echo $incompletemessage ?></p></div>
            </div>
        </div>
    </div>
    <?php $hidefooter = get_option('AboutMe_hide_footer'); ?>
    <div id="credits" class="<?php if ($hidefooter == "true") { echo 'hide'; } else { echo 'step'; } ?>" data-x="6700" data-y="6500" data-z="-100" data-rotate-x="-40" data-rotate-y="10" data-scale="1">
        <p><?php echo get_option('AboutMe_footer_text'); ?></p>
        <span class="footnote"><?php bloginfo('name'); ?></span> 
    </div>
    <div id="overview" class="step" data-x="3000" data-y="1500" data-scale="10"></div>
</div>
<!-- HINT  -->
<div class="hint"> <span><?php echo __('You can use arrow keys to navigate', 'aboutme-wp') ?></span></div>
<?php get_footer(); ?>