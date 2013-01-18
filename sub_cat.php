<?php osc_goto_first_category() ; ?>
                            <?php if(osc_count_categories () > 0) { ?>


<?php //osc_get_non_empty_categories() ; ?>
<?php while (osc_has_categories() ) {?>
<div id="<?php echo 'divid'.osc_category_id();?>" class="divcon"><ul>
  <?php if ( osc_count_subcategories() > 0 ) { ?>
		
		<?php while ( osc_has_subcategories() ) { ?>
		
			
			 
			<li class="<?php echo osc_category_slug() ; ?>"><?php //echo osc_category_id();?><a href="<?php echo osc_search_category_url() ; ?>"><?php echo osc_category_name() ; ?></a></li>
			
			
				
				
		<?php } ?> 
		
	<?php } ?>
</ul></div>
<?php }?> 
<?php }?> 


			
						


						
              
                           
							
            
