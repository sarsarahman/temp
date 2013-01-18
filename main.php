<!DOCTYPE html>
<html dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('head.php') ; ?>
        <meta name="robots" content="index, follow" />
        <meta name="googlebot" content="index, follow" />
    </head>
    <body>
        <?php osc_current_web_theme_path('header.php') ; ?>
  	
        <?php osc_current_web_theme_path('inc.search.php') ; ?>
		
        <div class="container margin-top-10">
            <?php twitter_show_flash_message() ; ?>
        </div>
		
        <!-- content -->
		 
        <div class="container container-fluid Categories" style="border:solid 0px red;">
            <div class="sidebar">
			
							<li class="section-head" style ="list-style: none;"><h1>Categories</h1></li>
               <ul class="nav1">
                            <?php osc_get_non_empty_categories() ; ?>
                            <?php if(osc_count_categories () > 0) { ?>
                                <?php while ( osc_has_categories() ) { ?>
								
                                  <li id="catid<?php echo osc_category_id()?>" class="<?php echo osc_category_slug() ; ?><?php if ( osc_count_subcategories() > 0 ) { ?><?php } ?>">
                                      <a href="#" <?php if ( osc_count_subcategories() > 0 ) { ?>class=""<?php } ?>><?php View::newInstance()->_erase('subcategories'); echo osc_category_name() ; ?></a>
                                        
                                  </li>
                                <?php } ?>
                            <?php } ?>
							</ul>
            </div>
            <div class="content">
			
			
		    <div class="row" > <!-- included aadil -->
                    <div class="span11 columns rounded" style="background:rgb(239, 252, 253);width:680px;height:845px;" id="maincontent">
					<div id="classifieds">
						<?php include("main2.php"); ?>
						</div>
						<?php include("sub_cat.php"); ?>
						
					</div>
					
			</div>
			
			
				
                <h1><?php //_e('Latest Items', 'twitter') ; ?></h1>
                <?php if( osc_count_latest_items() == 0) { ?>
                <p>
                    <?php //_e('No Latest Items', 'twitter') ; ?>
                </p>
                <?php } else { ?>
                    <?php while ( osc_has_latest_items() ) { ?>
                    <div class="line">
                        <div class="photo">
                            <?php if( osc_count_item_resources() ) { ?>
                            <a href="<?php echo osc_item_url() ; ?>">
                                <img src="<?php echo osc_resource_thumbnail_url() ; ?>" width="100px" height="75px" title="<?php echo osc_item_title(); ?>" alt="<?php echo osc_item_title(); ?>" />
                            </a>
                            <?php } else { ?>
                            <img src="<?php echo osc_current_web_theme_url('images/no_photo.gif') ; ?>" alt="" title=""/>
                            <?php } ?>
                        </div>
                        <div class="description">
                            <h2><?php if( osc_price_enabled_at_items() ) { ?> <small><strong><?php echo osc_item_formated_price() ; ?></strong></small> &middot; <?php } ?><a href="<?php echo osc_item_url() ; ?>"><?php echo osc_item_title(); ?></a> <span class="label"><a href="<?php echo osc_item_category_url(osc_item_category_id()) ; ?>"><?php echo osc_item_category() ; ?></a></span> <?php if( osc_item_is_premium() ) { ?> <span class="label success"><?php _e('Premium', 'twitter');  ?></span><?php } ?></h2>
                            <p><?php printf(__('<strong>Publish date</strong>: %s', 'twitter'), osc_format_date( osc_item_pub_date() ) ) ; ?></p>
                            <?php
                                $location = array() ;
                                if( osc_item_country() != '' ) {
                                    $location[] = sprintf( __('<strong>Country</strong>: %s', 'twitter'), osc_item_country() ) ;
                                }
                                if( osc_item_region() != '' ) {
                                    $location[] = sprintf( __('<strong>Region</strong>: %s', 'twitter'), osc_item_region() ) ;
                                }
                                if( osc_item_city() != '' ) {
                                    $location[] = sprintf( __('<strong>City</strong>: %s', 'twitter'), osc_item_city() ) ;
                                }
                                if( count($location) > 0) {
                            ?>
                            <p><?php echo implode(' &middot; ', $location) ; ?></p>
                            <?php } ?>
                            <p><?php echo osc_highlight( strip_tags( osc_item_description() ) ) ; ?></p>
                        </div>
                    </div>
                    <?php } ?>
					
					
					
                    <?php if( osc_count_latest_items() == osc_max_latest_items() ) { ?>
                    <div class="row show-all-ads">
					
                        <div class="span12 columns">
                            <a class="btn primary" href="<?php echo osc_search_show_all_url();?>"><strong><?php _e("See all offers", 'twitter') ; ?> &raquo;</strong></a>
                        </div>
                    </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
        <?php osc_current_web_theme_path('footer.php') ; ?>
		<!--<footer class="footer"> hi</footer>-->
		
		<script>
		$(document).ready(function(){
		$("#maincontent").load('sub_cat.php');
		}
		</script>
		
    </body>
</html>
