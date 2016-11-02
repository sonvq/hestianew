<?php if ( have_posts()) : while ( have_posts() ) : the_post(); ?>
<div class="enigma_blog_full">
        <?php if ($post->ID == 3484) : ?>
            <?php
            $args = array('post_type' => 'document', 'posts_per_page' => 20);
            $document_list = new WP_Query($args);
            ?>
            <?php if ($document_list->have_posts()): ?>
                <section class="project-list-home">
                    <table class="application-table" style="margin-bottom: 30px;">
                        <tr>
                            <th>STT</th>
                            <th style="text-align: left">Tiêu Đề</th>
                            <th>Download</th>
                        <tr/>
                    <?php $count = 1; ?>
                    <?php while ($document_list->have_posts()): $document_list->the_post(); ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td style="text-align: left; color: #0000ff;"><b><a download="" href="<?php echo types_render_field('file-pdf', array('post_id' => get_the_ID(), 'output' => 'raw')); ?>"><?php the_title(); ?></a></b></td>
                            <td><i class="fa fa-download"></i> <a download="" href="<?php echo types_render_field('file-pdf', array('post_id' => get_the_ID(), 'output' => 'raw')); ?>">Download</a></td>
                            <?php $count++; ?>
                        </tr>
                    <?php endwhile; ?>
                    </table>
                </section>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
		<?php endif; ?>
    
        <?php  if(has_post_thumbnail()): 
		$defalt_arg = array('class' => "enigma_img_responsive"); 
		?>
		<div class="enigma_blog_thumb_wrapper_showcase">						
			<div class="enigma_blog-img">
			<?php the_post_thumbnail('wl_page_thumb',$defalt_arg); ?>						
			</div>						
		</div>
		<?php endif; ?>
		<div class="enigma_blog_post_content">
			<?php the_content( __( 'Read More' , 'weblizar' ) ); ?>
		</div>
		
</div>	
<div class="push-right">
	<hr class="blog-sep header-sep">
</div>
<?php comments_template( '', true ); ?>
<?php
endwhile;
endif; ?>