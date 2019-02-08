<h1>
    <?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
</h1>

<img src="<?php the_field('photo'); ?>">

<div>
    <?php the_field('description'); ?>
</div>
<div>
    <?php the_terms( $post->ID, 'dogscat', '<b>Breed: </b>'); ?>
</div>
<div>
    <b>Age: </b><?php the_field('age'); ?>
</div>
<div>
    <?php
        $mypost_date = the_date('M j, Y', '<b>Date: </b>');
        echo $mypost_date;
    ?>
</div>