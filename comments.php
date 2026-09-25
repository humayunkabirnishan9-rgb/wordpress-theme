<?php
/**
 * Comments Template
 *
 * @package BlueWireSEO
 */

if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area bws-comments">

    <?php if ( have_comments() ) : ?>
        <h3 class="comments-title">
            <?php
            $comment_count = get_comments_number();
            printf(
                esc_html( _n( '%1$s comment on %2$s', '%1$s comments on %2$s', $comment_count, 'bluewireseo' ) ),
                number_format_i18n( $comment_count ),
                '<span>' . esc_html( get_the_title() ) . '</span>'
            );
            ?>
        </h3>

        <ol class="comment-list">
            <?php wp_list_comments( array( 'style' => 'ol', 'short_ping' => true ) ); ?>
        </ol>

        <?php the_comments_navigation(); ?>

    <?php endif; ?>

    <?php
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
        echo '<p class="no-comments">' . esc_html__( 'Comments are closed.', 'bluewireseo' ) . '</p>';
    endif;
    ?>

    <?php comment_form(); ?>

</div>
