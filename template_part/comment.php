<div class="divider-info" id="comment">

    <?php
    $args = array(
        'post_id' => $post->ID,
        'count'   => true // Return only the count.
    );
    $comments_count = get_comments($args);
    ?>
    <h3 data-aos="fade-up" data-aos-duration="1000"><?= $comments_count; ?> Comentarios</h3>


    <div class="comments-container" data-aos="fade-up" data-aos-duration="1000">

        <!-- Lista de comentarios -->
        <ul class="list-comments">
            <?php
            $comentarios = get_comments(array(
                'post_id' => $post->ID,
                'orderby' => 'rand'

            ));
            wp_list_comments(array(
                'per-page' => 10,
                'reverse_top_level' => false
            ), $comentarios);

            ?>
        </ul>
    </div>
</div>