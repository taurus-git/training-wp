<h1>
    <?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
</h1>

<img src="<?php the_field('photo'); ?>">

<div>
    <?php the_field('description'); ?>
</div>
<div>
    <?php
    $cur_terms = get_the_terms($post->ID, 'dogscat');
    if (is_array($cur_terms)) {
        foreach ($cur_terms as $cur_term) {
            echo '<b>Breed:</b> ' . '<a href="' . get_term_link($cur_term->term_id, $cur_term->taxonomy) . '">' . $cur_term->name . '</a>';
        }
    }
    ?>
</div>
<div>
    <b>Age: </b><?php the_field('age'); ?>
</div>









